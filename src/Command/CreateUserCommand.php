<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;

class CreateUserCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this->setName('app:create-user')
            ->setDescription('Create a new user for ESO')
            ->setHelp('This command allows you to create new user. \nRole: 
            "administrator" - the administrator for the system\n "teacher" - the teacher for the system\n')
            ->addArgument('login', InputArgument::REQUIRED, 'The login for the user')
            ->addArgument('password', InputArgument::REQUIRED, 'The password for new account')
            ->addArgument('role', InputArgument::REQUIRED, 'Role for new account.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Create a new user...');

        $output->writeln('');

        $output->writeln('Login: '.$input->getArgument('login'));
        $output->writeln('Password: '.$input->getArgument('password'));
        $output->writeln('Role: '.$input->getArgument('role'));

        $user = new User();
        $user->setLogin($input->getArgument('login'));
        $user->setPassword($input->getArgument('password'));

        $roleToUpperCase = 'ROLE_'.$this->stringToUpperCase($input->getArgument('role'));

        $user->setRole($roleToUpperCase);
        $user->setEmail('USER IS CREATED BY CONSOLE');
        $user->setLogged(0);
        $user->setName('CREATED BY CONSOLE');
        $user->setSurname('CREATED BY CONSOLE');

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $output->writeln('Saved!');
    }

    private function stringToUpperCase($string): string
    {
        return strtoupper($string);
    }
}