<?php
/**
 * Created by PhpStorm.
 * User: joaquin
 * Date: 27/05/17
 * Time: 00:45
 */

namespace App\Repositories;


use App\Usuario;
use Illuminate\Container\Container as App;


abstract class Repositorio implements abmInterface
{
    private $app;
    protected $model;

    public function __construct() {
        $this->app = new App();
        $this->makeModel();
    }

    abstract function model();

    public function create(array $data)
    {
        $obj = $this->gateway->create($data);
        return $obj;
    }

    public function update(array $data, $id)
    {
        $obj = $this->gateway->findOrFail($id);
        $obj->fill($data);
        $obj->save();
        return $obj;
    }

    public function destroy($id)
    {
        return $this->gateway->destroy($id);

    }

    public function all()
    {
        return $this->gateway->all();
//        return Usuario::all();
//        return $obj->map(function($obj){
//            return $obj;
//        });
    }

    public function find($id)
    {
        $obj = $this->gateway->findOrFail($id);
        return $obj;
    }

    public function findByUser($userId)
    {
        $obj = $this->gateway->findByUser($userId);
        return $obj;
    }

    public function attach($ids, $attach, $id)
    {
        $reserva = $this->gateway->find($id);
        $reserva->$attach()->attach($ids);
        return $this->mapper->map($reserva);
    }

    public function makeModel() {
        $model = $this->app->make($this->model());
        return $this->model = $model;
    }
}