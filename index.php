<?php
  require_once '../rentaAutos-back/controllers/UserController.php';
  require_once '../rentaAutos-back/controllers/AutosController.php';
  require_once '../rentaAutos-back/controllers/RentasController.php';
  require_once '../rentaAutos-back/controllers/PagosController.php';

  $userController = new UserController();
  $AutosController = new AutosController();
  $RentasController = new RentasController();
  $PagosController = new PagosController();

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
      } else if($accion == 'getRentasById'){
        $userID = $_POST['idUser'];
        $RentasController->obtenerRentasPorUsuario($userID);
      } else if($accion == 'obtenerAllData'){
        $rentaID = $_POST['rentaID'];
        $RentasController->obtenerAllDataRenta($rentaID);
      } else if ($accion == 'actualizarUsuario') {
        $idUser = $_POST['id'];
        $userController->actualizarUsuario($idUser);
      } else if ($accion == 'actualizar') {
        $idUser = $_POST['idUpdate'];
        $userController->obtenerUsuarioPorId($idUser);
      } else if($accion == 'pagar'){
        $PagosController->registrarPago();
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