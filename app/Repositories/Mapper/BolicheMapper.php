<?php

namespace App\Repositories\Mapper;

use App\Domain\Boliche;

class BolicheMapper
{

    public function __construct()
    {
        $this->itemMapper = new ItemMapper();
        $this->reservaMapper = new ReservaMapper();
    }

    public function map($objeto)
    {
        $boliche = new Boliche($objeto->id, $objeto->nombre, $objeto->facebook, $objeto->instagram, $objeto->twitter, $objeto->puntuacion, $objeto->domicilio, $objeto->descripcion, $objeto->telefono, $objeto->horario, $objeto->latitud, $objeto->longitud);

        if($objeto->relationLoaded('reservas'))
        {
            $reservas = $objeto->reservas->map(function($reserva){
                return $this->reservaMapper->map($reserva);
            });
            $boliche->setReservas($reservas);
        }
        else if($objeto->relationLoaded('items'))
        {
            $items = $objeto->items->map(function($item){
                return $this->itemMapper->map($item);
            });
            $boliche->setItems($items);
        }

        return $boliche;
    }
}