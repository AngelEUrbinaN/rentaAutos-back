<?php
  require_once '../rentaAutos-back/services/RentasService.php';

  class RentasController {
    private $rentasService;

    public function __construct() {
      $db = (new Database())->getConnection();
      $this->rentasService = new RentasService($db);
    }

    public function registrarRenta() {
      $usuarioId = $_POST['usuarioId'];
      $autoId = $_POST['autoId'];
      $diaInicio = $_POST['diaInicio'];
      $diaFin = $_POST['diaFin'];
      $costoEstimado = $_POST['costoEstimado'];
      $finReal = $_POST['finReal'];
      $costoReal = $_POST['costoReal'];

      $rentaNueva = new Renta($usuarioId, $autoId, $diaInicio, $diaFin, $costoEstimado, $finReal, $costoReal);

      $resultado = $this->rentasService->registrarRenta($rentaNueva);

      if($resultado){
        echo json_encode(array("success" => true, "message" => "Renta Registrada Satisfactoriamente"));
      } else {
        echo json_encode(array("success" => false, "message" => "Error al registrar renta"));
      }
    }
  }
?>