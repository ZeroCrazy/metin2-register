<?php

namespace Metin2Register\Http\Controller;

use Metin2Register\Application;

class Index
{
    public function execute()
    {
        Application::getView('Pages/Index.php');
    }

    /**
     * Get request allowed method
     */
    public function getAllowedMethod(): string
    {
        return 'GET';
    }
}
