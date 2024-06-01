<?php

  require_once '../rentaAutos-back/models/Renta.php';
  require_once '../rentaAutos-back/db/Database.php';
  require_once '../rentaAutos-back/interfaces/RentasInterface.php';

  class RentasService implements RentasInterface {
    private $db;

    public function __construct ($db){
      $this->db = $db;
    }

    public function registrarRenta($rentaNueva) {
      $usuarioId = $rentaNueva->getUsuarioId();
      $autoId = $rentaNueva->getAutoId();
      $diaInicio = $rentaNueva->getDiaInicio();
      $diaFin = $rentaNueva->getDiaFin();
      $costoEstimado = $rentaNueva->getCostoEstimado();
      $finReal = $rentaNueva->getFinReal();
      $costoReal = $rentaNueva->getCostoReal();

      $sql_insertar = "INSERT INTO renta(renta_id, rent_usu_id, rent_aut_id, rent_diaInicio, rent_diaFin, rent_costoEstimado, rent_finReal, rent_costoReal)
                          VALUES (null, '$usuarioId', '$autoId', '$diaInicio', '$diaFin', '$costoEstimado', null, null)";

      $sql_actualizar = "UPDATE auto SET aut_disponible = 'False' WHERE aut_id = '$autoId'";

      if ($this->db->query($sql_insertar) == TRUE && $this->db->query($sql_actualizar) == TRUE) {
        return true;
      } else {
        return "Error: ". $this->db->error;
      }
    }

    public function obtenerRentasPorUsuario($userID) {
      $sql = "SELECT a.*, r.* FROM renta r JOIN auto a ON r.rent_aut_id = a.aut_id WHERE r.rent_usu_id = '$userID'";
      $result = $this->db->query($sql);

      if($result->num_rows >= 1) {
        // Ya que pueden haber más de una row, iteramos para guardar cada fila en un arreglo.
        $rentas = [];
        while($row = $result->fetch_assoc()) {
          $rentas[] = $row;
        }
        return $rentas;
      }
      
      return null;
    }

    public function obtenerAllDataRenta($rentaID) {
      $sql = "SELECT * FROM renta WHERE renta_id = '$rentaID'";
      $result = $this->db->query($sql);

      if($result->num_rows == 1) {
        return $result->fetch_assoc();
      }
      
      return null;
    }
	}
?>