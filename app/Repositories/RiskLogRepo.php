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

    public function create(array $data)
    {
        return $data;
//        $obj = $this->gateway->insert($data);
//        return $obj;
    }

//    public function all()
//    {
//        return $this->gateway->with(['usuario'])->get();
//    }
}