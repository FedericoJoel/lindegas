<?php

namespace App\Repositories;

use App\Repositories\Mapper\UsuarioMapper;
use App\Usuario;

class UsuarioRepo extends Repositorio
{
    public function __construct()
    {
        $this->gateway = new Usuario();
        $this->mapper = new UsuarioMapper();
    }

    function model()
    {
        return 'App\Repositories\UsuarioRepo';
    }
}