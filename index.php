<?php

if (!file_exists('./config.php')) {
    header('Location: /install');
    exit;
}

require_once './language.php';
require_once './language/' . $language_code . '/main.php';
require_once './system/twig.php';
require_once './router.php';
require_once './system/db.php';