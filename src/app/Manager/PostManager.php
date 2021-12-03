<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager
{

    private $userManager;
    public function __construct($database_connection)
    {
        parent::__construct($database_connection);

        $this->userManager = new UserManager($database_connection);

    }

    public function getAll()
    {
        $query = $this->database_connection->prepare("SELECT * FROM Posts");
        $query->execute();
        $result = $query->fetchAll();
        $posts = [];
        foreach ($result as $row) {
            $post = new Post($row);
            if($post->getId() !== null)
            $post->setAuthor($this->userManager);
            $posts[] = $post;
        }

        return $posts;
    }

     public function get($id)
    {
        $query = $this->database_connection->prepare("SELECT * FROM Posts where id=".$id);
        $query->execute();
        $result = $query->fetchAll();
        if($result[0] !== null) {
            $post = new Post($result[0]);
            if($post->getId() !== null)
            $post->setAuthor($this->userManager);
            return $post;
        } else {
            return null;
        }
    }


    public function create($args)
    {
        if($args["title"] === null || $args["content"] === null) {
            http_response_code(500);
            echo "Aucun titre/contenu donné, il faut au moins ca pour créer un article !";
            return;
        }
        if($args["id"] !== null) {
            unset($args["id"]);
        }

        $post = new Post($args);
        try {
            $this->database_connection->exec($this->generateCreateQuery($post, "Posts"));
            echo "Nouvel article enregistré ! ";
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
        $post = new Post($args);
        try {
            // Prepare statement
            $stmt = $this->database_connection->prepare($this->generateUpdateQuery($post, "Posts"));
          
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
            $sql = "DELETE FROM Posts WHERE id=".$id;
          
            // use exec() because no results are returned
            $this->database_connection->exec($sql);
            echo "Record deleted successfully";
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }
    }
}
