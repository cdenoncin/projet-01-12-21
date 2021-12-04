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
            case "result-updatearticle":
                $app->getPostManager()->resultUpdatePostView($_POST, $url[2]);
                break;
            case "updatearticle":
                $app->getPostManager()->updatePostView($url[2]);
                break;
            case "result-updateadmin":
                $app->getUserManager()->resultUpdateAdminView($_POST, $url[2]);
                break;
            case "admin":
                $app->getUserManager()->updateAdminView();
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
