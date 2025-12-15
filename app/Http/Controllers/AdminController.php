<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Servicio;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('servicios')->orderBy('name')->paginate(20);

        $servicioMasContratado = Servicio::withCount('users')
            ->orderByDesc('users_count')
            ->first();

        return view('admin.index', compact('users', 'servicioMasContratado'));
    }
}
