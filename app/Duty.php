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

}
