<?php

namespace App\Manager;

use App\Entity\Post;
use PDOException;

class PostManager extends BaseManager
{


    public function __construct($app)
    {
        parent::__construct($app);
    }

    public function getAll()
    {
        $query = $this->app->getDatabaseConnexion()->prepare("SELECT * FROM Posts");
        $query->execute();
        $result = $query->fetchAll();
        $posts = [];
        foreach ($result as $row) {
            $post = new Post($row);
            $post->setAuthor($this->app->getUserManager());
            $post->setComments($this->app->getCommentManager());
            $posts[] = $post;
        }

        return $posts;
    }


    public function get($id)
    {
        $query = $this->app->getDatabaseConnexion()->prepare("SELECT * FROM Posts where id=" . $id);
        $query->execute();
        $result = $query->fetchAll();
        if ($result[0] !== null) {
            $post = new Post($result[0]);
            $post->setAuthor($this->app->getUserManager());
            $post->setComments($this->app->getCommentManager());
            return $post;
        } else {
            return null;
        }
    }

    public function getArticleView($id)
    {
        $post = $this->get($id);
        if (!empty($post)) {
            $this->render("Article", "article", ["article" => $post, "comments" => $post->getComments()]);
        } else {
            $this->render404();
        }
    }

    public function create($args)
    {
        if ($args["title"] === null || $args["content"] === null) {
            http_response_code(500);
            return "Aucun titre/contenu donné, il faut au moins ca pour créer un article !";
        }
        if ($args["id"] !== null) {
            unset($args["id"]);
        }

        if ($this->app->getSession()->isUserConnected()) {
            $args["publication_date"] = (string)date('Y-m-d H:i:s');
            $args["author_id"] = $this->app->getSession()->getConnectedUser();
            $args["thumbnail_url"] = $this->generateThumbUrl();
            $post = new Post($args);
            try {
                $this->app->getDatabaseConnexion()->exec($this->generateCreateQuery($post, "Posts"));
                return "Nouvel article enregistré ! ";
            } catch (PDOException $e) {
                return $e->getMessage();
            }

        } else {
            return "Aucun utilisateur connecté";
        }

    }

    private function generateThumbUrl()
    {
        $result = null;
        if (isset($_FILES["thumbnail"])) {
            if ($_FILES["thumbnail"]["error"] > 0) {
                echo "Error with image - Code: " . $_FILES["thumbnail"]["error"] . "<br>";
            } else {
                if (file_exists("upload/" . $_FILES["thumbnail"]["name"])) {
                    $result = "/upload/" . $_FILES["thumbnail"]["name"];
                } else {
                    move_uploaded_file($_FILES["thumbnail"]["tmp_name"],
                        "upload/" . $_FILES["thumbnail"]["name"]);
                    $result = "/upload/" . $_FILES["thumbnail"]["name"];
                }
            }
        }
        return $result;
    }

    public function update($args)
    {
        if ($args["id"] === null) {
            http_response_code(500);
            return "Aucun id !";
        }
        $args["thumbnail_url"] = $this->generateThumbUrl();
        $post = new Post($args);
        try {
            // Prepare statement
            $stmt = $this->app->getDatabaseConnexion()->prepare($this->generateUpdateQuery($post, "Posts"));

            // execute the query
            $stmt->execute();

            // echo a message to say the UPDATE succeeded
            return $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function delete($id)
    {
        try {
            // sql to delete a record
            $sql = "DELETE FROM Posts WHERE id=" . $id;

            // use exec() because no results are returned
            $this->app->getDatabaseConnexion()->exec($sql);
            return "Record deleted successfully";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getAllPostsView()
    {
        $this->render("Home", "list-articles", ["articles" => $this->getAll()]);
    }

    public function createPostView()
    {
        $this->render("Création d'article", "write-articles");
    }

    public function resultCreatePostView($args)
    {
        $this->renderTitleText("Résultat", "Résultat", $this->create($args));
    }

    public function resultDeletePostView($id)
    {
        $this->renderTitleText("Résultat", "Résultat", $this->delete($id));
    }

    public function updatePostView($id)
    {
        $this->render("Modifier l'article", "updatearticle", ["article" => $this->get($id)]);
    }

    public function resultUpdatePostView($args, $id)
    {
        $args['id'] = $id;
        $this->update($args);
        $this->getArticleView($id);
    }
}
