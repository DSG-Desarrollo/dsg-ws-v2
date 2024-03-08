<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesTasks extends Model
{
    use HasFactory;

    protected $table = 'tipos_tareas'; // Nombre de la tabla
    protected $primaryKey = 'id_tipo_tarea'; // Clave primaria
    protected $fillable = [
        'id_autorizacion_predeterminada',
        'id_servicio',
    ];
}
