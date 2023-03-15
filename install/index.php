<?php
require_once '../system/twig.php';

if (!file_exists('../config.php')) {
    require_once '../language.php';
    require_once '../language/' . $language_code . '/install.php';
    $header = $language;
    $main = $language;
    $header['styles'][] = '/assets/bootstrap/css/bootstrap.min.css';
    $footer['scripts'][] = '/assets/bootstrap/js/bootstrap.bundle.min.js';

    if ($_POST) {
        error_reporting(0);
        $link = mysqli_connect($_POST['server'], $_POST['username'], $_POST['password'], $_POST['name']);
        if (!$link) {
            $main['error'] = true;
            $main['error_text'] = mysqli_connect_error();
            $main['server'] = $_POST['server'];
            $main['username'] = $_POST['username'];
            $main['password'] = $_POST['password'];
        } else {
            mysqli_close($link);
            installApp($_POST['server'], $_POST['username'], $_POST['password'], $_POST['name']);
        }
        
        
    }

    view('common/header', $header);
    view('install/install', $main);
    view('common/footer', $footer);
}

function installApp($server = false, $username = false, $password = false, $name = false) {
    $output = "<?php\r\n";
    $output .= "define('DB_SERVER', '$server');\r\n";
    $output .= "define('DB_USERNAME', '$username');\r\n";
    $output .= "define('DB_PASSWORD', '$password');\r\n";
    $output .= "define('DB_NAME', '$name');\r\n";
    $output .= "\r\n";
    $output .= "define('ROOT', '" . $_SERVER['DOCUMENT_ROOT'] . "');\r\n";
    file_put_contents('../config.php', $output);

    require_once '../system/db.php';

    $sql = "CREATE TABLE `cv_list` (`cv_id` INT(64) NOT NULL AUTO_INCREMENT , `email` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `personal` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `contact` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `skills` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `works` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `education` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `secure_key` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , PRIMARY KEY (`cv_id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";

    dbQuery($sql);

    header('Location: /');
    exit;
}