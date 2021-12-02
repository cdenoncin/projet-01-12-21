<?php

require './vendor/autoload.php';

$database_connection = new \App\Database\Database();


$manager = new \App\Manager\PostManager($database_connection->connection);


// $manager->render("Article", "article", ["articles" => $manager->getAllPosts()[0]]);

// $manager->render("Home Page", "homepage", ["articles" => [["title" => "Nom de l'article", "author" => "Jean-Pierre", "date" => "02/12/21", "time" => "11:18", "image" => "https://images.unsplash.com/photo-1508013861974-9f6347163ebe?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1176&q=80",
//  "content" => "Voici mon sublime article", "comment-author" => "Jean-Paul", "comment-date" => "03/12/21", "comment-time" => "12:33", "comment" => "Pas trop aimé l'article..."],
//  ["title" => "Nom de l'article 2", "author" => "Jean-Paul", "date" => "02/12/21", "time" => "11:18", "image" => "https://images.unsplash.com/photo-1508013861974-9f6347163ebe?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1176&q=80",
//  "content" => "Voici mon sublime deuxième article", "comment-author" => "Jean-Paul", "comment-date" => "03/12/21", "comment-time" => "12:33", "comment" => "Pas trop aimé l'article..."]]]);



$manager->render("Home Page", "homepage", ["articles" =>$manager->getAllPosts()]);
