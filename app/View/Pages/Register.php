<?php
use Metin2Register\Application;
use Metin2Register\Model\Language;
use Metin2Register\Model\Translator;

$language = Language::getCurrentLanguage();
?>

<!DOCTYPE html>
<html lang="<?= $language; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://i.imgur.com/RN71qf6.png">
    <title><?= Translator::translate('Register'); ?> - <?= getenv('WEBSITE_TITLE'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://www.google.com/recaptcha/api.js?hl=<?= $language; ?>&lang=<?= $language; ?>" async defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body class="h-screen bg-gray-100 dark:bg-gray-800">
    <?= Application::getView('Register/Header.php'); ?>
    <?= Application::getView('Register/Form.php'); ?>
    <?= Application::getView('Register/Footer.php'); ?>
</body>

</html>