<?php

namespace App\Manager;

use App\Session;

class SessionManager extends BaseManager
{


    public function __construct($app)
    {
        parent::__construct($app);
    }


    public function getLoginView() {
        $this->render("Login", "login");
    }

    public function logUserView() {
        $this->renderTitleText("Login", "Résultat", $this->app->getSession()->connect());
    }

    public function createUserView() {
        $this->renderTitleText("Inscription", "Résultat", $this->app->getUserManager()->create($_POST));
    }
    public function logoutView() {
        $this->renderTitleText("Login", "Résultat", $this->app->getSession()->logout());
    }
}
