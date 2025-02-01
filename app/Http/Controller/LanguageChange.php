<?php

namespace Metin2Register\Http\Controller;

use Metin2Register\Http\Controller;

class LanguageChange
{
    public function execute(): void
    {
        if (!isset($_POST['language'])) {
            throw new \Exception("Error Processing Request", 1);
        }

        $languageSelected = $_POST['language'];
        $_SESSION['language'] = $languageSelected;

        header('Content-Type: application/json');
        echo '{}';
    }

    /**
     * Get request allowed method
     */
    public function getAllowedMethod(): string
    {
        return 'POST';
    }
}
