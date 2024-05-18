<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "descripcion",
        "disponibilidad",
        "precio",
        "pedido_minimo",
        "fecha_entrega",
        "id_categoria",
        "id_corporativo",
    ];

}
