<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private array $validationRules = [
        'name' => 'required|string|min:2|max:255',
        'email' => 'required|email|unique:users,email',
    ];

    private array $validationMessages = [
        'name.required' => 'El nombre es obligatorio',
        'name.min' => 'El nombre debe tener al menos :min caracteres',
        'name.max' => 'El nombre no debe exceder :max caracteres',
        'email.required' => 'El correo electrónico es obligatorio',
        'email.email' => 'El correo electrónico debe ser una dirección válida',
        'email.unique' => 'El correo electrónico ya está en uso',
    ];

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

    public function edit(User $user)
    {
        $user = auth()->user();
        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate($this->validationRules, $this->validationMessages);

        try {
            $data = $request->only(['name', 'email']);
            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            }

            $user->update($data);

            return to_route('user.profile')
                ->with('feedback.message', 'Perfil actualizado correctamente');
        } catch (\Throwable $th) {
            return back()->with('feedback.message', 'Ocurrió un error, el perfil no se pudo actualizar')
                ->with('feedback.type', 'danger');
        }
    }
}
