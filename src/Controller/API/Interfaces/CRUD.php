<?php

namespace App\AppBundle\API\Interfaces;

/**
 * Interface CRUD
 * @package App\AppBundle\API\Interfaces
 */
interface CRUD
{
    /**
     * This function is used to create
     */
    public function create();

    /**
     * This function is used to read
     */
    public function read();

    /**
     * This function is used to update
     */
    public function update();

    /**
     * This function is used to delete
     */
    public function delete();
}