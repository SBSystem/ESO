<?php

namespace App\Controller\Administrator\Administration;

use App\AppBundle\Factory\Creators\EducationLevelCreator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\EducationLevel;
use Symfony\Component\HttpFoundation\Response;

class EductionLevelController extends Controller
{
    public function listClass(): Response
    {

    }
    public function addClass(string $className, int $educatorId, string $educationLevel): EducationLevel
    {
        $creator = new EducationLevelCreator();
        $class = $creator->createObject();
        $class->setClassName($className);
        $class->setEducatorId($educatorId);
        $class->setClassLevel($educationLevel);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($class);
        $entityManager->flush();
    }
    public function removeClass(EducationLevel $class): void
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($class);
        $entityManager->flush();
    }
}