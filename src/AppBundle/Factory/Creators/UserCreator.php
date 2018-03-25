<?php

namespace App\AppBundle\Factory\Creators;

use App\AppBundle\Factory\Interfaces\FactoryInterface;
use App\Entity\User;

class UserCreator implements FactoryInterface
{
    public function createObject()
    {
        return new User();
    }    
}