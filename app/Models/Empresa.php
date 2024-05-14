<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Empresa extends Model
{
    use Notifiable;
    use HasFactory;

    protected $fillable = [
        'nit',
        'usuarios_id',
        'razon_social',
        'email',
        'telefono',
    ];

    public function routeNotificationForMail($notification)
    {
        // Devuelve la dirección de correo electrónico donde se deben enviar las notificaciones
        return $this->email;
    }
}
