<?php

namespace App\Manager;


class CommentManager extends BaseManager
{
    public function __construct($database_connection)
    {
        parent::__construct($database_connection);

        $this->userManager = new UserManager($database_connection);
        $this->postManager = new PostManager($database_connection);
    }

    public function getAll()
    {
        $query = $this->database_connection->prepare("SELECT * FROM Comments");
        $query->execute();
        $result = $query->fetchAll();
        $comments = [];
        foreach ($result as $row) {
            $comment = new \App\Entity\Comment($row);
            $comment->setAuthor( $this->userManager);
            $comment->setPost( $this->postManager );
            $comments[] =  $comment;
        }

        return $comments;
    }

     public function get($id)
    {
        $query = $this->database_connection->prepare("SELECT * FROM Comments where id=".$id);
        $query->execute();
        $result = $query->fetchAll();
        if($result[0] !== null) {
            $comment = new \App\Entity\Comment($result[0]);
            $comment->setAuthor( $this->userManager);
            $comment->setPost( $this->postManager );
            return $comment;
        } else {
            return null;
        }
    }


    public function create($args)
    {
        if($args["author_id"] === null || $args["post_id"] === null || $args["content" === null]) {
            http_response_code(500);
            echo "Aucun author_id/post_id/contenu donné, il faut au moins ca pour créer un commentaire !";
            return;
        }
        if($args["id"] !== null) {
            unset($args["id"]);
        }
        $comment = new \App\Entity\Comment($args);
        try {
            $this->database_connection->exec($this->generateCreateQuery($comment, "Comments"));
            echo "Nouveau commentaire enregistré ! ";
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function update($args) {
        if($args["id"] === null) {
            http_response_code(500);
            echo "Aucun id !";
            return;
        }
        $comment = new \App\Entity\Comment($args);
        try {
            // Prepare statement
            $stmt = $this->database_connection->prepare($this->generateUpdateQuery($comment, "Comments"));
          
            // execute the query
            $stmt->execute();
          
            // echo a message to say the UPDATE succeeded
            echo $stmt->rowCount() . " records UPDATED successfully";
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }

    }

    public function delete($id)
    {
        try {
            // sql to delete a record
            $sql = "DELETE FROM Comments WHERE id=".$id;
          
            // use exec() because no results are returned
            $this->database_connection->exec($sql);
            echo "Record deleted successfully";
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }
    }
}
