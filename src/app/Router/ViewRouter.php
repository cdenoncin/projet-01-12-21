<?php

namespace App\Router;

use App\App;

class ViewRouter
{
    public function __construct()
    {
    }

    public function route($url, App $app)
    {
        /*
        if ($url[1] === "admin") {
            render("Admin", "admin", ["title" => "TEST"]);
        } else if ($url[1] === "") {
            $app->getPostManager()->getAllPostsView();

        } else if ($url[1] === "userlist") {
            $app->getUserManager()->getAllUsersView();
        } else if ($url[1] === "writearticle") {
            $app->getPostManager()->createPostView();
        } else if ($url[1] === "updatearticle") {
            render("Updatearticle", "updatearticle", []);
        } else if ($url[1] === "inscription") {
            $app->getSessionManager()->createUserView();
        } else if ($url[1] === "logout") {
            $app->getSessionManager()->logoutView();
        } else if ($url[1] === "createarticle") {
            $app->getPostManager()->resultCreatePostView($_POST);
        } else if ($url[1] === "delete-user") {
            $app->getUserManager()->deleteUserView($url[2]);
        } else {
            $app->getPostManager()->render404();
        }

        */


        switch ($url[1]) {
            case "article" :
                if (!empty($url[2])) {
                    $app->getPostManager()->getArticleView($url[2]);
                } else {
                    header("LOCATION: /");
                }
                break;
            case "login" :
                $app->getSessionManager()->getLoginView();
                break;
            case "logout" :
                $app->getSessionManager()->logoutView();
                break;
            case "inscription" :
                $app->getSessionManager()->createUserView();
                break;
            case "admin" :
                $app->getUserManager()->getAdminView();
                break;
            case "userlist" :
                $app->getUserManager()->getAllUsersView();
                break;
            case "log-user":
                header("LOCATION: /");
                $app->getSessionManager()->logUserView();
                break;
            case "" :
                $app->getPostManager()->getAllPostsView();
                break;
            case "writearticle":
                $app->getPostManager()->createPostView();
                break;
            case "createarticle":
                $app->getPostManager()->resultCreatePostView($_POST);
                break;
            case "deletearticle":
                header("LOCATION: /");
                $app->getPostManager()->resultDeletePostView($url[2]);
                break;
            case "add-comment":
                header("LOCATION: /articles".$url[2]);
                $app->getCommentManager()->renderAddView($url[2], $_POST);
                break;
            case "delete-comment":
                header("LOCATION: /articles".$url[2]);
                $app->getCommentManager()->renderDeleteView($url[2], $url[3] );
                break;
            default :
                $app->getPostManager()->render404();
        }
    }

}
