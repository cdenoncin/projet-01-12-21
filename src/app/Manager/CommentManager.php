<?php

namespace App\Manager;


use App\Entity\Comment;

class CommentManager extends BaseManager
{


    public function __construct($app)
    {
        parent::__construct($app);
    }

    public function getAll()
    {
        $query = $this->app->getDatabaseConnexion()->prepare("SELECT * FROM Comments");
        $query->execute();
        $result = $query->fetchAll();
        $comments = [];
        foreach ($result as $row) {
            $comment = new Comment($row);
            $comment->setAuthor($this->app->getUserManager() );
            $comment->setPost($this->app->getPostManager());
            $comments[] =  $comment;
        }

        return $comments;
    }

     public function get($id)
    {
        $query = $this->app->getDatabaseConnexion()->prepare("SELECT * FROM Comments where id=".$id);
        $query->execute();
        $result = $query->fetchAll();
        if($result[0] !== null) {
            $comment = new Comment($result[0]);
            $comment->setAuthor($this->app->getUserManager());
            return $comment;
        } else {
            return null;
        }
    }


    public function create($args)
    {
        if($args["author_id"] === null || $args["post_id"] === null || $args["content" === null]) {
            return "Aucun author_id/post_id/contenu donné, il faut au moins ca pour créer un commentaire !";
        }
        if($args["id"] !== null) {
            unset($args["id"]);
        }

        $comment = new Comment($args);
        try {
            $this->app->getDatabaseConnexion()->exec($this->generateCreateQuery($comment, "Comments"));
            return "Nouveau commentaire enregistré ! ";
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public function update($args) {
        if($args["id"] === null) {
            http_response_code(500);
            return "Aucun id !";
        }
        $comment = new Comment($args);
        try {
            // Prepare statement
            $stmt = $this->app->getDatabaseConnexion()->prepare($this->generateUpdateQuery($comment, "Comments"));

            // execute the query
            $stmt->execute();

            // echo a message to say the UPDATE succeeded
            return "Commentaire mis à jour";
          } catch(PDOException $e) {
            return $e->getMessage();
          }

    }

    public function delete($id)
    {
        try {
            // sql to delete a record
            $sql = "DELETE FROM Comments WHERE id=".$id;

            // use exec() because no results are returned
            $this->app->getDatabaseConnexion()->exec($sql);
            return "Record deleted successfully";
          } catch(PDOException $e) {
            return $sql . "<br>" . $e->getMessage();
          }
    }

    public function getAllFromPost($id)
    {
        $query = $this->app->getDatabaseConnexion()->prepare("SELECT * FROM Comments where post_id=".$id);
        $query->execute();
        $result = $query->fetchAll();
        $comments = [];
        foreach ($result as $row) {
            $comment = new Comment($row);
            $comment->setAuthor($this->app->getUserManager());
           // $comment->setPost($this->app->getPostManager());
            $comments[] =  $comment;
        }

        return $comments;
    }

    public function renderDeleteView($postId, $commentId) {
        $this->delete($commentId);
        $this->app->getPostManager()->getArticleView($postId);
    }

    public function renderAddView($postId, $args) {
        $args["post_id"] = $postId;
        $args["author_id"] = $this->app->getSession()->getConnectedUser();
        $this->app->getCommentManager()->create($args);
        $this->app->getPostManager()->getArticleView($postId);
    }
}
