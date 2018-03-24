<?php

namespace App\Controller\AllUser;

use App\Entity\PrivateMessage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use DateTime;
use App\Entity\User;

class MessageController extends Controller
{
    public function listMessagesToMe(): Response
    {
        return $this->render('');
    }
    private function addMessage(User $fromUser, User $toUser, string $title, string $content)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $sendDate = new DateTime();

        $message = new PrivateMessage();
        $message->setTitle($title);
        $message->setContent($content);
        $message->setIsOpened(0);
        $message->setSentDateTime($sendDate);
        $message->setToUser($toUser);
        $message->setFromUser($fromUser);

        $entityManager->persist($message);
        $entityManager->flush();
    }
    private function deleteMessage(PrivateMessage $message): void
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($message);
        $entityManager->flush();
    }
}