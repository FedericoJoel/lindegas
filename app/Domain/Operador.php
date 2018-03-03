<?php
/**
 * Created by PhpStorm.
 * User: FedeJoel
 * Date: 11/2/18
 * Time: 10:04 PM
 */

namespace App\Domain;

use App\Traits\Conversion;

class Operador
{

    private $operador;
    private $sucursal;
    private $nombre_operador;
    private $clave_operador;
    private $fecha_de_expiracion;
    private $habilitado_sn;
    private $Email;

    /**
     * Operador constructor.
     * @param $operador
     * @param $sucursal
     * @param $nombre_operador
     * @param $clave_operador
     * @param $fecha_de_expiracion
     * @param $habilitado_sn
     * @param $Email
     */
    public function __construct($operador, $sucursal, $nombre_operador, $clave_operador, $fecha_de_expiracion, $habilitado_sn, $Email)
    {
        $this->operador = $operador;
        $this->sucursal = $sucursal;
        $this->nombre_operador = $nombre_operador;
        $this->clave_operador = $clave_operador;
        $this->fecha_de_expiracion = $fecha_de_expiracion;
        $this->habilitado_sn = $habilitado_sn;
        $this->Email = $Email;
    }

    /**
     * @return mixed
     */
    public function getOperador()
    {
        return $this->operador;
    }

    /**
     * @param mixed $operador
     */
    public function setOperador($operador)
    {
        $this->operador = $operador;
    }

    /**
     * @return mixed
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }

    /**
     * @param mixed $sucursal
     */
    public function setSucursal($sucursal)
    {
        $this->sucursal = $sucursal;
    }

    /**
     * @return mixed
     */
    public function getNombreOperador()
    {
        return $this->nombre_operador;
    }

    /**
     * @param mixed $nombre_operador
     */
    public function setNombreOperador($nombre_operador)
    {
        $this->nombre_operador = $nombre_operador;
    }

    /**
     * @return mixed
     */
    public function getClaveOperador()
    {
        return $this->clave_operador;
    }

    /**
     * @param mixed $clave_operador
     */
    public function setClaveOperador($clave_operador)
    {
        $this->clave_operador = $clave_operador;
    }

    /**
     * @return mixed
     */
    public function getFechaDeExpiracion()
    {
        return $this->fecha_de_expiracion;
    }

    /**
     * @param mixed $fecha_de_expiracion
     */
    public function setFechaDeExpiracion($fecha_de_expiracion)
    {
        $this->fecha_de_expiracion = $fecha_de_expiracion;
    }

    /**
     * @return mixed
     */
    public function getHabilitadoSn()
    {
        return $this->habilitado_sn;
    }

    /**
     * @param mixed $habilitado_sn
     */
    public function setHabilitadoSn($habilitado_sn)
    {
        $this->habilitado_sn = $habilitado_sn;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }



}