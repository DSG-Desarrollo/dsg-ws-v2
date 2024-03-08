<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerServices extends Model
{
    use HasFactory;

    protected $table = 'servicios_clientes'; // Nombre de la tabla

    protected $primaryKey = 'id_servicio_cliente'; // Clave primaria

    protected $fillable = [
        'id_cliente',
        'id_servicio',
    ];
}
