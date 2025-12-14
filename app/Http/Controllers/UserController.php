<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // muestra el perfil del usuario autenticado
    public function myProfile()
    {
        $user = auth()->user()->load('servicios'); 
        return view('users.profile', compact('user'));
    }

    public function show(User $user)
    {
        $user->load('servicios');
        return view('users.profile', compact('user'));
    }
}
