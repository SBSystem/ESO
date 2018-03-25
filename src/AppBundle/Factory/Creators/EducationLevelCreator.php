<?php

/**
 * This file is part of ESO system.
 *
 * (c) SBSystem 2018
 *
 * For the full license information, please see LICENSE.md at https://github.com/SBSystem/ESO/LICENSE.md
*/

namespace App\AppBundle\Factory\Creators;

use App\Entity\EducationLevel;
use App\AppBundle\Factory\Interfaces\FactoryInterface;

class EducationLevelCreator implements FactoryInterface
{
    private $educationLevel;

    public function __construct()
    {
        $this->educationLevel = new EducationLevel();
    }
    public function createObject(string $classname, int $educatorId, string $classLevel)
    {
        $this->educationLevel
            ->setClassName($classname)
            ->setEducatorId($educatorId)
            ->setClassLevel($classLevel);
    }
    public function getObject()
    {
        return $this->educationLevel;
    }
}