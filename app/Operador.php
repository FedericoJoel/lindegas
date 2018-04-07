<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operador extends Model
{

    protected $primaryKey = 'operador';

    protected $fillable = [
        'operador', 'sucursal', 'nombre_operador', 'clave_operador', 'fecha_de_expiracion', 'habilitado_sn', 'Email', 'User_AD'
    ];

}
