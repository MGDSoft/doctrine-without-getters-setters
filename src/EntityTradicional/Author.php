<?php

namespace App\Entity2;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Author
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue("UUID")
     */
    private ?string $id = null;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $name = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

}