<?php
/**
 * This file is part of ESO system.
 *
 * (c) SBSystem 2018
 *
 * For the full license information, please see LICENSE.md at https://github.com/SBSystem/ESO/LICENSE.md
 */

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