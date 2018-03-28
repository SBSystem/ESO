<?php

/**
 * This file is part of ESO system.
 *
 * (c) SBSystem 2018
 *
 * For the full license information, please see LICENSE.md at https://github.com/SBSystem/ESO/LICENSE.md
 */

namespace App\Controller\API\Administrator;

use App\AppBundle\Factory\Creators\EducationLevelCreator;
use App\Controller\API\Interfaces\CRUD;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EducationLevelAPI extends Controller implements CRUD
{
    /**
     * This function is used to create education level
     */
    public function create(Request $request): JsonResponse
    {
        $jsonResponse = new JsonResponse();
        if($request->request->has('className') && $request->request->has('classLevel') && $request->request->has('educatorId')){
            $className = $request->request->get('className');
            $classLevel = $request->request->get('classLevel');
            $educatorId = $request->request->get('educatorId');
            
            $educationCreator = new EducationLevelCreator();
            $educationCreator->createObject($className, $educatorId, $classLevel);
            $level = $educationCreator->getObject();

            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($level);
            $doctrine->flush();

            $jsonResponse->setData(array(
                'educatorId' => $educatorId,
                'classLevel' => $classLevel,
                'className' => $className,
                'message' => 'success',
                'systemStatusCode' => 200
            ));
            $jsonResponse->setStatusCode(200);
        }else {
            $jsonResponse->setData(array(
                'message' => 'Variables does not exists!',
                'systemStatusCode' => 158
            ));
            $jsonResponse->setStatusCode(400);
        }
        return $jsonResponse;
    }

    /**
     * This function is used to delete education level
     */
    public function delete(Request $request){}

    /**
     * This function is used to read education levels
     * Alternative name: readAllRecords
     */
    public function read(Request $request): JsonResponse
    {
        $jsonResponse = new JsonResponse();

        $doctrine = $this->getDoctrine()->getManager();

        $levels = $doctrine->getRepository('educationLevel')->findAll();

        $jsonResponse->setData(array(
            'result' => $levels,
            'message' => 'success',
            'systemStatusCode' => 200
         ));
        $jsonResponse->setStatusCode(200);
        return $jsonResponse;
    }

    /**
     * This function is used to update education level
     */
    public function update(Request $request)
    {
        // TODO: Implement update() method.
    }
}