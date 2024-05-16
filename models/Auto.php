<?php

  class Auto  {
    private $id;
    private $modelo;
    private $asientos;
    private $transmision;
    private $costoDia;
    private $disponible;
    private $localizacion;
    private $imagen;

    public function __construct ($modelo, $asientos, $transmision, $costoDia, $disponible, $localizacion, $imagen) {
      $this->modelo = $modelo;
      $this->asientos = $asientos;
      $this->transmision = $transmision;
      $this->costoDia = $costoDia;
      $this->disponible = $disponible;
      $this->localizacion = $localizacion;
      $this->imagen = $imagen;
    }

    public function getId() {
      return $this->id;
    }

    public function getModelo() {
      return $this->modelo;
    }

    public function getAsientos() {
      return $this->asientos;
    }

    public function getTransmision() {
      return $this->transmision;
    }

    public function getCostoDia() {
      return $this->costoDia;
    }

    public function getDisponible() {
      return $this->disponible;
    }

    public function getLocalizacion() {
      return $this->localizacion;
    }  

    public function getImagen() {
      return $this->imagen;
    }
  }
?>