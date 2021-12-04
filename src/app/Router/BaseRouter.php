<?php

namespace App\Router;

use App\App;

class BaseRouter {


    protected $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }
}
