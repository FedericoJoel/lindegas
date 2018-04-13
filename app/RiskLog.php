<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiskLog extends Model
{

    public $timestamps = false;

    protected $table = 'Risk_Log';

    protected $fillable = [
        'id_usuario', 'id_ticket', 'descripcion', 'conflicto', 'fecha', 'operador'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'id_usuario');
    }

    protected $filiable = ['id_usuario','id_ticket','descripcion','conflicto','operador'];

}
