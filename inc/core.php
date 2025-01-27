<?php
    session_start();

    $name = "Metin2";
    $url = "http://localhost";
    $language = isset($_SESSION['language']) ? $_SESSION['language'] : 'en';

    $database_connection = [
        'host' => 'localhost',
        'port' => 3306,
        'user' => 'root',
        'pass' => '',
        'tables' => [
            'account' => 'account'
        ]
    ];

    /*
        In case you want to enable registration with captcha, uncomment lines 29-30 and comment lines 31-32.
        If you don't have any PHP version, download the latest one -> https://www.php.net/downloads.php
        If you do not have Composer installed, download it from the following url -> https://getcomposer.org/download/

        Once you have both PHP and Composer configured, run the following command (cmd) in the same folder
        where you have the "composer init -y && composer install" project installed.

    */

    // $google_public = "INSERT_CODE_HERE";
    // $google_secret = "INSERT_CODE_HERE";
    $google_public = null;
    $google_secret = null;

    require 'vendor/autoload.php';
    use Stichoza\GoogleTranslate\GoogleTranslate;
    $tr = new GoogleTranslate($language);
    $translation_file = __DIR__ . "/translate/{$language}.json";

    if (file_exists($translation_file)) {
        $translations = json_decode(file_get_contents($translation_file), true);
    } else {
        $translations = [];
    }

    function translateAndSave($text) {
        global $tr, $translations, $language, $translation_file;
        if (isset($translations[$text])) {
            return $translations[$text];
        }
        $translated_text = $tr->translate($text);
        $translations[$text] = $translated_text;
        file_put_contents($translation_file, json_encode($translations, JSON_PRETTY_PRINT));
        return $translated_text;
    }

    function HashPassword($password){
        return strtoupper("*" . sha1(sha1($password, true)));
    }

    require 'database.php';