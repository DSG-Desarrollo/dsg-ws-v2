<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio',
        'id_usuario_empleado',
        'nombre_empleado',
        'apellido_empleado',
        'dui_empleado',
        'nit_empleado',
        'tipo_afp',
        'isss_empleado',
        'nup_empleado',
        'direccion_empleado',
        'sexo_empleado',
        'estado_civil_empleado',
        'nacionalidad_empleado',
        'fecha_nacimiento',
        'correo_empleado',
        'telefono_empleado',
        'celular_empleado',
        'numero_cuenta_empleado',
        'estado_empleado',
        'registro_empleado'
    ];

    // Relación con AssignmentsTasks a través de PositionEmployees
    public function assignmentsTasks()
    {
        return $this->hasManyThrough(
            AssignmentsTasks::class,
            PositionEmployees::class,
            'id_empleado',
            'id_puesto_empleado',
            'id_empleado',
            'id_puesto_empleado'
        );
    }

    // Relación con User (si existe)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario_empleado', 'id_usuario');
    }
}
