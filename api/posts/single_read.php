<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/db.php';
    include_once '../back/users.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new User($db);

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getSingleUser();

    if($item->first_name != null){
        // create array
        $use_arr = array(
            "id" =>  $item->id,
            "first_name" => $item->first_name,
            "last_name" => $item->last_name,
            "mail" => $item->mail,
            "isadmin" => $item->isadmin,
            "password" => $item->password
        );
      
        http_response_code(200);
        echo json_encode($use_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("USer not found.");
    }
?>