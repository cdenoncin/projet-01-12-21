<?php

namespace App\Entity;


class Post extends BaseEntity implements \JsonSerializable
{
    private $id;
    private $title;
    private $content;
    private $thumbnail_url;
    private $publication_date;
    private $author_id;

    /**
     * @param $id
     * @param $title
     * @param $content
     * @param $thumbnail_url
     * @param $publication_date
     * @param $author_id
     */
    public function __construct($data)
    {
        parent::__construct($data);
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
    public function getThumbnailUrl()
    {
        return $this->thumbnail_url;
    }

    /**
     * @param mixed $thumbnail_url
     */
    public function setThumbnailUrl($thumbnail_url)
    {
        $this->thumbnail_url = $thumbnail_url;
    }

    /**
     * @return mixed
     */
    public function getPublicationDate()
    {
        return $this->publication_date;
    }

    /**
     * @param mixed $publication_date
     */
    public function setPublicationDate($publication_date)
    {
        $this->publication_date = $publication_date;
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

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }


}
