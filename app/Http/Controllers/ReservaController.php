<?php

namespace App\Http\Controllers;

use App\Repositories\ReservaRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    private $repo;

    public function __construct(ReservaRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = collect($request['items']);
        $idBoliche = $request['id_boliche'];
        $reserva = $this->repo->create(['fecha_reserva' => Carbon::today()->toDateString(), 'id_boliche' => $idBoliche, 'estado' => 'creado']);
        $ids = $items->map(function($item) {return $item['id'];})->toArray();
        $this->repo->attach($ids, 'items', $reserva->getId());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva = $this->repo->find($id);
        return $reserva->toArray($reserva);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->repo->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repo->destroy($id);
    }

    public function all()
    {
        return $this->repo->all()->map(function($elem){
            return $elem->toArray($elem);
        });
    }
}
