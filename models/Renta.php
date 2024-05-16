<?php

  class Renta  {
    private $id;
    private $usuarioId;
    private $autoId;
    private $diaInicio;
    private $diaFin;
    private $costoEstimado;
    private $finReal;
    private $costoReal;

    public function __construct ($usuarioId, $autoId, $diaInicio, $diaFin, $costoEstimado, $finReal, $costoReal) {
      $this->usuarioId = $usuarioId;
      $this->autoId = $autoId;
      $this->diaInicio = $diaInicio;
      $this->diaFin = $diaFin;
      $this->costoEstimado = $costoEstimado;
      $this->finReal = $finReal;
      $this->costoReal = $costoReal;
    }

    public function getId() {
      return $this->id;
    }

    public function getUsuarioId() {
      return $this->usuarioId;
    }

    public function getAutoId() {
      return $this->autoId;
    }

    public function getDiaInicio() {
      return $this->diaInicio;
    }

    public function getDiaFin() {
      return $this->diaFin;
    }

    public function getCostoEstimado() {
      return $this->costoEstimado;
    }

    public function getFinReal() {
      return $this->finReal;
    }  

    public function getCostoReal() {
      return $this->costoReal;
    }

    public function setId() {
    	$this->id= $id;
    }

    public function setUsuarioId() {
      $this->usuarioId = $usuarioId;
    }

    public function setAutoId() {
      $this->autoId = $autoId;
    }

    public function setDiaInicio() {
      $this->diaInicio = $diaInicio;
    }

    public function setDiaFin() {
      $this->diaFin = $diaFin;
    }

    public function setCostoEstimado() {
      $this->costoEstimado = $costoEstimado;
    }

    public function setFinReal() {
      $this->finReal = $finReal;
    }  

    public function setCostoReal() {
      $this->costoReal = $costoReal;
    }
	}
?>