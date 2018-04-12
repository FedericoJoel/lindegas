<?php

namespace App\Repositories;

use App\Repositories\Mapper\RiskLogMapper;
use App\RiskLog;

class RiskLogRepo extends Repositorio
{
    public function __construct()
    {
        $this->gateway = new RiskLog();
        $this->mapper = new RiskLogMapper();
    }

    function model()
    {
        return 'App\Repositories\RiskLogRepo';
    }

    protected $filiable = ['id_usuario','id_ticket','descripcion','conflicto','operador'];

//    public function all()
//    {
//        return $this->gateway->with(['usuario'])->get();
//    }
}