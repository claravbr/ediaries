<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

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
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'fotoPath' => $request->fotopath
        ]);

        $token = $usuario->createToken('Laravel8PassportAuth')->accessToken;

        return response()->json(['token' => $token], 200);
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
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function usuarioInfo()
    {

        $usuario = auth()->user();

        return response()->json(['usuario' => $usuario], 200);

    }
}
