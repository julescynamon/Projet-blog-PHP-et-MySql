<?php


$authDb = require_once __DIR__ . '/data/security.php';

$sessionId = $_COOKIE['session'];

if($sessionId){
    $authDb->logout($sessionId);
    header('Location: /auth-login.php');
}



