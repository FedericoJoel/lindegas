<?php
/**
 * Created by PhpStorm.
 * User: joaquin
 * Date: 09/10/17
 * Time: 21:41
 */

namespace App\Domain;


use App\Traits\Conversion;

class Reserva
{
    use Conversion;

    private $id;
    private $fecha_reserva;
    private $items;
    private $estado;

    /**
     * Reserva constructor.
     * @param $id
     * @param $fecha_reserva
     */
    public function __construct($id, $fecha_reserva, $estado)
    {
        $this->id = $id;
        $this->fecha_reserva = $fecha_reserva;
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
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
    public function getFechaReserva()
    {
        return $this->fecha_reserva;
    }

    /**
     * @param mixed $fecha_reserva
     */
    public function setFechaReserva($fecha_reserva)
    {
        $this->fecha_reserva = $fecha_reserva;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }




}