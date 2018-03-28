<?php

/**
 * This file is part of ESO system.
 *
 * (c) SBSystem 2018
 *
 * For the full license information, please see LICENSE.md at https://github.com/SBSystem/ESO/LICENSE.md
 */

namespace App\Controller\index;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class LoginController extends Controller
{
    public function loginPage(Request $request, AuthenticationUtils $authUtils, AuthorizationCheckerInterface $authCheck)
    {
        if($this->isGranted('ROLE_ADMINISTRATOR')) {
            $this->redirectToRoute('adminDashboard');
        }

        $loginForm = $this->createFormBuilder()
            ->add('_username', TextType::class)
            ->add('_password', PasswordType::class)
            ->add('Zaloguj sie', SubmitType::class, array('label' => 'Zaloguj się'))
            ->getForm();

        $error = $authUtils->getLastAuthenticationError();

        return $this->render('index/login.html.twig', array(
            'error' => $error
        ));
    }
    public function logout()
    {

    }

}
