<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Corporativo extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'nit',
        'razon_social',
        'direccion',
        'usuario',
        'email',
        'telefono',
    ];

}
