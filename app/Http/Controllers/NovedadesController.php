<?php

namespace App\Http\Controllers;

use App\Models\Novedad;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\EloquentNovedadRepository;
use App\Repositories\NovedadRepository;
use Illuminate\Support\Facades\DB;

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

    public function __construct(
        protected NovedadRepository $repo
    )
    {} 

    public function blog(Request $request)
    {
        $novedadQuery = Novedad::with('categories');

        $searchParams = [
            'categories' => $request->query('categories')
        ];

        if ($searchParams['categories']) {
            $novedadQuery->whereRelation('categories', 'category_id', $searchParams['categories']);
        }

        $allNovedades = $novedadQuery->paginate(6)->withQueryString();

        return view('blog', [
            'novedades' => $allNovedades,
            'categories' => Category::all(),
            'searchParams' => $searchParams, 
        ]);
    }

    public function detalle(int $id)
    {
        $novedad = Novedad::findOrFail($id);
        return view('novedades.detalle', compact('novedad'));
    }

    public function crear()
    {
        $categories = Category::all();
        return view('novedades.crear', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate($this->validationRules,$this->validationMessages); 

        try {
            $data = $request->only(['titulo', 'contenido', 'descripcion', 'imagen']);

            if ($request->hasFile('imagen')) {
                $data['imagen'] = $request->file('imagen')->store('imagenes', 'public');
            }

            /* DB::transaction(function () use ($data, $request) {
                $novedad = Novedad::create($data);
                $novedad->categories()->attach($request->input('categories', []));
            }); */
            $data['categories'] = $request->input('categories', []);
            /* $repo = new EloquentNovedadRepositorie(); */
            $this->repo->insert($data);
             
            return to_route('blog')
                ->with('feedback.message', 'El blog ' . $data['titulo'] . ' se creó correctamente');
        } catch (\Throwable $th) {
            return to_route('blog')
                ->with('feedback.message', 'Ocurrio un error, el blog no se pudo crear')
                ->with('feedback.type', 'danger');
        }
    }

    public function editar(int $id) 
    {
        return view('novedades.editar', [
            'novedad'=> $this->repo->find($id),
            'categories' => Category::all()
        ]);
    } 

    public function actualizar(Request $request, int $id)
    {
        $request->validate($this->validationRules,$this->validationMessages);

        try {
            $data = $request->only(['titulo', 'contenido', 'descripcion', 'imagen']);

            /* $novedad = Novedad::findOrFail($id); */
            $novedad = $this->repo->find($id);
            $oldImagen = null;

            if ($request->hasFile('imagen')) {
                $data['imagen'] = $request->file('imagen')->store('imagenes', 'public');
                $oldImagen = $novedad->imagen;
            }

            $data['categories'] = $request->input('categories', []);
            $this->repo->update($id, $data);

            //  Elimina imagen anterior si existe
            if ($oldImagen !== null && \Storage::exists($oldImagen)) {
                \Storage::delete($oldImagen);
            }

            return to_route('blog')
                ->with('feedback.message', 'El blog ' . $data['titulo'] . ' se actualizó correctamente');
        } catch (\Throwable $th) {
            return to_route('blog')
                ->with('feedback.message', 'Ocurrio un error, el blog no se pudo actualizar')
                ->with('feedback.type', 'danger');
        }
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
            
            /* DB::transaction(function () use ($novedad) {
                $novedad->categories()->detach();
                $novedad->delete();
            }); */
            $this->repo->delete($id);
 
            if ($novedad->imagen && \Storage::exists($novedad->imagen)) {
                \Storage::delete($novedad->imagen);
            }

            return to_route('blog')
                ->with('feedback.message', 'El blog ' . $novedad->titulo . ' se eliminó correctamente');
        } catch (\Throwable $th) {
            return to_route('blog')
                ->with('feedback.message', 'Ocurrio un error, el blog no se pudo eliminar')
                ->with('feedback.type', 'danger');
        }
    } 
}
