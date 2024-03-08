<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentsTasks extends Model
{
    use HasFactory;

    protected $table = 'asignaciones_tareas';
    protected $primaryKey = 'id_asignacion_tarea';
    public $timestamps = false;
    protected $fillable = [
        'id_tarea',
        'id_puesto_empleado',
        'id_usuario',
        'estado_asignacion',
        'registro_asignacion'
    ];  

    public function positionEmployee()
    {
        return $this->belongsTo(PositionEmployees::class, 'id_puesto_empleado', 'id_puesto_empleado');
    }

    // Definir la relación con Usuarios (Users) si existe un modelo para ellos
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }
}
