<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boliche extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre', 'latitud', 'longitud', 'twitter', 'facebook', 'instagram', 'puntuacion', 'domicilio', 'descripcion', 'telefono', 'horario'
    ];

    protected $dates = ['deleted_at'];

    public function reservas()
    {
        return $this->hasMany('App\Reserva', 'id_boliche', 'id');
    }

    public function items()
    {
        return $this->hasMany('App\Item', 'id_boliche', 'id');
    }
}
