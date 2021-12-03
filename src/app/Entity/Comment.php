<?php

namespace App\Entity;


class Comment extends BaseEntity implements \JsonSerializable
{
    private $id;
    private $content;
    private $author_id;
    private $author;
    private $post;
    private $post_id;

    public function __construct($data)
    {
        parent::__construct($data);
    }

    public function getProperties() {
        return get_object_vars($this);
    }

    public function setAuthor($userManager) {
       $this->author = $userManager->get($this->author_id);
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setPost($postManager) {
        $this->post = $postManager->get($this->post_id);
    }

    public function getPost() {
        return $this->post;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * @param mixed $author_id
     */
    public function setAuthorId($author_id)
    {
        $this->author_id = $author_id;
    }

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @param mixed $post_id
     */
    public function setPostId($post_id)
    {
        $this->post_id = $post_id;
    }



    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}
