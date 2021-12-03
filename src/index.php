<?php

require './vendor/autoload.php';

$database_connection = new \App\Database\Database();

$postManager = new \App\Manager\PostManager($database_connection->connection);
$commentManager = new \App\Manager\CommentManager($database_connection->connection);
$userManager = new \App\Manager\UserManager($database_connection->connection);

$postManager->getAll()[0];
$commentManager->getAll()[0];
$userManager->getAll()[0];


// $manager->render("Article", "article", ["articles" => $manager->getAll()[0]]);
// $manager->render("Login", "login", ["title" => "TEST"]);

// $postManager->render("Article", "article", ["articles" => $postManager->getAll()[0], "comments" => $commentManager->getAll(), "users" => $userManager->getAll()]);
$userManager->render("Login", "login", ["title" => "TEST"]);
// $postManager->render("Home Page", "homepage", ["articles" => $postManager->getAll(), "comments" => $commentManager->getAll(), "users" => $userManager->getAll()]);

