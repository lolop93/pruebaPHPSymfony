<?php
// src/Service/MessageGenerator.php
namespace App\Service;

class NotificationService
{
    public function notify (): string
    {
        $messages = [
            
        ];

        $index = array_rand($messages);

        return $messages[$index];
    }
}