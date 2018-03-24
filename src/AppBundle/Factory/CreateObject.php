<?php

namespace App\AppBundle\Factory;

use App\Entity\EducationLevel;
use App\Entity\User;
use App\AppBundle\Factory\Creator;
use Psr\Log\InvalidArgumentException;

class CreateObject implements Creator
{
    public function create(string $type)
    {
        switch($type)
        {
            case 'user':
                return new User();
            break;
            case 'educationLevel':
                return new EducationLevel();
            break;
            default:
                throw new InvalidArgumentException();
            break;
        }
    }
}