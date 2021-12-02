<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../../src/src/db.php';
    include_once '../back/users.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new User($db);

    $data = json_decode(file_get_contents("php://input"));

    $item->fist_name = $data->first_name;
    $item->last_name = $data->last_name;
    $item->mail = $data->mail;
    $item->isadmin = $data->isadmin;
    $item->password = $data->password;
    $item->created = date('Y-m-d H:i:s');
    
    if($item->createUser()){
        echo 'User created successfully.';
    } else{
        echo 'User could not be created.';
    }
?>