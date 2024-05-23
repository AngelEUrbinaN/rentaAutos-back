<?php
  require_once '../rentaAutos-back/controllers/UserController.php';
  require_once '../rentaAutos-back/controllers/AutosController.php';
  require_once '../rentaAutos-back/controllers/RentaController.php'; //Comentario

  $userController = new UserController();
  $AutosController = new AutosController();
  $RentaController = new RentaController();

  switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
      $accion = $_POST['accion'];
      if($accion == 'registrar'){
        $userController->registrar();
      } else if($accion == 'login'){
        $userController->login();
      } else if($accion == 'registrarRenta'){
        $RentaController->registrarRenta();
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