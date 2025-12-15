<?php

namespace App\Http\Controllers;

use App\Mail\ServicioComprado;
use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class ServicioController extends Controller
{
    public function contratar(Request $request, $id)
    {
        $user = Auth::user();

        if ($user->rol !== 'user') {
            return redirect()
                ->back()
                ->with('feedback.message', 'Solo usuarios pueden contratar.')
                ->with('feedback.type', 'danger');
        }

        $servicio = Servicio::findOrFail($id);

        if ($user->servicios()
            ->where('servicio_user.servicio_id', $servicio->servicio_id)
            ->exists()
        ) {
            return redirect()
                ->back()
                ->with('feedback.message', 'Ya contrataste este servicio.')
                ->with('feedback.type', 'info');
        }


        Mail::to(Auth::user())->send(new ServicioComprado($servicio));

        $user->servicios()->attach($servicio->servicio_id);
        return redirect()
            ->back()
            ->with('feedback.message', 'Contrataste el servicio ' . $servicio['nombre'] . ' con éxito')->with('feedback.type', 'success');
    }

    public function index()
    {
        $servicios = Servicio::all();
        return view('servicios.index', compact('servicios'));
    }

    public function cancelar(Request $request, $id)
    {
        $user = Auth::user();

        $servicio = Servicio::findOrFail($id);

        if (!$user->servicios()
            ->where('servicio_user.servicio_id', $servicio->servicio_id)
            ->exists()) {
            return redirect()
                ->back()
                ->with('feedback.message', 'No tienes contratado este servicio.')
                ->with('feedback.type', 'info');
        }

        $user->servicios()->detach($servicio->servicio_id);
        return redirect()
            ->back()
            ->with('feedback.message', 'Cancelaste el servicio ' . $servicio['nombre'] . ' con éxito')->with('feedback.type', 'success');
    }
}
