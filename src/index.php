<?php

require './vendor/autoload.php';

$database_connection = new \App\Database\Database();


$manager = new \App\Manager\PostManager($database_connection->connection);

$manager->getAll()[0];

/*

//$manager->create(["title"=>"coucou", "content"=> "conbnbnbucou", "thumbnail_url" => "https://source.unsplash.com/random", "author_id"=>"1", "publication_date"=>"2001-10-14 14:00:00", "id"=> "10"]);
//$manager->create(["first_name" => "Timothée", "mail" =>"moi@gmail.com", "password"=>"coucou"]);
//echo $manager->updatePost(["id"=>3, "content" => "baba au rhum", "publication_date"=>"2021-02-21 13:00:00"]);
//$manager->update(["id"=>"2", "last_name"=> "Test", "mail" => "test@gmail.com"]);
//$manager->create(["author_id"=>"1", "post_id"=>"1", "content"=>"testeteszerkl"]);
//$manager->update(["id"=> 1,"author_id"=>"1", "post_id"=>"1", "content"=>"dfdfdfdfdf"]);

//$manager->delete(3);
// echo json_encode($manager->getAll(), JSON_PRETTY_PRINT);
// $manager->render("Article", "article", ["title" => "TEST"]);


$manager->render("Article", "article", ["articles" => $manager->getAll()[0]]);
// $manager->render("Home Page", "homepage", ["articles" =>$manager->getAllPosts()]);
echo json_encode($manager->getAll(), JSON_PRETTY_PRINT);
//$manager->render("Article", "article", ["title" => "TEST"]);
 */


// $manager->render("Article", "article", ["articles" => $manager->getAll()[0]]);
// $manager->render("Login", "login", ["title" => "TEST"]);
$manager->render("Write Article", "writearticle", ["title" => "TEST"]);
// $manager->render("Home Page", "homepage", ["articles" =>$manager->getAll()]);

// $address =  explode("/", $_SERVER['REQUEST_URI']);
// $method =  $_SERVER['REQUEST_METHOD'];
// echo json_encode($address);
// if($address[1] === "api") {
//     echo "api";
    
// } else {
//    echo "not api";
// }
