<?php

namespace App\Repositories;


use App\Reserva;
use App\Repositories\Mapper\ReservaMapper;

class ReservaRepo extends Repositorio
{
    public function __construct()
    {
        $this->gateway = new Reserva();
        $this->mapper = new ReservaMapper();
    }

    function model()
    {
        return 'App\Repositories\ReservaRepo';
    }

    public function find($id)
    {
        $obj = $this->gateway->with('items')->find($id);
        return $this->mapper->map($obj);
    }

    public function all()
    {
        $obj = $this->gateway->with('items')->get();
        return $obj->map(function($obj) {
            return $this->mapper->map($obj);
        });
    }



}