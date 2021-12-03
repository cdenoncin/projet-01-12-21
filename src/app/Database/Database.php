<?php

namespace App\Database;

use PDO;
use PDOException;

class Database
{


    /**
     * @var PDO
     */
    public $connection;

    public function __construct()
    {
        $this->connect();

    }

    public function connect()
    {
        $servername = "db";
        $username = "root";
        $password = "example";

        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=CMS", $username, $password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
