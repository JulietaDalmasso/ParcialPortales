<?php

namespace App\Http\Controllers;

use App\Models\Novedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class NovedadesController extends Controller
{
    private array $validationRules = [
        'titulo' => 'required|min:2',
        'contenido' => 'required|min:30',
        'descripcion' => 'required|min:10',
    ]; 

    private array $validationMessages = [
        'titulo.required' => 'El titulo es obligatorio',
        'titulo.min' => 'El titulo debe tener al menos :min caracteres',
        'contenido.required' => 'El contenido es obligatorio',
        'contenido.min' => 'El contenido debe tener al menos :min caracteres',
        'descripcion.required' => 'La descripción es obligatoria',
        'descripcion.min' => 'La descripción debe tener al menos :min caracteres',
    ]; 

    public function blog()
    {
        /* $novedades = DB::table('novedades')
        ->select()
        ->get(); */

        $novedades = Novedad::all();

        /* dd($novedades); */
        return view('blog', compact('novedades'));
    }

    public function detalle(int $id)
    {
        $novedad = Novedad::findOrFail($id);

        
        return view('novedades.detalle', compact('novedad'));
    }

    public function crear()
    {
        return view('novedades.crear');
    }

    public function store(Request $request)
    {

        $request->validate($this->validationRules,$this->validationMessages); 

        $data = $request->only(['titulo', 'contenido', 'descripcion', 'imagen']);

        $novedad = Novedad::create($data);

        return to_route('blog')
        ->with('feedback.message', 'El blog ' . $data['titulo'] . ' se creó correctamente');
    }

    public function editar(int $id) 
    {
        return view('novedades.editar', [
            'novedad'=> Novedad::findOrFail($id)
        ]);
    } 

    public function actualizar(Request $request, int $id)
    {
        $request->validate($this->validationRules,$this->validationMessages);

        $data = $request->only(['titulo', 'contenido', 'descripcion', 'imagen']);

        $novedad = Novedad::findOrFail($id);
        $novedad->update($data);

        return to_route('blog')
        ->with('feedback.message', 'El blog ' . $data['titulo'] . ' se actualizó correctamente');
    } 

    public function eliminar(int $id) 
    {
        return view('novedades.eliminar', [
            'novedad'=> Novedad::findOrFail($id)
        ]);
    } 

    public function destruir(int $id)
    {
        try {
            $novedad = Novedad::findOrFail($id);
            $novedad->delete();
 
            return to_route('blog')
            ->with('feedback.message', 'El blog ' . $novedad->titulo . ' se eliminó correctamente');
        } catch (\Throwable $th) {
            return to_route('blog')
            ->with('feedback.message', 'Ocurrio un error, el blog no se pudo eliminar')
            ->with('feedback.type', 'danger');
        }
        
    } 
}
