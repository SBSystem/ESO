<?php

/**
 * This file is part of ESO system.
 *
 * (c) SBSystem 2018
 *
 * For the full license information, please see LICENSE.md at https://github.com/SBSystem/ESO/LICENSE.md
 */

namespace App\AppBundle\Factory\Interfaces;

/**
 * Interfaces FactoryInterface
 * @package App\AppBundle\Factory
 * This interfce is my implementation of factory design pattern.
 */
interface FactoryInterface
{
    /**
     * This method is used to return new instance of object
     */
    public function getObject();
}