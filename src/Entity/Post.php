<?php

namespace App\Entity;

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
    public ?string $id = null;

    /**
     * @ORM\Column(type="string")
     */
    public ?string $title = null;

    /**
     * @ORM\ManyToOne(targetEntity="Author")
     */
    public ?Author $author = null;

    /**
     * @var Collection|PostComment[]
     *
     * @ORM\OneToMany(targetEntity="PostComment", mappedBy="post", cascade={"all"}, fetch="EAGER")
     */
    public Collection $comments;

    /**
     * @var Collection|PostComment[]
     *
     * @ORM\OneToMany(targetEntity="PostComment", mappedBy="post", cascade={"all"}, fetch="EXTRA_LAZY")
     */
    public Collection $commentsLazies;

    /**
     * @var Collection|Tag[]
     *
     * @ORM\ManyToMany(targetEntity="Tag")
     */
    public Collection $tags;

    public function __construct()
    {
        $this->comments       = new ArrayCollection();
        $this->commentsLazies = new ArrayCollection();
        $this->tags           = new ArrayCollection();
    }

}