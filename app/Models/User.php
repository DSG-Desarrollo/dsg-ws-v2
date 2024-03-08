<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_usuario'; // Clave primaria de la tabla

    // Especificar qué columnas se pueden llenar (por ejemplo, durante la creación o actualización de registros).
    protected $fillable = [
        'id_tipo_usuario', 'usuario', 'clave', 'estado_usuario', 'observacion', 'foto_nombre'
    ];

    // Definir las relaciones con otros modelos si las tienes, por ejemplo, la relación con 'tipos_usuarios'.
    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'id_tipo_usuario');
    }
}
