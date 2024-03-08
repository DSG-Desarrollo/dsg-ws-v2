<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionEmployees extends Model
{
    use HasFactory;

    protected $table = 'puestos_empleados';
    protected $primaryKey = 'id_puesto_empleado';
    public $timestamps = false;
    protected $fillable = [
        'id_empleado',
        'id_tipo_empleado',
        'id_cargo',
        'id_departamento_empresa',
        'id_forma_pago',
        'fecha_inicio_puesto_empleado',
        'fecha_fin_puesto_empleado',
        'salario_ordinario',
        'tipo_contrato',
        'estado_puesto_empleado',
        'registro_puesto_empleado'
    ];

    // Relación con Employees
    public function employee()
    {
        return $this->belongsTo(Employees::class, 'id_empleado', 'id_empleado');
    }

    // Relación con AssignmentsTasks
    public function assignmentsTasks()
    {
        return $this->hasMany(AssignmentsTasks::class, 'id_puesto_empleado', 'id_puesto_empleado');
    }
}
