<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'identificacion',
        'sexo',
        'fecha_nacimiento',
        'tipo_documento',
        'email',
        'telefono',
        'id_usuario'
    ];
}
