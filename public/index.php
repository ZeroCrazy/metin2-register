<?php

session_start();

if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['language'])) {
    $languageSelected = $_POST['language'];
    $_SESSION['language'] = $languageSelected;

    header('Content-Type: application/json');
    echo '{}';
    return;
}

$autoloadPath = dirname(__DIR__) . '/vendor/autoload.php';

if (!file_exists($autoloadPath)) {
    die('Please run `composer install` first.');
}

require_once $autoloadPath;

$envFilePath = dirname(__DIR__) . '/.env';

if (!file_exists($envFilePath)) {
    die('First make copy from `.env-example` and configure it and rename to `.env`.');
}

define('ROOT_PATH', dirname(__DIR__));

use Metin2Register\Application;

try {
    $application = new Application();
    $application->run();
} catch (Throwable $t) {
    echo $t->getMessage();
}
