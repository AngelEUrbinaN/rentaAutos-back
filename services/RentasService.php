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
                          VALUES (null, '$usuarioId', '$autoId', '$diaInicio', '$diaFin', '$costoEstimado', '$finReal', '$costoReal')";

      if ($this->db->query($sql_insertar) == TRUE ) {
        return true;
      } else {
        return "Error: ". $this->db->error;
      }
    }
	}
?>