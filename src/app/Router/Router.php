<?php

namespace App\Router;

use App\Session;
use App\Manager;

class Router {

    protected $method;
    protected $url;

    public function __construct($app)
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->url = explode("/", $_SERVER['REQUEST_URI']);



        switch ($this->url[1]) {
            case "api" :
                new ApiRouter($this->method, $this->url);
                break;
            default :
                $router =new ViewRouter();
                $router->route($this->url, $app);
        }
    }


}
