<?php

$authDb = require_once __DIR__ . '/data/security.php';
$currentUser = $authDb->isLoggedin();

if ($currentUser) {

    $articleDB = require __DIR__ . '/./data/models/ArticleDB.php';

    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $id = $_GET['id'] ?? '';
    if ($id) {
        $article = $articleDB->fetch($id);
        if ($article['author'] === $currentUser['id']) {
            $articleDB->deleteOne($id);
        }
    }
}

header('Location: /');
