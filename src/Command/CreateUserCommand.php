<?php
namespace App\Command;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Doctrine\ORM\EntityManagerInterface;
use App\AppBundle\Factory\Creators\UserCreator;
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
        $password = $this->hashPassword($input->getArgument('password'));
        /**
         * Only for tests!
         */
        $output->writeln('Password after hash: '.$password);
        $roleToUpperCase = 'ROLE_'.$this->stringToUpperCase($input->getArgument('role'));
        
        $user = new UserCreator();
        $user->createObject($input->getArgument('login'), $password, 'CREATED BY CONSOLE', 0, $roleToUpperCase, 'CREATED BY CONSOLE', 'CREATED BY CONSOLE');
        $object = $user->getObject();
        $this->entityManager->persist($object);
        $this->entityManager->flush();
        $output->writeln('Saved!');
    }
    private function hashPassword(string $password): string
    {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        return $hash;
    }
    private function stringToUpperCase($string): string
    {
        return strtoupper($string);
    }
}
