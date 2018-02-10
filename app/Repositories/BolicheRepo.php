<?php

namespace App\Repositories;


use App\Boliche;
use App\Repositories\Mapper\BolicheMapper;

class BolicheRepo extends Repositorio
{
    public function __construct()
    {
        $this->gateway = new Boliche();
        $this->mapper = new BolicheMapper();
    }

    function model()
    {
        return 'App\Repositories\BolicheRepo';
    }

    public function findItems($id)
    {
        $obj = $this->gateway->with('items')->find($id);
        return $this->mapper->map($obj);
    }
}