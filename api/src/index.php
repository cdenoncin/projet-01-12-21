<?php

require './vendor/autoload.php';

$database_connection = new \App\Database\Database();


$manager = new \App\Manager\PostManager($database_connection->connection);
$manager->getAllPosts();

$manager->render("test", "tes", ["test" => "coucou"]);
