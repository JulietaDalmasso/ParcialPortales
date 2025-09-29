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
}
