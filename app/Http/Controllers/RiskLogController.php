<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Repositories\RiskLogRepo;
use Illuminate\Http\Request;

class RiskLogController extends Controller
{

    private $repo;

    public function __construct(RiskLogRepo $repo)
    {
        $this->repo = $repo;
    }

    public function store(Request $request)
    {
        $this->repo->create($request->all());
    }

    public function show($id)
    {
        return $this->repo->find($id);
        //$users = DB::table('Usuarios')->where('ID',$id)->fisrt();
        //return $users;
    }

    public function getAll()
    {
        return $this->repo->all();
    }
}
