<?php

namespace FnK\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 */
class Post
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $body;

    /**
     * @var boolean
     */
    private $is_published;

    protected $category;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Post
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set is_published
     *
     * @param boolean $isPublished
     * @return Post
     */
    public function setIsPublished($isPublished)
    {
        $this->is_published = $isPublished;

        return $this;
    }

    /**
     * Get is_published
     *
     * @return boolean 
     */
    public function getIsPublished()
    {
        return $this->is_published;
    }

    /**
     * Set category
     *
     * @param \FnK\Bundle\BlogBundle\Entity\Category $category
     * @return Post
     */
    public function setCategory(\FnK\Bundle\BlogBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \FnK\Bundle\BlogBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
