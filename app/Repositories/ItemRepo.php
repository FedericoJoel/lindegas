<?php

namespace App\Repositories;


use App\Item;
use App\Repositories\Mapper\ItemMapper;

class ItemRepo extends Repositorio
{
    public function __construct()
    {
        $this->gateway = new Item();
        $this->mapper = new ItemMapper();
    }

    function model()
    {
        return 'App\Repositories\ItemRepo';
    }

}