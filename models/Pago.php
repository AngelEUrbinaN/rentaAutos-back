<?php

  class Pago {
    private $id;
    private $monto;
    private $fecha;
    private $metodo;

    public function __construct ($monto, $fecha, $metodo) {
      $this->monto = $monto;
      $this->fecha = $fecha;
      $this->metodo = $metodo;
    }

    public function getId() {
      return $this->id;
    }

    public function getMonto() {
      return $this->monto;
    }

    public function getFecha() {
      return $this->fecha;
    }

		public function getMetodo() {
      return $this->metodo;
    }

    public function setId($id) {
    	$this->id= $id;
    }

    public function setMonto($monto) {
      $this->monto = $monto;
    }

    public function setFecha($fecha) {
      $this->fecha = $fecha;
    }

		public function setMetodo($metodo) {
      $this->metodo = $metodo;
    }
	}
?>