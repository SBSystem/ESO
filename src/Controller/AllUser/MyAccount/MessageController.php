<?php

namespace App\Controller\AllUser\MyAccount;

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
}