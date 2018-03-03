<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matriz extends Model
{

    public $timestamps = false;

    protected $table = 'Matriz';

    protected $fillable = [
        'conflicto', 'criticidad', 'descripcion', 'duty1','duty2'
    ];

    public function duty1()
    {
        return $this->belongsTo('App\Duty', 'duty1');
    }

    public function duty2()
    {
        return $this->belongsTo('App\Duty', 'duty2');
    }

}
