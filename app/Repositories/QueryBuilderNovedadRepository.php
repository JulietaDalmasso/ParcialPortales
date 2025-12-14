<?php
namespace App\Repositories;

use App\Models\Novedad;
use Illuminate\Support\Facades\DB;

class QueryBuilderNovedadRepository implements NovedadRepository
{
    public function insert(array $data)
    {
        DB::transaction(function() use ($data) {
           DB::table('novedades')->insert([
            'titulo' => $data['titulo'],
            'contenido' => $data['contenido'],
            'descripcion' => $data['descripcion'],
            'imagen' => $data['imagen'] ?? null,
            ]);
            $id = DB::getLastInsertId();

            if(!empty($data['categories'])){
                DB::table('novedades_haves_categories')->insert(
                    array_map(
                        fn($category_id) => [
                            'novedad_fk' => $id,
                            'category_fk' => $category_id,
                        ], 
                        $data['categories'])
                );
            } 
        });
    }

    public function update(mixed $pk, array $data)
    {
        DB::transaction(function() use ($pk, $data){
            DB::table('novedades')
            ->where('novedad_id', $pk)
            ->update([
                'titulo' => $data['titulo'],
                'contenido' => $data['contenido'],
                'descripcion' => $data['descripcion'],
                'imagen' => $data['imagen'] ?? null,
            ]);
        });

        DB::table('novedades_haves_categories')->where('novedad_fk', $pk)->delete();
        DB::table('novedades_have_categories')->insert(
            array_map(
                fn($category_id) => [
                    'novedad_fk' => $pk,
                    'category_fk' => $category_id,
                ], 
                $data['categories'])
        );
    }

    public function delete(mixed $pk)
    {
       DB::table('novedades')->delete($pk);
    }

    public function find(mixed $pk)
    {
        /* return DB::table('novedades')->select()->where('novedad_id', '=', $pk)->first(); */
        return Novedad::findOrFail($pk);
    }

    public function all()
    {
        // Implementation using Query Builder
    }
}