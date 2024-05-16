<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Empresa;
use App\Models\User;

class TestNotification extends Notification
{
    private $userName;
    private $password;

    public function __construct($userName, $password)
    {
        $this->userName = $userName;
        $this->password = $password;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Hola, ' . $this->userName)
                    ->line('Tu usuario ha sido creado exitosamente.')
                    ->line('Nombre de usuario: ' . $this->userName)
                    ->line('Contraseña: ' . $this->password)
                    ->action('Iniciar sesión', url('/login'))
                    ->line('¡Gracias por usar nuestra plataforma!');
    }
}

