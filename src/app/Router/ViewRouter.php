<?php

namespace App\Router;

use App\App;

class ViewRouter
{
    /**
     * @var App
     */
    private $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function route($url)
    {


        switch ($url[1]) {
            case "article" :
                if (!empty($url[2])) {
                    $this->app->getPostManager()->getArticleView($url[2]);
                } else {
                    header("LOCATION: /");
                }
                break;
            case "login" :
                $this->app->getSessionManager()->getLoginView();
                break;
            case "logout" :
                $this->app->getSessionManager()->logoutView();
                break;
            case "inscription" :
                $this->app->getSessionManager()->createUserView();
                break;
            case "userlist" :
                $this->app->getUserManager()->getAllUsersView();
                break;
            case "log-user":
                header("LOCATION: /");
                $this->app->getSessionManager()->logUserView();
                break;
            case "" :
                $this->app->getPostManager()->getAllPostsView();
                break;
            case "writearticle":
                $this->app->getPostManager()->createPostView();
                break;
            case "createarticle":
                $this->app->getPostManager()->resultCreatePostView($_POST);
                break;
            case "deletearticle":
                header("LOCATION: /");
                $this->app->getPostManager()->resultDeletePostView($url[2]);
                break;
            case "result-updatearticle":
                header("LOCATION: /article/".$url[2]);
                $this->app->getPostManager()->resultUpdatePostView($_POST, $url[2]);
                break;
            case "updatearticle":
                $this->app->getPostManager()->updatePostView($url[2]);
                break;
            case "result-updateadmin":
                $this->app->getUserManager()->resultUpdateAdminView($_POST, $url[2]);
                break;
            case "admin":

                $this->app->getUserManager()->updateAdminView();
                break;
            case "add-comment":
                header("LOCATION: /article/".$url[2]);
                $this->app->getCommentManager()->renderAddView($url[2], $_POST);
                break;
            case "delete-comment":
                header("LOCATION: /article/".$url[2]);
                $this->app->getCommentManager()->renderDeleteView($url[2], $url[3] );
                break;
            default :
                $this->app->getPostManager()->render404();
        }
    }

}
