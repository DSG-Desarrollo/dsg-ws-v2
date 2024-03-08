<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Tasks;

class TasksController extends Controller
{
    public function getTasks(Request $request)
    {
        $filters = $request->all(); // Obtener todos los parámetros de la solicitud

        $userId = $filters['user_id'] ?? null; // Obtener el ID de usuario si está presente

        $query = Tasks::query();

        foreach ($filters as $key => $value) {
            if ($key === 'user_id' || $value === null) {
                continue; // Saltar el procesamiento de 'user_id' o filtros nulos
            }

            // Aplicar filtros dinámicos a la consulta si el valor del filtro no es nulo
            $query->where($key, $value);
        }

        if ($userId !== null) {
            $query->where('progreso_tarea', '<>', 'S')
                ->whereHas('assignmentsTasks.positionEmployee.employee.user', function ($query) use ($userId) {
                    $query->where('id_usuario', $userId)
                        ->where('estado_asignacion', 'A');
                });
        }

        $tasks = $query->with([
            'customerService',
            'priority',
            'author',
            'revisionUser',
        ])
            ->orderByDesc('registro_fecha')
            ->take(10)
            ->get();


        $formattedTasks = $tasks->map(function ($task) {
            $fechaProgramacion = Carbon::parse($task->fecha_programacion);

            // Obtener el nombre del mes en español
            setlocale(LC_TIME, 'es_ES');

            // Formatear la fecha según los requisitos especificados
            $formattedFechaProgramacion = $fechaProgramacion->format("Y-m-d g:i A");

            // Reemplazar el valor original de 'fecha_programacion' con el formato deseado
            $task->fecha_programacion = $formattedFechaProgramacion;

            return $task;
        });

        return response()->json(['tasks' => $formattedTasks]);
    }
}
