<?php

namespace App\Entity2;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class PostComment
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue("UUID")
     */
    public ?string $id = null;

    /**
     * @ORM\Column(type="string")
     */
    public ?string $comment = null;

    /**
     * @ORM\ManyToOne (targetEntity="Post", inversedBy="comments")
     */
    public ?Post $post = null;

    /**
     * Get id.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set comment.
     *
     * @param string $comment
     *
     * @return \App\Entity\PostComment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set post.
     *
     * @param \App\Entity\Post|null $post
     *
     * @return \App\Entity\PostComment
     */
    public function setPost(\App\Entity\Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post.
     *
     * @return \App\Entity\Post|null
     */
    public function getPost()
    {
        return $this->post;
    }
}