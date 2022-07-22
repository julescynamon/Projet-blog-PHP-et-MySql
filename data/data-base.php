<?php

// aller voir le .env pour le lancement du serveur on utilise DB_USER=... et DB_PASSWORD=... et sensuite php -S localhost:3000

$dns = 'mysql:host=localhost;dbname=blog';
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');



try {
    $pdo = new PDO($dns, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    throw new Exception($e->getMessage());
}

return $pdo;
