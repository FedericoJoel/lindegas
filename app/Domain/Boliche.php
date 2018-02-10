<?php
/**
 * Created by PhpStorm.
 * User: joaquin
 * Date: 09/10/17
 * Time: 16:59
 */

namespace App\Domain;


use App\Traits\Conversion;

class Boliche
{
    use Conversion;

    private $id;
    private $nombre;
    private $facebook;
    private $instagram;
    private $twitter;
    private $puntuacion;
    private $domicilio;
    private $descripcion;
    private $telefono;
    private $horario;
    private $latitud;
    private $longitud;
    private $reservas;
    private $items;

    /**
     * Boliche constructor.
     * @param $id
     * @param $nombre
     * @param $facebook
     * @param $instagram
     * @param $twiter
     * @param $puntuacion
     * @param $domicilio
     * @param $descripcion
     * @param $telefono
     * @param $horario
     */

    public function __construct($id, $nombre, $facebook, $instagram, $twitter, $puntuacion, $domicilio, $descripcion, $telefono, $horario, $latitud, $longitud)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->facebook = $facebook;
        $this->instagram = $instagram;
        $this->twitter = $twitter;
        $this->puntuacion = $puntuacion;
        $this->domicilio = $domicilio;
        $this->descripcion = $descripcion;
        $this->telefono = $telefono;
        $this->horario = $horario;
        $this->latitud = $latitud;
        $this->longitud = $longitud;

    }

    public function getReservas()
    {
        if($this->reservas == null)
        {

        }
        return $this->reservas;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $reservas
     */
    public function setReservas($reservas)
    {
        $this->reservas = $reservas;
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
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param mixed $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return mixed
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * @param mixed $instagram
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }

    /**
     * @return mixed
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @param mixed $twiter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
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

    /**
     * @return mixed
     */
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    /**
     * @param mixed $puntuacion
     */
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;
    }

    /**
     * @return mixed
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * @param mixed $domicilio
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;
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
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * @param mixed $horario
     */
    public function setHorario($horario)
    {
        $this->horario = $horario;
    }


}