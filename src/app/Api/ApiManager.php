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
        echo "post";
    }

    public function handleDelete() {
        echo "delete";
    }

    public function handlePut() {
        echo "put";
    }

}

