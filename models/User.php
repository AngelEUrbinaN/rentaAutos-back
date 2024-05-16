<?php

  class User  {
    private $id;
    private $nombre;
    private $apellidos;
    private $fechaNacimiento;
    private $genero;
    private $correo;
    private $telefono;
    private $direccion;
    private $password;


    public function __construct ($nombre, $apellidos, $fechaNacimiento, $genero, $correo, $telefono, $direccion, $password) {
      $this->nombre = $nombre;
      $this->apellidos = $apellidos;
      $this->fechaNacimiento = $fechaNacimiento;
      $this->genero = $genero;
      $this->correo = $correo;
      $this->telefono = $telefono;
      $this->direccion = $direccion;
      $this->password = $password;
    }

    public function getId() {
      return $this->id;
    }

    public function getNombre() {
      return $this->nombre;
    }

    public function getApellidos() {
      return $this->apellidos;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getCorreo() {
      return $this->correo;
    }

    public function getTelefono() {
        return $this->telefono;
    }  

    public function getDireccion() {
      return $this->direccion;
    }

    public function getPassword() {
      return $this->password;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }

    public function setApellidos($apellidos) {
      $this->apellidos = $apellidos;
    }

    public function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setDireccion($direccion) {
      $this->direccion = $direccion;
    }
    
    public function setPassword($password) {
      $this->password = $password;
    }
  }
?>