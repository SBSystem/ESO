<?php

/**
 * This file is part of ESO system.
 *
 * (c) SBSystem 2018
 *
 * For the full license information, please see LICENSE.md at https://github.com/SBSystem/ESO/LICENSE.md
 */

namespace App\Controller\API\Interfaces;

use Symfony\Component\HttpFoundation\Request;

/**
 * Interface CRUD
 * @package App\AppBundle\API\Interfaces
 */
interface CRUD
{
    /**
     * This function is used to create
     */
    public function create(Request $request);

    /**
     * This function is used to read
     */
    public function read(Request $request);

    /**
     * This function is used to update
     */
    public function update(Request $request);

    /**
     * This function is used to delete
     */
    public function delete(Request $request);
}