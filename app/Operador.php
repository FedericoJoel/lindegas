<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operador extends Model
{
    protected $table = 'Operador';

    protected $primaryKey = 'operador';

    protected $fillable = [
        'operador', 'sucursal', 'nombre_operador', 'clave_operador', 'fecha_de_expiracion', 'habilitado_sn', 'Email', 'User_AD'
    ];

    public function duties()
    {
        return $this->belongsToMany('App\Duty', 'Rel_Duty_Perfil', 'perfil', 'idduty');
    }

}
