<?php

namespace App\Repositories;

use App\Repositories\Mapper\DutyMapper;
use App\Duty;

class DutyRepo extends Repositorio
{
    public function __construct()
    {
        $this->gateway = new Duty();
        $this->mapper = new DutyMapper();
    }

    function model()
    {
        return 'App\Repositories\DutyRepo';
    }

//    public function attachear(Request $request){
//        $duty = $this->gateway->find($request['id']);
//        $duty->attach()->
//    }

}