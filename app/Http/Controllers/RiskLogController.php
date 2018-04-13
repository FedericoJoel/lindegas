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
        $data = Array();
        $data =  $request->all();
        $this->repo->create($data);
    }

    public function show($id)
    {
        return $this->repo->find($id);
    }

    public function getAll()
    {
        return $this->repo->all();
    }

}