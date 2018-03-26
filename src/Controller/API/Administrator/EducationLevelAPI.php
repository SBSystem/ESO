<?php

namespace App\Controller\API\Administrator;

use App\Controller\API\Interfaces\CRUD;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class EducationLevelAPI implements CRUD
{
    /**
     * This function is used to create education level
     */
    public function create()
    {
        $request = new Request();

        $className = $request->request->get('class_name');
        $classLevel = $request->request->get('class_level');
        $educatorId = $request->request->get('educatorId');

        $jsonResponse = new JsonResponse();
        $jsonResponse->setData(array(
            'educatorId' => $educatorId,
            'classLevel' => $classLevel,
            'className' => $className
        ));
        return $jsonResponse;
    }

    /**
     * This function is used to delete education level
     */
    public function delete()
    {
        // TODO: Implement delete() method.
    }

    /**
     * This function is used to read education levels
     */
    public function read()
    {
        // TODO: Implement read() method.
    }

    /**
     * This function is used to update education level
     */
    public function update()
    {
        // TODO: Implement update() method.
    }
}