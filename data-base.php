<?php

$dns = 'mysql:host=localhost;dbname=blog';
$user = 'root';
$password = '6689JUles';

$pdo = new PDO($dns, $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);