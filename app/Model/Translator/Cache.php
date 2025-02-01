<?php

namespace Metin2Register\Model\Translator;

use Metin2Register\Model\Language;

class Cache
{
    /**
     * Check if text is translated
     */
    public function isTranslated($text): bool
    {
        $content = json_decode($this->getContent(),true);
        return isset($content[$text]);
    }

    /**
     * Get already translated text
     */
    public function get($text): string
    {
        $content = json_decode($this->getContent(), true);

        return $content[$text];
    }

    /**
     * Add translated text in cache file
     */
    public function save($key, $value): void
    {
        $content = json_decode($this->getContent(), true);
        $content[$key] = $value;
        file_put_contents($this->getFile(), json_encode($content, JSON_PRETTY_PRINT));
    }

    /**
     * Get all translated cache file content
     */
    private function getContent(): string
    {
        $content = file_get_contents($this->getFile());
        return $content;
    }

    /**
     * Get current tranlation cache file
     */
    private function getFile(): string
    {
        $translationCacheFileFolder = sprintf(
            '%s/var/cache/translations',
            ROOT_PATH
        );

        if (!is_dir($translationCacheFileFolder)) {
            mkdir($translationCacheFileFolder, 0775, true);
        }

        $translationFilePath = sprintf(
            '%s/%s.json',
            $translationCacheFileFolder,
            Language::getCurrentLanguage()
        );

        if (!file_exists($translationFilePath)) {
            file_put_contents($translationFilePath, '{}');
        }

        return $translationFilePath;
    }
}
