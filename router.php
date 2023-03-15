<?php

if (!isset($_GET['route'])) {
    require_once './screens/home.php';
} else {
    $route = html_entity_decode($_GET['route'], ENT_QUOTES);
    
    if ($route == 'home') {
        require_once './screens/home.php';
    } elseif ($route == 'creator') {
        require_once './screens/creator.php';
    } elseif ($route == 'cv_view') {
        require_once './screens/cv_view.php';
    } else {
        require_once './screens/error.php';
    }
}