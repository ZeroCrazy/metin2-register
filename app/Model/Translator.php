<?php

namespace Metin2Register\Model;

use Metin2Register\Model\Translator\Cache;
use Stichoza\GoogleTranslate\GoogleTranslate;

class Translator
{
    public static $translatorInstance;
    public static $selfInstance;
    public $cacheInstance;

    public function __construct()
    {
        $this->cacheInstance = new Cache();
    }

    /**
     * Get translated text based in session language
     */
    public static function translate($text): string
    {
        $cacheInstance = self::getSelfInstance()->cacheInstance;
        if ($cacheInstance->isTranslated($text)) {
            return $cacheInstance->get($text);
        }

        $translatedText = self::getTranslator()->translate($text);
        $cacheInstance->save($text,$translatedText);
        return $translatedText;
    }

    /**
     * Get translator instance
     */
    public static function getTranslator(): GoogleTranslate
    {
        if (!isset(self::$translatorInstance)) {
            self::$translatorInstance = new GoogleTranslate(Language::getCurrentLanguage());
        }

        return self::$translatorInstance;
    }

    /**
     * Return self instance
     */
    private static function getSelfInstance(): self
    {
        if (!isset(self::$selfInstance)) {
            self::$selfInstance = new self();
        }

        return self::$selfInstance;
    }
}
