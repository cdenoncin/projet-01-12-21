<?php

namespace App\Router;


use App\App;
use App\Manager\CommentManager;
use App\Manager\PostManager;
use App\Manager\UserManager;

class ApiRouter {


    private $manager;
    private $method;
    private $url;
    private $app;

    public function __construct($method, $url, $app) {
        $this->method = $method;
        $this->url = $url;

        $this->app = $app;

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
        switch($type) {
            case "posts" :
                return $this->app->getPostManager();
                break;
            case "users" :
                return $this->app->getUserManager();
                break;
            case "comments" :
                return $this->app->getCommentManager();
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
        echo json_encode($this->manager->getAll());
    }

    public function handlePost() {
        echo json_encode($this->manager->create($_POST));
    }

    public function handlePut() {
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

