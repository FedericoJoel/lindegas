<?php

namespace App\Repositories\Mapper;

use App\Domain\Item;

class ItemMapper
{

    public function map($objeto)
    {
        return new Item($objeto->id, $objeto->nombre, $objeto->precio, $objeto->descripcion, $objeto->personas);
    }
}