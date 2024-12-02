<?php
  require_once '../rentaAutos-back/services/UserService.php';

  class UserController {
    private $userService;

    public function __construct() {
      $db = (new Database())->getConnection();
      $this->userService = new UserService($db);
    }

    public function login(){
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        //validamos que no esten vacios
        if(!empty($correo) && !empty($password)){
          $user = $this->userService->login($correo, $password);
          if ($user){
            // redirigir a otra página
            echo json_encode(array("success" => true, "message" => "Inicio Satisfactorio", "data" => $user));
          } else {
            echo json_encode(array("success" => false, "message" => "Credenciales Incorrectas"));
          }
          } else {
            echo json_encode(array("success" => false, "message" => "Faltan Datos"));
          }
          } else {
            echo json_encode(array("success" => false, "message" => "Tipo de peticion incorrecta"));
          }
    }

    public function registrar() {
      $nombre = $_POST['nombre'];
      $apellidos = $_POST['apellidos'];
      $fechaNacimiento = $_POST['fechaNacimiento'];
      $genero = $_POST['genero'];
      $correo = $_POST['correo'];
      $telefono = $_POST['telefono'];
      $direccion = $_POST['direccion'];
      $password = $_POST['password'];


      $usuarioNuevo = new User($nombre, $apellidos, $fechaNacimiento, $genero, $correo, $telefono, $direccion, $password);
      $resultado = $this->userService->registrarUsuario($usuarioNuevo);

      if($resultado){
        echo json_encode(array("success" => true, "message" => "Usuario Registrado Satisfactoriamente"));
      } else {
        echo json_encode(array("success" => false, "message" => "Error al registrar usuario"));
      }
    }

    public function obtenerUsuarioPorId ($id) {
      $resultado = $this->userService->obtenerUsuarioPorId($id);
      if ($resultado) {
        echo json_encode(array("success" => true, "user" => $resultado));
      } else {
        echo json_encode(array("success" => false, "message" => "Error al Obtener Usuario"));
      }
    }

    public function actualizarUsuario ($id) {
      $nombre = $_POST['nombre'];
      $apellidos = $_POST['apellidos'];
      $fechaNacimiento = $_POST['fechaNacimiento'];
      $genero = $_POST['genero'];
      $correo = $_POST['correo'];
      $telefono = $_POST['telefono'];
      $direccion = $_POST['direccion'];
      $password = $_POST['password'];

      $usuarioNuevo = new User($nombre, $apellidos, $fechaNacimiento, $genero, $correo, $telefono, $direccion, $password);
      
      $resultado = $this->userService->actualizarUsuario($id, $usuarioNuevo);

      if($resultado){
        echo json_encode(array("success" => true, "message" => "Usuario Actualizado Satisfactoriamente"));
      } else {
        echo json_encode(array("success" => false, "message" => "Error al Actualizar Usuario"));
      }
    }

    public function eliminarUsuario($id) {
      $resultado = $this->userService->eliminarUsuario($id);
  
      if ($resultado) {
          echo json_encode(array("success" => true, "message" => "Usuario Eliminado Satisfactoriamente"));
      } else {
          echo json_encode(array("success" => false, "message" => "Error al Eliminar Usuario"));
      }
  }
  
  }

?>