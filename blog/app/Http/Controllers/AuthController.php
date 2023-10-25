<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Child;
use Illuminate\Http\Request;

use App\Models\Usuario;

class AuthController extends Controller
{
    /**
     * Registration Req
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|min:4',
            'apellidos' => 'required|min:4',
            'email' => 'required|email|unique:usuarios,email|max:50',
            'password' => 'required|min:8',
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'fotoPath' => $request->fotoPath
        ]);

        $token = $usuario->createToken('Laravel8PassportAuth')->accessToken;

        // Se crea también el child asociado al usuario
        $child = new Child();
        $child->usuario_id = $usuario->id;
        $child->save();

        return response()->json(['usuario' => $usuario, 'child_id' => $child->id, 'token' => $token], 200);
    }

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

            return response()->json(['usuario' => $usuario, 'token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function usuarioInfo()
    {

        $usuario = auth()->user();

        return response()->json(['usuario' => $usuario], 200);

    }
}
