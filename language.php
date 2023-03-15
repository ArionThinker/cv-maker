<?php 
if (!isset($_COOKIE['language'])) {
    setcookie('language', 'en-gb');
}

if (isset($_GET['current']) && isset($_GET['code'])) {
    setcookie('language', $_GET['code']);
    header('Location: ' . '/index.php?route=' . $_GET['current']);
    exit;
}

$language_code = $_COOKIE['language'];