<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Repositories\HistoricoRepo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HistoricoController extends Controller
{

    private $repo;

    public function __construct(HistoricoRepo $repo)
    {

        $this->repo = $repo;
    }

    public function store(Request $request)
    {
        $now = Carbon::now();
        $data = Array();
        $data =  $request->all();
        $hoy = $now->toDateString();
        $data['Fecha_Analisis'] = $hoy;
        $this->repo->create($data);
    }

    public function getAll()
    {
        return $this->repo->all();
    }

    public function getHistorico($numero){
        return $this->repo->getUltimos($numero);
    }

}