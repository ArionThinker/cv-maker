<?php

function dbQuery($query = false) {
    if ($query) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        $result = $mysqli->query($query);

        return mysqli_fetch_assoc($result);
    }
}


function escape($string = false) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    return $mysqli->real_escape_string($string);
}