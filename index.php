<?php
  require_once '../rentaAutos-back/controllers/UserController.php';
  require_once '../rentaAutos-back/controllers/AutosController.php';

  $userController = new UserController();
  $AutosController = new AutosController();

  switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
      $accion = $_POST['accion'];
      if($accion == 'registrar'){
        $userController->registrar();
      } else if($accion == 'login'){
        $userController->login();
      }
    break;
    case 'GET':
      $accion = $_GET['accion'];
      if ($accion == 'todos') {
        $AutosController->obtenerTodosAutos();
      }
    break;
  }
?>