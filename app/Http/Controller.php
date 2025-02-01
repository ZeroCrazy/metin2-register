<?php

namespace Metin2Register\Http;

use Metin2Register\Http\Controller\CreateAccount;
use Metin2Register\Http\Controller\Index;
use Metin2Register\Http\Controller\LanguageChange;

class Controller
{
    protected $request_method;
    protected $request_uri;
    protected static $instance;

    protected function __construct()
    {
        $this->request_method = $_SERVER['REQUEST_METHOD'];
        $this->request_uri = $_SERVER['REQUEST_URI'];
    }

    public function dispatch()
    {
        switch ($this->request_uri) {
            case '/change-language':
                $controller = new LanguageChange();
                break;
            case '':
            case '/':
            case '/index':
                $controller = new Index();
                break;
            case '/create-account':
                $controller = new CreateAccount();
                break;
            default:
                $this->dispatchNotFound();
                exit;
                break;
        }

        if (!method_exists($controller, 'getAllowedMethod')) {
            $this->dispatchNotFound();
            exit;
        }

        if (strtolower($controller->getAllowedMethod()) !== strtolower($this->request_method)) {
            $this->dispatchBadRequest();
            exit;
        }

        if (!method_exists($controller, 'execute')) {
            $this->dispatchNotImplemented();
            exit;
        }

        $controller->execute();
    }

    /**
     * Dispatch not found
     */
    private function dispatchNotFound(): void
    {
        http_response_code(404);
        echo 'Route not found.';
    }

    /**
     * Dispatch bad request
     */
    private function dispatchBadRequest(): void
    {
        http_response_code(400);
        echo 'Bad request.';
    }

    /**
     * Dispatch not implemented
     */
    private function dispatchNotImplemented(): void
    {
        http_response_code(501);
        echo 'Not implemented.';
    }

    /**
     * Get self instance
     */
    public static function getInstance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
