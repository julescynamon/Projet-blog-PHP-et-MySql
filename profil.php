<?php


$authDb = require_once __DIR__ . '/data/security.php';
$articleDB = require_once __DIR__ . '/data/models/ArticleDB.php';

$articles = [];
$currentUser = $authDb->isLoggedin();
if (!$currentUser) {
    header('Location: /');
}

$articles = $articleDB->fetchUserArticle($currentUser['id']);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'includes/head.php' ?>
    <link rel="stylesheet" href="/public/css/profil.css">
    <title>Mon Profil</title>
</head>

<body>
    <div class="container">
        <?php require_once 'includes/header.php' ?>
        <div class="content">
            <h1>Mon espace</h1>
            <h2>Mes informations</h2>
            <div class="info-container">
                <ul>
                    <li>
                        <strong>Prénom :</strong>
                        <p><?= $currentUser['firstname'] ?></p>
                    </li>
                    <li>
                        <strong>Nom :</strong>
                        <p><?= $currentUser['lastname'] ?></p>
                    </li>
                    <li>
                        <strong>Email :</strong>
                        <p><?= $currentUser['email'] ?></p>
                    </li>
                </ul>
            </div>
            <h2>Mes articles</h2>
            <div class="articles-list">
                <ul>
                    <?php foreach ($articles as $article) : ?>
                        <li>
                            <span><?= $article['title'] ?></span>
                            <div class="article-action">
                                <a href="/form-article.php?id=<?= $article['id'] ?>" class="btn btn-primary btn-small">Mofifier</a>
                                <a href="/delete-article.php?id=<?= $article['id'] ?>" class="btn btn-secondary btn-small">Supprimez</a>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <?php require_once 'includes/footer.php' ?>
    </div>

</body>

</html>