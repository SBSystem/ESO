<?php

namespace App\Controller\index;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends Controller
{
    public function loginPage(Request $request, AuthenticationUtils $authUtils)
    {
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
}
