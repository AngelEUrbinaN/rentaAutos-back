<?php
  require_once '../rentaAutos-back/services/AutosService.php';

	class AutosController {
    private $AutosService;

    public function __construct() {
      $db = (new Database())->getConnection();
      $this->AutosService = new AutosService($db);
    }

    public function obtenerTodosAutos() {
      $autos = $this->AutosService->obtenerTodosAutos();

      if($autos) {
        echo json_encode(array("success" => true, "autos" => $autos));
      } else {
        echo json_encode(array("success" => false, "message" => "Error al obtener los autos"));
      }
    }

    public function obtenerAutoData($autoID) {
      $auto = $this->AutosService->obtenerAutoData($autoID);
      if ($auto) {
        echo json_encode(array("success" => true, "auto" => $auto));
      } else {
        echo json_encode(array("success" => false, "message" => "Error al obtener el auto"));
      }
    }
  }
?>