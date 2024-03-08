<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; // Nombre de la tabla
    protected $primaryKey = 'id_usuario'; // Clave primaria
    protected $fillable = [
        'id_tipo_usuario',
        'usuario',
        'clave',
        'estado_usuario',
        'observacion',
        'foto_nombre',
        'registro_usuario'
    ];

    public function assignedTasks()
    {
        return $this->hasManyThrough(
            AssignmentsTasks::class,
            Employees::class,
            'id_usuario_empleado',
            'id_empleado',
            'id_usuario',
            'id_empleado'
        );
    }

    // Relación con Tasks (tareas creadas por el usuario)
    public function createdTasks()
    {
        return $this->hasMany(Tasks::class, 'id_usuario', 'id_usuario');
    }

}
