<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $table = 'tareas';
    protected $primaryKey = 'id_tarea';
    public $timestamps = false; // Si no necesitas los campos de timestamp

    protected $fillable = [
        'id_tipo_tarea',
        'id_servicio_cliente',
        'id_tipo_tarea',
        'id_servicio_cliente',
        'id_prioridad_tarea',
        'id_usuario',
        'id_autorizacion_tarea',
        'id_usuario_revision',
        'id_municipio',
        'codigo_tarea' ,
        'puesto_trabajo',
        'descripcion_tarea',
        'comentario_tarea',
        'direccion_tarea',
        'progreso_tarea',
        'orden_requerida',
        'orden_completada',
        'correo_solicitud',
        'correo_inicio',
        'correo_completo',
        'fecha_inicio_tarea',
        'fecha_fin_tarea',
        'fecha_programacion',
        'solicitud_programacion',
        'comentario_programacion',
        'id_autorizacion_programacion',
        'fecha_revision',
        'comentario_rechazo',
        'numero_solicitud',
        'estado_tarea',
        'registro_fecha',
        'id_cuenta',
    ];

    // Relación con AssignmentsTasks
    public function assignmentsTasks()
    {
        return $this->hasMany(AssignmentsTasks::class, 'id_tarea', 'id_tarea');
    }

    // Relación con CustomerServices
    public function customerService()
    {
        return $this->belongsTo(CustomerServices::class, 'id_servicio_cliente', 'id_servicio_cliente');
    }

    // Relación con PrioritiesTasks
    public function priority()
    {
        return $this->belongsTo(PrioritiesTasks::class, 'id_prioridad_tarea', 'id_prioridad_tarea');
    }

    // Relación con Users (autor de la tarea)
    public function author()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    // Relación con Users (usuario de revisión)
    public function revisionUser()
    {
        return $this->belongsTo(User::class, 'id_usuario_revision', 'id_usuario');
    }
}
