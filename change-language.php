<?php

    require 'inc/core.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $languageSelected = $_POST['language'] ?? $language;

        if (!empty($languageSelected)) {
            $_SESSION['language'] = $languageSelected;
            echo json_encode(['message' => translateAndSave('Language changed successfully.'),'error' => false]);
        } else {
            echo json_encode(['message' => translateAndSave('Invalid language selected.'),'error' => true]);
        }
    } else {
        echo json_encode(['message' => translateAndSave('Invalid request method.'),'error' => true]);
    }

    exit;