<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\NotificationService;
use Symfony\Component\HttpFoundation\Request;

use App\Repository\UserRepository;

class NotificationController extends AbstractController
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;

    }

    #[Route('/users/send_notification/{id}', name: 'notification')]
    public function sendNotification (int $id,UserRepository $userRepository): JsonResponse
    {

        $message= "dsadsadsa";
        /*$user = $userRepository->findOneBy(
            ['id' => $id],
        );*/

        $user = new User();
        $email = $user->getEmail();

        $notify = $this->notificationService->notify($user,$message);

        return new JsonResponse(['id'=>$id,'message'=>$message,'email'=>$email,'result'=>$notify]);

    }
}
