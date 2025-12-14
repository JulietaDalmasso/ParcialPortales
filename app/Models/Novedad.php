<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Novedad extends Model
{
    protected $table = 'novedades';

    protected $primaryKey = 'novedad_id';

    protected $fillable = [
    'titulo',
    'contenido',
    'descripcion',
    'imagen',
    ];

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'novedades_have_categorys',
            'novedad_fk',
            'category_fk',
            'novedad_id',
            'category_id'
        );
    }

}
