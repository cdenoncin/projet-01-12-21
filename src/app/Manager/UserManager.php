<?php

namespace App\Manager;


use App\Entity\User;

class UserManager extends BaseManager
{

    public function __construct($app)
    {
        parent::__construct($app);
    }

    public function getAll()
    {
        $query = $this->app->getDatabaseConnexion()->prepare("SELECT * FROM Users");
        $query->execute();
        $result = $query->fetchAll();
        $users = [];
        foreach ($result as $row) {
            $users[] =  new User($row);
        }

        return $users;
    }

     public function get($id)
    {
        if(empty($id)) {
            return "Id must be not empty";
        }
        $query = $this->app->getDatabaseConnexion()->prepare("SELECT * FROM Users where id=".$id);
        $query->execute();
        $result = $query->fetchAll();
        if($result[0] !== null) {
            return new User($result[0]);
        } else {
            return null;
        }
    }

    public function identify($mail, $password) {
        if(empty($mail)) {
            return "mail must be present";
        }

        $sql = "SELECT * FROM Users where mail=\"".$mail."\"";
        //echo $sql;
        $query = $this->app->getDatabaseConnexion()->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        if($result[0] !== null) {
            $user = new User($result[0]);
            if($user->getPassword() === $password) {
                return $user;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }




    public function create($args)
    {
        if($args["first_name"] === null || $args["password"] === null || $args["mail" === null]) {
            http_response_code(500);
            return "Aucun prénom/mdp/mail donné, il faut au moins ca pour créer un utilisateur !";
        }
        if($args["id"] !== null) {
            unset($args["id"]);
        }
        if ($args['is_admin'] === 'on') {
            $args['is_admin'] = 1;
        }
        $user = new User($args);
        try {
            $this->app->getDatabaseConnexion()->exec($this->generateCreateQuery($user, "Users"));
            return "Nouvel utilsateur enregistré ! ";
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public function update($args) {
        if($args["id"] === null) {
            http_response_code(500);
            return "Aucun id !";
        }
        $user = new User($args);
        try {
            // Prepare statement
            $stmt = $this->app->getDatabaseConnexion()->prepare($this->generateUpdateQuery($user, "Users"));

            // execute the query
            $stmt->execute();

            // echo a message to say the UPDATE succeeded
           return "Utilisateur mis à jour ! ";
          } catch(PDOException $e) {
            return $e->getMessage();
          }

    }

    public function delete($id)
    {
        try {
            // sql to delete a record
            $sql = "DELETE FROM Users WHERE id=".$id;

            // use exec() because no results are returned
            $this->app->getDatabaseConnexion()->exec($sql);
            return "Record deleted successfully";
          } catch(PDOException $e) {
            return $sql . "<br>" . $e->getMessage();
          }
    }

    public function getAllUsersView() {
        $this->render("Liste utilisateurs", "userlist", ["users" => $this->getAll()]);
    }

    public function deleteUserView($id) {
        $this->renderTitleText("Suppression Utilisateur", "Résultat", $this->delete($id));
    }

    public function getAdminView()
    {
        $this->render("Admin", "admin", ["user" => $this->get($this->app->getSession()->getConnectedUser())]);
    }
}
