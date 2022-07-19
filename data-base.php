<?php

$dns = 'mysql:host=localhost;dbname=blog';
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');



try {
    $pdo = new PDO($dns, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    echo 'Error :' . $e->getMessage();
}

return $pdo;
