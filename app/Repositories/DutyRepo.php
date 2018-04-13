<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;
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

    public function perfilesdeDuty($id){
        $perfiles = DB::table('Rel_Duty_Perfil')->where('idduty',$id)->get();
        return $perfiles;
    }

//    public function all(){
//        return Duty::with('perfiles')->get()->toJson();
//    }

//    public function attachear(Request $request){
//        $duty = $this->gateway->find($request['id']);
//        $duty->attach()->
//    }

}