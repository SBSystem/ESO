<?php

namespace App\AppBundle\Factory\Creators;

use App\Entity\EducationLevel;
use App\AppBundle\Factory\Interfaces\FactoryInterface;

class EducationLevelCreator implements FactoryInterface
{
    public function createObject()
    {
        return new EducationLevel();
    }
}