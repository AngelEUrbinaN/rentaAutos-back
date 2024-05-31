<?php

  require_once '../rentaAutos-back/models/Pago.php';
  require_once '../rentaAutos-back/db/Database.php';
  require_once '../rentaAutos-back/interfaces/PagosInterface.php';

  class PagosService implements PagosInterface {
    private $db;

    public function __construct ($db){
      $this->db = $db;
    }

    public function registrarPago($pagoNuevo) {
      $monto = $pagoNuevo->getMonto();
      $fecha = $pagoNuevo->getFecha();
      $metodo = $pagoNuevo->getMetodo();

      $sql_insertar = "INSERT INTO pago(pag_id, pag_monto, pag_fecha, pag_metodo)
                          VALUES (null, '$monto', '$fecha', '$metodo')";

      if ($this->db->query($sql_insertar) == TRUE) {
        return true;
      } else {
        return "Error: ". $this->db->error;
      }
    }
	}
?>