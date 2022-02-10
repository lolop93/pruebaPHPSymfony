<?php

namespace App\Service;

use App\Service\SmtpProvider;
use App\Service\SesProvider;
use App\Entity\User;

class NotificationService
{
    private $smtpProvider;
    private $sesProvider;

    public function __construct(SmtpProvider  $smtpProvider, SesProvider $sesProvider)
    {
        $this->smtpProvider = $smtpProvider;
        $this->sesProvider = $sesProvider;
    }

    public function notify (User $user, string $message): bool
    {
        /*$email = (new Email())
            ->from('admin@example.com')
            ->to($user->getEmail())
            ->subject(':)')
            ->text($message);

        $this->mailer->send($email);*/

        return true;
    }
}