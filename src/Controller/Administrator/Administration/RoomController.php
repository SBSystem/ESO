<?php

namespace App\Controller\Administrator\Administration;

use App\Entity\Room;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Doctrine\ORM\EntityManagerInterface;

class RoomController extends Controller
{
    public function listRooms(AuthorizationCheckerInterface $auth): Response
    {
        if($auth->isGranted('ROLE_ADMINISTRATOR') == false) {
            $this->redirectToRoute('/');
        }

        return $this->render('administrator/rooms/rooms.html.twig', array(

        ));
    }
}