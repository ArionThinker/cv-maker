<?php

if ($_POST) {

    require_once '../config.php';
    require_once '../system/db.php';
    
    $personal = $_POST['personal'];
    $contact = $_POST['contact'];
    $email = $contact['email'];
    $skills = $_POST['skills'];
    $works = $_POST['works'];
    $secure_key = uniqid();

    $sql = "INSERT INTO cv_list SET ";
    $sql .= "email = '" . escape($email) . "', ";
    $sql .= "personal = '" . json_encode($personal) . "', ";
    $sql .= "contact = '" . json_encode($contact) . "', ";
    $sql .= "skills = '" . json_encode($skills) . "', ";
    $sql .= "works = '" . json_encode($works) . "', ";
    $sql .= "secure_key = '" . $secure_key . "';";

    dbQuery($sql);

    $cv_id = dbQuery("SELECT * FROM cv_list WHERE secure_key = '" . $secure_key . "'")['cv_id'];

    header('Location: /index.php?route=cv_view&cv_id=' . $cv_id);
}