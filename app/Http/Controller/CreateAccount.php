<?php

namespace Metin2Register\Http\Controller;

use Metin2Register\Library\Database;
use Metin2Register\Model\Translator;

class CreateAccount
{
    public function execute()
    {
        $database = new Database();

        $username = $_POST['username'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $passwordConfirmation = $_POST['passwordConfirmation'] ?? null;
        $social_id = $_POST['social_id'] ?? null;
        $captcha_response = $_POST['g-recaptcha-response'] ?? null;

        if (empty($username) || empty($email) || empty($password) || empty($passwordConfirmation) || empty($social_id)) {
            echo json_encode(["message" => Translator::translate('All fields are required.'), "error" => true]);
            exit;
        }

        if ($password !== $passwordConfirmation) {
            echo json_encode(["message" => Translator::translate('Passwords do not match.'), "error" => true]);
            exit;
        }

        if (strlen($password) < 8 || strlen($password) > 12) {
            echo json_encode(["message" => Translator::translate('Password must be between 8 and 12 characters.'), "error" => true]);
            exit;
        }

        if (!is_numeric($social_id) || strlen($social_id) < 6 || strlen($social_id) > 6) {
            echo json_encode(["message" => Translator::translate('Character deletion must be 6 digits.'), "error" => true]);
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(["message" => Translator::translate('Invalid email format.'), "error" => true]);
            exit;
        }

        if (!preg_match("/^[a-zA-Z0-9]{8,12}$/", $username)) {
            echo json_encode(["message" => Translator::translate('Username must be alphanumeric and between 8 and 12 characters.'), "error" => true]);
            exit;
        }

        if (isset($google_secret)) {
            $recaptcha_secret = $google_secret;
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptcha_secret . "&response=" . $captcha_response);
            $response_data = json_decode($response, true);

            if (!$response_data["success"]) {
                echo json_encode(["message" => Translator::translate('The captcha is incorrect.'), "error" => true]);
                exit;
            }
        }

        $database->dbConn('account')->insert(
            'account',
            [
                'login' => $username,
                'email' => $email,
                'password' => strtoupper("*" . sha1(sha1($password, true))),
                'social_id' => $social_id,
            ]
        );

        echo json_encode(["message" => Translator::translate('You have registered successfully.'), "error" => false]);
    }

    /**
     * Get request allowed method
     */
    public function getAllowedMethod(): string
    {
        return 'POST';
    }
}
