<?php
  require_once '../rentaAutos-back/services/PagosService.php';

  class PagosController {
    private $pagosService;

    public function __construct() {
      $db = (new Database())->getConnection();
      $this->pagosService = new PagosService($db);
    }

    public function registrarPago() {
      $monto = $_POST['monto'];
      $fecha = $_POST['fecha'];
      $metodo = $_POST['metodo'];

      $pagoNuevo = new Pago($monto, $fecha, $metodo);

      $resultado = $this->pagosService->registrarPago($pagoNuevo);

      if($resultado){
        echo json_encode(array("success" => true, "message" => "Pago Registrado Satisfactoriamente"));
      } else {
        echo json_encode(array("success" => false, "message" => "Error al registrar pago"));
      }
    }
  }
?>