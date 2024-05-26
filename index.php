<?php
  require_once '../rentaAutos-back/controllers/UserController.php';
  require_once '../rentaAutos-back/controllers/AutosController.php';
  require_once '../rentaAutos-back/controllers/RentasController.php';

  $userController = new UserController();
  $AutosController = new AutosController();
  $RentasController = new RentasController();

  switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
      $accion = $_POST['accion'];
      if($accion == 'registrar'){
        $userController->registrar();
      } else if($accion == 'login'){
        $userController->login();
      } else if($accion == 'rentar'){
        $RentasController->registrarRenta();
      } else if($accion == 'buscarCostoDia'){
        $autoID = $_POST['autID'];
        $AutosController->obtenerCostoDiaPorID($autoID);
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