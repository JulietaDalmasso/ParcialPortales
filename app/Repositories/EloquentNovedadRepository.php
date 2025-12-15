<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Novedad;

class EloquentNovedadRepository implements NovedadRepository
{
    /* protected $model;

    public function __construct(\App\Models\Novedad $model)
    {
        $this->model = $model;
    } */

    public function insert(array $data)
    {
        DB::transaction(function () use ($data) {
            $novedad = Novedad::create($data);
            $novedad->categories()->attach($data['categories']);
        });
    }

    public function update(mixed $pk, array $data)
    {
        $novedad = $this->find($pk);
        DB::transaction(function () use ($novedad, $data) {
            $novedad->update($data);
            $novedad->categories()->sync($data['categories']);
        });
    }

    public function delete(mixed $pk)
    {
        $novedad = $this->find($pk);
        DB::transaction(function () use ($novedad) {
            $novedad->categories()->detach();
            $novedad->delete();
        });
    }

    public function find(mixed $pk)
    {
        return Novedad::findOrFail($pk);
    }

    public function all()
    {
        /* return $this->model->all(); */
    }
}
