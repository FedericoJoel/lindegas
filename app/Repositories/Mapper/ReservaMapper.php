<?php

namespace App\Repositories\Mapper;

use App\Domain\Reserva;

class ReservaMapper
{

    public function __construct()
    {
        $this->itemMapper = new ItemMapper();
    }

    public function map($objeto)
    {
        $reserva =  new Reserva($objeto->id, $objeto->fecha_reserva, $objeto->estado);

        if($objeto->relationLoaded('items'))
        {
            $items = $objeto->items->map(function($item){
                return $this->itemMapper->map($item);
            });
            $reserva->setItems($items);
        }
        return $reserva;
    }
}