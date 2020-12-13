<?php

namespace App\Entity;

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

}