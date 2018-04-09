<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{

    public $timestamps = false;

    protected $table = 'Duty';

    protected $fillable = [
        'nombre', 'proceso'
    ];

    public function perfiles()
    {
        return $this->belongsToMany('App\Operador', 'Rel_Duty_Perfil', 'perfil', 'idduty');
    }
}
