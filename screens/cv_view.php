<?php
require_once './components/header.php';
$data = $language;

require_once './system/db.php';

if (isset($_GET['cv_id'])) {
    $get = $_GET;
    


    $cv_id = $get['cv_id'];

    
    

    $data['cv_id'] = $cv_id;
    $cv_info = dbQuery("SELECT * FROM cv_list WHERE cv_id = '" . $cv_id . "'");

    $data['cv_info'] = array(
        'cv_id' => $cv_info['cv_id'],
        'email' => $cv_info['email'],
        'personal' => json_decode($cv_info['personal'], true),
        'skills' => json_decode($cv_info['skills'], true),
        'contact' => json_decode($cv_info['contact'], true),
        'works' => json_decode($cv_info['works'], true),
        'education' => json_decode($cv_info['education'], true),
    );
}





$data['test'] = 'Test';
view ('pages/cv_view', $data);
require_once './components/footer.php';