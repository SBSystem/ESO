<?php

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
    public function createObject();
}