<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre', 'precio', 'id_boliche', 'descripcion', 'personas'
    ];

    public function reservas()
    {
        return $this->belongsToMany('App\Reserva', 'item_reserva', 'id_item', 'id_reserva');
    }
}
