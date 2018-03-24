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

        return $this->render('administrator/administration/rooms.html.twig', array(

        ));
    }
    public function addRoom(EntityManagerInterface $entityManager, string $roomName): Room
    {
        $room = new Room();
        $room->setName($roomName);

        $entityManager->persist($room);
        $entityManager->flush();

        return $room;
    }
    public function deleteRoom(EntityManagerInterface $entityManager, Room $room): bool
    {
        $entityManager->remove($room);
        return true;
    }
}