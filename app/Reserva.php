<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_boliche', 'estado', 'fecha_reserva'
    ];

    public function items()
    {
        return $this->belongsToMany('App\Item', 'item_reserva', 'id_reserva', 'id_item');
    }

}
