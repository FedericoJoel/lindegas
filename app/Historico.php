<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{

    public $timestamps = false;

    protected $table = 'Historico';

    protected $fillable = [
        'Low', 'High', 'Medium', 'Critical', 'Fecha_Analisis'
    ];

}
