<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // ! MOSTRAR LA VISTA CORRESPONDIENTE
    public function show()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('auth.register');
    }

    // ! METODO PARA REGISTRAR EL USUARIO Y REDIRECCIONAR CUANDO SE CREA
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->getUserImage());
        // dd($request->getUserImage());
        return redirect('/login')->with('success', 'Account created successfully');
    }
}
