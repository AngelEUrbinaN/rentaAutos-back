<?php

  require_once '../rentaAutos-back/models/Renta.php';
  require_once '../rentaAutos-back/db/Database.php';
  require_once '../rentaAutos-back/interfaces/RentaInterface.php';

  class RentaService implements RentaInterface {
    private $db;

    public function __construct ($db){
      $this->db = $db;
    }

    public function registrarRenta($renta) {
      $usuarioId = $renta->getUsuarioId();
      $autoId = $renta->getAutoId();
      $diaInicio = $renta->getDiaInicio();
      $diaFin = $renta->getDiaFin();
      $costoEstimado = $renta->getCostoEstimado();
      $finReal = $renta->getFinReal();
      $costoReal = $renta->getCostoReal();

      $sql_insertar = "INSERT INTO renta(renta_id, rent_usu_id, rent_aut_id, rent_diaInicio, rent_diaFin, rent_costoEstimdo, rent_finReal, rent_costoReal)
                          VALUES (null, '$usuarioId', '$autoId', '$diaInicio', '$diaFin', '$costoEstimado', '$finReal', '$costoReal')";

      if ($this->db->query($sql_insertar) == TRUE ) {
        return true;
      } else {
        return false;
      }
    }
	}
?>