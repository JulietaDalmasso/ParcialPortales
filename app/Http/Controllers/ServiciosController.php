<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiciosController extends Controller
{
    public function index()
    {
        /* $servicios = DB::table('servicios')
        ->select()
        ->get(); */

        $servicios = Servicio::all();

        /* dd($servicios); */
        return view('servicios.index', compact('servicios'));
    }

    public function detalle(int $id)
    {
        $servicio = Servicio::findOrFail($id);

        
        return view('servicios.detalle', compact('servicio'));
    }

    public function crear()
    {
        return view('servicios.crear');
    }

    public function store(Request $request)
    {
        return view('servicios.store');
    }
}
