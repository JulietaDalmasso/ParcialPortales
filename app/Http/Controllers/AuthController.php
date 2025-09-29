<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
    
    public function doLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return to_route('blog')
            ->with('feedback.message', 'Iniciaste sesión correctamente');
        } 

        return redirect()->back()
        ->withInput()
        ->with('feedback.message', 'Credenciales inválidas')
        ->with('feedback.type', 'danger');
    }

    public function doLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('auth.showLogin')
        ->with('feedback.message', 'Cerraste sesión correctamente');
    }
}
