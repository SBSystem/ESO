<?php

namespace App\Controller\index;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LoginController extends Controller
{
    public function loginPage()
    {
        $loginForm = $this->createFormBuilder()
            ->add('Login', TextType::class)
            ->add('Haslo', PasswordType::class)
            ->add('Zaloguj sie', SubmitType::class, array('label' => 'Zaloguj się'))
            ->getForm();

        return $this->render('index/login.html.twig', array(
            'form' => $loginForm->createView()
        ));
    }
}
