<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('servicios')->orderBy('name')->paginate(20);
        return view('admin.index', compact('users'));
    }
}

