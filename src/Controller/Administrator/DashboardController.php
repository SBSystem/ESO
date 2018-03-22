<?php

namespace App\Controller\Administrator;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function dashboard(AuthorizationCheckerInterface $auth): Response
    {
        if($auth->isGranted('ROLE_ADMINISTRATOR') == false) {
            $this->redirectToRoute('/index');
        }

        return $this->render('administrator/dashboard.html.twig', array(

        ));

    }
}