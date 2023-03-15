<?php
function view($template = false, $data = array()) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

    $loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . '/view/');
    $twig = new Twig_Environment($loader);
    echo $twig->render($template . '.twig', $data);
}



