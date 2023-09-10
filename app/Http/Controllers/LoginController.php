<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // ! MOSTRAR VISTA LOGIN
    public function show()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('auth.login');
    }

    // ! MOSTRAR VISTA LOGIN
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) {
            return redirect()->to('/login')->withErrors('auth.failed');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);
        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user)
    {
        session([
            'idUser' => $user->id,
        ]);
        return redirect('/home');
    }
}
