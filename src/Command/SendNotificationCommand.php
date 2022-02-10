<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Service\NotificationService;
use App\Entity\User;

class SendNotificationCommand extends Command
{

    private $notificationService;

    //Nombre del comando para su ejecución desde consola
    protected static $defaultName = 'app:notify';

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;

        parent::__construct();

    }
    protected function configure()
    {
        //Se configura el comando. Lo más importante es addArgument. Aunque los comandos pueden no tener argumentos o parámetos
        $this
            ->setDescription('Muestra un saludo a un nombre pasado por parámetro')
            ->setHelp('Este comando saluda.')
            ->addArgument('id', InputArgument::REQUIRED, 'Pass the user id.');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        //Se captura el parámetro o argumento pasado por consola
        $id = $input->getArgument('id');
        if (empty($id)) {
            throw new \Exception('Missing parameter id');
            return Command::FAILURE;
        }

        $message= "dsadsadsa";
        $user = new User();
        $user->setEmail('admin@prueba.com');
        $email = $user->getEmail();

        $notify = $this->notificationService->notify($user,$message);

        $output->writeln('Hola ' . $id . ' email: ' .$email. ' message: ' .$message. ' result: ' .$notify);
        return Command::SUCCESS;
    }
}