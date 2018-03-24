<?php

namespace App\AppBundle\Factory;

/**
 * Interface Creator
 * @package App\AppBundle\Factory
 */
interface Creator
{
    /**
     * @param string $type
     */
    public function create(string $type);
}