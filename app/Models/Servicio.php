<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $servicio_id
 * @property string $nombre
 * @property int $precio
 * @property string $descripcion
 * @property string|null $descripcion_corta
 * @property string|null $imagen
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereDescripcionCorta($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereServicioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Servicio extends Model
{
    /* protected $table = 'servicios'; */

    protected $primaryKey = 'servicio_id';

    protected $fillable = [
    'nombre',
    'precio',
    'descripcion',
    'descripcion_corta',
    'imagen',
    ];

    //Accesors y Mutators
    /* protected function precio(): Attribute
    {
        return Attribute::make(
            function($value) {
                return $value / 100; 
            },
            function($value) {
                return $value * 100; 
            }
        );
    } */
}
