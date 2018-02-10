<?php
/**
 * Created by PhpStorm.
 * User: joaquin
 * Date: 09/10/17
 * Time: 21:37
 */

namespace App\Domain;


use App\Traits\Conversion;

class Item
{
    use Conversion;

    private $id;
    private $nombre;
    private $precio;
    private $descripcion;
    private $personas;

    /**
     * Item constructor.
     * @param $id
     * @param $nombre
     * @param $precio
     * @param $descripcion
     * @param $personas
     */
    public function __construct($id, $nombre, $precio, $descripcion, $personas)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->personas = $personas;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getPersonas()
    {
        return $this->personas;
    }

    /**
     * @param mixed $personas
     */
    public function setPersonas($personas)
    {
        $this->personas = $personas;
    }




}