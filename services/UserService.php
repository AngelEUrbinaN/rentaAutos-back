<?php

  require_once '../rentaAutos-back/models/User.php';
  require_once '../rentaAutos-back/db/Database.php';
  require_once '../rentaAutos-back/interfaces/UserInterface.php';

  class UserService implements UserInterface {
    private $db;

    public function __construct ($db){
      $this->db = $db;
    }

    public function registrarUsuario($usuario) {
      $nombre = $usuario->getNombre();
      $apellidos = $usuario->getApellidos();
      $fechaNacimiento = $usuario->getFechaNacimiento();
      $genero = $usuario->getGenero();
      $correo = $usuario->getCorreo();
      $telefono = $usuario->getTelefono();
      $direccion = $usuario->getDireccion();
      $password = password_hash($usuario->getPassword(), PASSWORD_DEFAULT);

      $sql_insertar = "INSERT INTO usuario(usu_id, usu_nombre, usu_apellidos, usu_fechaNacimiento, usu_genero, usu_correo, usu_telefono, usu_direccion, usu_password)
                          VALUES (null, '$nombre', '$apellidos', '$fechaNacimiento', '$genero', '$correo', '$telefono', '$direccion', '$password')";

      if ($this->db->query($sql_insertar) == TRUE ) {
        return true;
      } else {
        return false;
      }
    }

    public function login($correo, $password){
      $sql_usuario = "SELECT * FROM usuario WHERE usu_correo = '$correo'";
      $result = $this->db->query($sql_usuario);
      if ($result->num_rows == 1) { //si encontro el usuario
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['usu_password'])){
          return $user;
        }
      }
      return false;
    }

    public function obtenerUsuarioPorCorreo($correo){
      $sql = "SELECT * FROM usuario WHERE usu_correo = '$correo'";
      $result = $this->db->query($sql);

      if($result->num_rows == 1){
        return $result->fetch_assoc();
      }
      return null; //regresamos los usuarios
    }

    public function obtenerUsuarioPorId($id){
      $sql = "SELECT * FROM usuario WHERE usu_id = '$id'";
      $result = $this->db->query($sql);

      if($result->num_rows == 1){
        return $result->fetch_assoc();
      }

      return null; 
    }

    public function actualizarUsuario($id, $usuario){
      $nombre = $usuario->getNombre();
      $apellidos = $usuario->getApellidos();
      $fechaNacimiento = $usuario->getFechaNacimiento();
      $genero = $usuario->getGenero();
      $correo = $usuario->getCorreo();
      $telefono = $usuario->getTelefono();
      $direccion = $usuario->getDireccion();
      $password = $usuario->getPassword();

      $sql_update = "UPDATE usuario 
        SET usu_nombre = '$nombre', 
            usu_apellidos = '$apellidos', 
            usu_fechaNacimiento = '$fechaNacimiento',
            usu_genero = '$genero',
            usu_correo = '$correo',
            usu_telefono = '$telefono',
            usu_direccion = '$direccion',
            usu_password = '$password'
        WHERE usu_id = '$id'";

      if($this->db->query($sql_update) === TRUE){
        return true;
      } else {
        return false;
      }
    }

    public function eliminarUsuario($id) {
      $sql_delete = "DELETE FROM usuario WHERE usu_id = '$id'";

      if ($this->db->query($sql_delete) === TRUE) {
        return true;
      } else {
        return false;
      }
    }
  }
?>