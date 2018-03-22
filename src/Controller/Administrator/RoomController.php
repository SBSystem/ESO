<?php

namespace App\Controller\Administrator;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class RoomController extends Controller
{
    public function listRooms(AuthorizationCheckerInterface $auth): Response
    {
        if($auth->isGranted('ROLE_ADMINISTRATOR') == false) {
            $this->redirectToRoute('/');
        }

        return $this->render('administrator/administration/rooms.html.twig', array(

        ));
    }
}