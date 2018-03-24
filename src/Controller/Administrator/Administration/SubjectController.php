<?php

namespace App\Controller\Administrator\Administration;

use App\Entity\Subject;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SubjectController extends Controller
{
    public function listSubject(): Response
    {

    }
    public function addSubject(string $subjectName, string $subjectShortName): Subject
    {
        $subject = new Subject();
        $subject->setName($subjectName);
        $subject->setShortName($subjectShortName);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($subject);
        $entityManager->flush();
    }
    public function removeSubject(Subject $subject): void
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($subject);
        $entityManager->flush();
    }
}