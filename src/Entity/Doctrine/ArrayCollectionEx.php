<?php

namespace App\Entity\Doctrine;

class ArrayCollectionEx extends \Doctrine\Common\Collections\ArrayCollection
{
    public function addElement($element)
    {
        $index = $this->indexOf($element);

        if ($index !== false) {
            return false;
        }

        parent::add($element);
    }

    /** parent::removeElement check if contains value ¬¬ but add not */
}