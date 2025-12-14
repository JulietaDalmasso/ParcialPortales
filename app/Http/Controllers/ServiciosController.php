<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class ServiciosController extends Controller
{
    private array $validationRules = [
        'nombre' => 'required|min:2',
        'precio' => 'required|numeric',
        'descripcion' => 'required|min:10',
    ];

    private array $validationMessages = [
        'nombre.required' => 'El nombre es obligatorio',
        'nombre.min' => 'El nombre debe tener al menos :min caracteres',
        'precio.required' => 'El precio es obligatorio',
        'precio.numeric' => 'El precio debe ser un número',
        'descripcion.required' => 'La descripción es obligatoria',
        'descripcion.min' => 'La descripción debe tener al menos :min caracteres',
    ];

    public function index()
    {
        $servicios = Servicio::all();
        return view('servicios.index', compact('servicios'));
    }

    public function detalle(int $id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('servicios.detalle', compact('servicio'));
    }

    public function crear()
    {
        return view('servicios.crear', [
            'categories'=> Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate($this->validationRules,$this->validationMessages);

        $data = $request->only(['nombre', 'precio', 'descripcion', 'descripcion_corta', 'imagen']);

        $servicio = Servicio::create($data);

        return to_route('servicios')
        ->with('feedback.message', 'El servicio ' . $data['nombre'] . ' se creó correctamente');
    }

    public function editar(int $id) 
    {
        return view('servicios.editar', [
            'servicio'=> Servicio::findOrFail($id)
        ]);
    } 

    public function actualizar(Request $request, int $id)
    {
        $request->validate($this->validationRules,$this->validationMessages);

        $data = $request->only(['nombre', 'precio', 'descripcion', 'descripcion_corta', 'imagen']);

        $servicio = Servicio::findOrFail($id);
        $servicio->update($data);

        return to_route('servicios')
        ->with('feedback.message', 'El servicio ' . $data['nombre'] . ' se actualizó correctamente');
    }

    public function eliminar(int $id) 
    {
        return view('servicios.eliminar', [
            'servicio'=> Servicio::findOrFail($id)
        ]);
    }

    public function destruir(int $id)
    {
        try {
            $servicio = Servicio::findOrFail($id);
            $servicio->delete();
 
            return to_route('servicios')
            ->with('feedback.message', 'El servicio ' . $servicio->nombre . ' se eliminó correctamente');
        } catch (\Throwable $th) {
            return to_route('servicios')
            ->with('feedback.message', 'Ocurrio un error, el servicio no se pudo eliminar')
            ->with('feedback.type', 'danger');
        }
        
    }
}
