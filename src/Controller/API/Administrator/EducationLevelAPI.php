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
    public function create()
    {
        $jsonResponse = new JsonResponse();

        if($_POST['className'] && $_POST['classLevel'] && $_POST['educatorId']){
            $className = $_GET['className'];
            $classLevel = $_POST['classLevel'];
            $educatorId = $_POST['educatorId'];

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
                'httpStatusCode' => 200,
                'message' => 'success',
                'systemStatusCode' => 200
            ));
            $jsonResponse->setStatusCode(200);
        }else{
            $jsonResponse->setData(array(
                'httpStatusCode' => 400,
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
    public function delete()
    {
        $request = new Request();

        $className = $request->request->get('class_name');
        $classLevel = $request->request->get('class_level');
        $educatorId = $request->request->get('educator_id');

        $entity = $this->getDoctrine()->getManager();

        $jsonResponse = new JsonResponse();
        $jsonResponse->setData(array(
            'success' => true
        ));
        return $jsonResponse;
    }

    /**
     * This function is used to read education levels
     */
    public function read()
    {
        $jsonResponse = new JsonResponse();

        $doctrine = $this->getDoctrine()->getManager();

        $levels = $doctrine->getRepository('educationLevel')->findAll();



        $jsonResponse->setData(array(
            'result' => $levels,
            'httpStatusCode' => 200,
            'message' => 'success',
            'systemStatusCode' => 200
         ));
        $jsonResponse->setStatusCode(200);
        return $jsonResponse;
    }

    /**
     * This function is used to update education level
     */
    public function update()
    {
        // TODO: Implement update() method.
    }
}