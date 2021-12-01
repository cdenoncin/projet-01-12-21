<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager
{
    public function __construct($database_connection)
    {
        parent::__construct($database_connection);
    }

    public function getAllPosts()
    {
        $query = $this->database_connection->prepare("SELECT * FROM Posts");
        $query->execute();
        $result = $query->fetchAll();
        $posts = [];
        foreach ($result as $row) {
            $post = new Post($row);
            $posts[] = $post;
        }

        return $posts;

    }
}
