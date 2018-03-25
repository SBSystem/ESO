<?php

/**
 * This file is part of ESO system.
 *
 * (c) SBSystem 2018
 *
 * For the full license information, please see LICENSE.md at https://github.com/SBSystem/ESO/LICENSE.md
 */

namespace App\AppBundle\Factory\Creators;

use App\AppBundle\Factory\Interfaces\FactoryInterface;
use App\Entity\User;

class UserCreator implements FactoryInterface
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }
    public function createObject(string $username, string $password, string $email, bool $logged, string $role, string $name, string $surname)
    {
        $this->user
            ->setUsername($username)
            ->setPassword($password)
            ->setEmail($email)
            ->setLogged($logged)
            ->setRole($role)
            ->setName($name)
            ->setSurname($surname);
    }
    public function getObject()
    {
        return $this->user;
    }
}