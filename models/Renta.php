<?php

  class Renta {
    private $id;
    private $usuarioId;
    private $autoId;
    private $diaInicio;
    private $diaFin;
    private $costoEstimado;
    private $finReal;
    private $costoReal;
    private $pagoId;

    public function __construct ($usuarioId, $autoId, $diaInicio, $diaFin, $costoEstimado, $finReal, $costoReal, $pagoId) {
      $this->usuarioId = $usuarioId;
      $this->autoId = $autoId;
      $this->diaInicio = $diaInicio;
      $this->diaFin = $diaFin;
      $this->costoEstimado = $costoEstimado;
      $this->finReal = $finReal;
      $this->costoReal = $costoReal;
      $this->pagoId = $pagoId;
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

    public function getPagoId() {
      return $this->pagoId;
    }

    public function setId($id) {
    	$this->id= $id;
    }

    public function setUsuarioId($usuarioId) {
      $this->usuarioId = $usuarioId;
    }

    public function setAutoId($autoId) {
      $this->autoId = $autoId;
    }

    public function setDiaInicio($diaInicio) {
      $this->diaInicio = $diaInicio;
    }

    public function setDiaFin($diaFin) {
      $this->diaFin = $diaFin;
    }

    public function setCostoEstimado($costoEstimado) {
      $this->costoEstimado = $costoEstimado;
    }

    public function setFinReal($finReal) {
      $this->finReal = $finReal;
    }  

    public function setCostoReal($costoReal) {
      $this->costoReal = $costoReal;
    }
    public function setPagoId($pagoId) {
      $this->pagoId = $pagoId;
    }
	}
?>