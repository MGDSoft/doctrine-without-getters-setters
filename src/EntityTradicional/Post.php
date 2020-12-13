<?php

namespace App\Entity2;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue("UUID")
     */
    public string $id;

    /**
     * @ORM\Column(type="string")
     */
    public string $title;

    /**
     * @ORM\ManyToOne(targetEntity="Author")
     */
    public ?Author $author;

    /**
     * @var Collection|PostComment[]
     *
     * @ORM\OneToMany (targetEntity="PostComment", mappedBy="post", cascade={"all"}, fetch="EAGER")
     */
    public Collection $comments;

    /**
     * @var Collection|PostComment[]
     *
     * @ORM\OneToMany (targetEntity="PostComment", mappedBy="post", cascade={"all"}, fetch="EXTRA_LAZY")
     */
    public Collection $commentsLazies;

    public function __construct()
    {
        $this->comments       = new ArrayCollection();
        $this->commentsLazies = new ArrayCollection();
    }

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
     * Set title.
     *
     * @param string $title
     *
     * @return \App\Entity\Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author.
     *
     * @param \App\Entity\Author|null $author
     *
     * @return Post
     */
    public function setAuthor(\App\Entity\Author $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author.
     *
     * @return \App\Entity\Author|null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Add comment.
     *
     * @param \App\Entity\PostComment $comment
     *
     * @return Post
     */
    public function addComment(\App\Entity\PostComment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment.
     *
     * @param \App\Entity\PostComment $comment
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeComment(\App\Entity\PostComment $comment)
    {
        return $this->comments->removeElement($comment);
    }

    /**
     * Get comments.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add commentsLazy.
     *
     * @param \App\Entity\PostComment $commentsLazy
     *
     * @return Post
     */
    public function addCommentsLazy(\App\Entity\PostComment $commentsLazy)
    {
        $this->commentsLazies[] = $commentsLazy;

        return $this;
    }

    /**
     * Remove commentsLazy.
     *
     * @param \App\Entity\PostComment $commentsLazy
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCommentsLazy(\App\Entity\PostComment $commentsLazy)
    {
        return $this->commentsLazies->removeElement($commentsLazy);
    }

    /**
     * Get commentsLazies.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentsLazies()
    {
        return $this->commentsLazies;
    }
}