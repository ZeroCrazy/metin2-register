<?php

namespace Metin2Register\Model;

class Language
{
    /**
     * Get current language
     */
    public static function getCurrentLanguage(): string
    {
        return isset($_SESSION['language']) ? $_SESSION['language'] : 'en';
    }
}
