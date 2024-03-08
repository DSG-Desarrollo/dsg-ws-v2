<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'clientes'; // Nombre de la tabla

    protected $primaryKey = 'id_cliente'; // Clave primaria

    protected $fillable = [
        'nombre_cliente',
        'apellido_cliente',
    ];
}
