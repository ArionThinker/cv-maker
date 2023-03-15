<?php
$data = $language;
$data['styles'][] = '/assets/bootstrap/css/bootstrap.min.css';
$data['styles'][] = '/assets/bootstrap-icons/bootstrap-icons.css';

if (isset($_GET['route']) && $_GET['route'] == 'creator') {
    $data['scripts'][] = '/assets/jquery/jquery-3.6.3.min.js';
}

// Menu
$data['menu'][] = array(
    'href' => '/',
    'name' => $language['menu_home']
); 
$data['menu'][] = array(
    'href' => '/index.php?route=about',
    'name' => $language['menu_about']
); 

// Language
$data['languages'][] = array(
    'code' => 'en-gb',
    'name' => 'English'
);
$data['languages'][] = array(
    'code' => 'uk-ua',
    'name' => 'Українська'
);

if (isset($_GET['route'])) {
    $data['current'] = $_GET['route'];
} else {
    $data['current'] = 'home';
}

view ('common/header', $data);