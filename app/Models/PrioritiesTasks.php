<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrioritiesTasks extends Model
{
    use HasFactory;

    protected $table = 'prioridades_tareas'; // Nombre de la tabla
    protected $primaryKey = 'id_prioridad_tarea'; // Clave primaria
    protected $fillable = [
        'prioridad_tarea',
        'color_prioridad_tarea',
    ];
}
