<?php

namespace App;

class Session
{

    /**
     * @var Entity\User|false|void
     */
    private $user = null;
    /**
     * @var bool
     */
    private $isUserConnected;
    private $app;

    public function __construct(App $app)
    {
        $this->app = $app;
        session_start();
        $this->isUserConnected = !($_SESSION["user"] === null);
        if($this->isUserConnected) {
            $this->user = $_SESSION["user"];
        }

    }

    public function connect() {
        if(isset($_POST['mail']) && $_POST['password']) {

            $this->user = $this->app->getUserManager()->identify($_POST['mail'], $_POST['password']);

            if($this->user) {
                session_start();
                $_SESSION["user"]= $this->user->getId();

                //echo print_r($_SESSION);
                return "Vous êtes bien connectés";
            } else {
                return "Mot de passe erroné ou compte inexistant";
            }
        } else {
            return "Il manque le mail ou le mot de passe";
        }
    }
    public function logout() {
        session_start();
        unset($_SESSION["user"]);
        return "Vous êtes bien déconnecté";
    }


    public function getConnectedUser() {
        return $this->user;
    }

    public function isUserConnected() {
        return $this->isUserConnected;
    }


}
