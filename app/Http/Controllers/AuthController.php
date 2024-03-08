<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->json()->all(); // Obtiene todos los datos JSON enviados en la solicitud

        if (isset($data['email']) && isset($data['password'])) {
            $user = User::where('usuario', $data['email'])
            ->where('estado_usuario', 'A')->first();
    
            //if (!$user || $user->clave !== md5($data['password'])) {
                //return response()->json(['message' => 'Credenciales incorrectas'], 401);
            //}
    
            // Generar un token de acceso aquí (utilizando Laravel Passport u otro método apropiado)
    
            return response()->json(['user' => $user]);
        } else {
            return response()->json(['message' => 'Faltan credenciales'], 400);
        }
    }
}
