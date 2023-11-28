<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Child;
use Illuminate\Http\Request;

use App\Models\Usuario;

class AuthController extends Controller
{

    /**
     * Login Req
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('Laravel8PassportAuth')->accessToken;
            $usuario = auth()->user();

            // Buscar el child del usuario
            $child = Child::where('usuario_id', $usuario->id)->first();

            return response()->json(['usuario' => $usuario, 'child_id' => ($child->id),'token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function usuarioInfo()
    {

        $usuario = auth()->user();
        // Buscar el child del usuario
        $child = Child::where('usuario_id', $usuario->id)->first();

        return response()->json(['usuario' => $usuario, 'child_id' => ($child->id)], 200);

    }
}
