<?php

namespace App;


use App\Router\ApiRouter;
use PDO;
use PDOException;

class App {


    protected $databaseConnexion;
    /**
     * @var Manager\PostManager
     */
    protected $postManager;
    /**
     * @var Manager\SessionManager
     */
    protected $sessionManager;
    /**
     * @var Session
     */
    protected $session;
    /**
     * @var Manager\UserManager
     */
    protected $userManager;
    /**
     * @var Manager\CommentManager
     */
    protected $commentManager;

    public function __construct()
    {
        $servername = "db";
        $username = "root";
        $password = "example";

        try {
            $this->databaseConnexion = new PDO("mysql:host=$servername;dbname=CMS", $username, $password);
            // set the PDO error mode to exception
            $this->databaseConnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->session = new Session($this);
            $this->sessionManager = new Manager\SessionManager($this);
            $this->userManager = new Manager\UserManager($this);
            $this->commentManager = new Manager\CommentManager($this);
            $this->postManager = new Manager\PostManager($this);


            $this->router = new Router\Router($this);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }



    }


    /**
     * @return PDO
     */
    public function getDatabaseConnexion()
    {
        return $this->databaseConnexion;
    }

    /**
     * @param PDO $databaseConnexion
     */
    public function setDatabaseConnexion($databaseConnexion)
    {
        $this->databaseConnexion = $databaseConnexion;
    }

    /**
     * @return Manager\PostManager
     */
    public function getPostManager()
    {
        return $this->postManager;
    }

    /**
     * @param Manager\PostManager $postManager
     */
    public function setPostManager($postManager)
    {
        $this->postManager = $postManager;
    }

    /**
     * @return Manager\SessionManager
     */
    public function getSessionManager()
    {
        return $this->sessionManager;
    }

    /**
     * @param Manager\SessionManager $sessionManager
     */
    public function setSessionManager($sessionManager)
    {
        $this->sessionManager = $sessionManager;
    }

    /**
     * @return Session
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param Session $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

    /**
     * @return Manager\UserManager
     */
    public function getUserManager()
    {
        return $this->userManager;
    }

    /**
     * @param Manager\UserManager $userManager
     */
    public function setUserManager($userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @return Manager\CommentManager
     */
    public function getCommentManager()
    {
        return $this->commentManager;
    }

    /**
     * @param Manager\CommentManager $commentManager
     */
    public function setCommentManager($commentManager)
    {
        $this->commentManager = $commentManager;
    }




}
