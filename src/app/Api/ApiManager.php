<?php

namespace App\Api;


class ApiManager {

    public function __construct($url, $method) {
      //  echo print_r($url) . $method;

        $this->method = $method;
        $this->url = $url;
        $this->manager = $this->getManager($this->url[2]);

        if(!empty($this->manager)) {
            header('content-type:application/json');
         switch($this->method) {
            case "GET" :
                $this->handleGet();
                break;
            case "POST" :
                $this->handlePost();
                break;
            case "PUT" :
                $this->handlePut();
                break;
            case "DELETE" :
                $this->handleDelete();
                break;
            default : 
                echo "METHOD NOT SUPPORTED";
        }
        }

    }


    public function getManager($type) {
        $database_connection = new \App\Database\Database();
        switch($type) {
            case "posts" :
                return new \App\Manager\PostManager(  $database_connection->connection);
                break;
            case "users" :
                return new \App\Manager\UserManager(  $database_connection->connection);
                break;
            case "comments" :
                return new \App\Manager\CommentManager(  $database_connection->connection);
                break;
            default : 
                echo "TYPE NOT SUPPORTED";
                return null;
        }
    }


    public function handleGet() {
        if(!empty($this->url[3])) {
            echo json_encode($this->manager->get($this->url[3]));
            return;
        }
      // echo var_dump($this->manager);
        echo json_encode($this->manager->getAll());
    }

    public function handlePost() {
       // echo print_r($_FILES["thumbnail"]);
        if(isset($_FILES["thumbnail"])) {
            $tmp_name = $_FILES["thumbnail"]["tmp_name"];
            // basename() peut empêcher les attaques de système de fichiers;
            // la validation/assainissement supplémentaire du nom de fichier peut être approprié
            $name = basename($_FILES["thumbnail"]["name"]);
           // echo   move_uploaded_file($tmp_name, "$uploaddir/$name");
           $upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/img/";
            
            if (is_dir($upload_dir) && is_writable($upload_dir)) {
                // do upload logic here
                $moved = move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $upload_dir . $name);
                $_POST["thumbnail_url"] = "/img/" . $name;
                if( $moved ) {
                echo "Successfully uploaded";         
                } else {
                echo "Not uploaded because of error #".$_FILES["file"]["error"];
                }
            } else {
                echo 'Upload directory is not writable, or does not exist.';
            }
            // Upload file
           
        }
        echo json_encode($this->manager->create($_PUT));
    }

    public function handlePut() {
        echo print_r($_POST);
        if(isset($_FILES["thumbnail"])) {
            $tmp_name = $_FILES["thumbnail"]["tmp_name"];
            // basename() peut empêcher les attaques de système de fichiers;
            // la validation/assainissement supplémentaire du nom de fichier peut être approprié
            $name = basename($_FILES["thumbnail"]["name"]);
           // echo   move_uploaded_file($tmp_name, "$uploaddir/$name");
           $upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/img/";
            
            if (is_dir($upload_dir) && is_writable($upload_dir)) {
                // do upload logic here
                $moved = move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $upload_dir . $name);
                $_POST["thumbnail_url"] = "/img/" . $name;
                if( $moved ) {
                echo "Successfully uploaded";         
                } else {
                echo "Not uploaded because of error #".$_FILES["file"]["error"];
                }
            } else {
                echo 'Upload directory is not writable, or does not exist.';
            }
            // Upload file
           
        }
        echo json_encode($this->manager->update($_POST));
    }

    public function handleDelete() {
        if(empty($this->url[3])) {
            echo "no id";
            return;
        }
      // echo var_dump($this->manager);
        echo json_encode($this->manager->delete($this->url[3]));
    }



}

