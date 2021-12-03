<?php

namespace App\Manager;


class UserManager extends BaseManager
{
    
    public function __construct($database_connection)
    {
        parent::__construct($database_connection);
    }

    public function getAll()
    {
        $query = $this->database_connection->prepare("SELECT * FROM Users");
        $query->execute();
        $result = $query->fetchAll();
        $users = [];
        foreach ($result as $row) {
            $users[] =  new \App\Entity\User($row);
        }

        return $users;
    }

     public function get($id)
    {
        if(empty($id)) {
            //echo "Id must de not empty";
            return;
        }
        $query = $this->database_connection->prepare("SELECT * FROM Users where id=".$id);
        $query->execute();
        $result = $query->fetchAll();
        if($result[0] !== null) {
            return new \App\Entity\User($result[0]);
        } else {
            return null;
        }
    }


    public function create($args)
    {
        if($args["first_name"] === null || $args["password"] === null || $args["mail" === null]) {
            http_response_code(500);
            echo "Aucun prénom/mdp/mail donné, il faut au moins ca pour créer un utilisateur !";
            return;
        }
        if($args["id"] !== null) {
            unset($args["id"]);
        }
        $user = new \App\Entity\User($args);
        try {
            $this->database_connection->exec($this->generateCreateQuery($user, "Users"));
            echo "Nouvel utilsateur enregistré ! ";
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
        $user = new \App\Entity\User($args);
        try {
            // Prepare statement
            $stmt = $this->database_connection->prepare($this->generateUpdateQuery($user, "Users"));
          
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
            $sql = "DELETE FROM Users WHERE id=".$id;
          
            // use exec() because no results are returned
            $this->database_connection->exec($sql);
            echo "Record deleted successfully";
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }
    }
}
