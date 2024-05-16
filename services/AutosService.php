<?php

  require_once '../rentaAutos-back/models/Auto.php';
  require_once '../rentaAutos-back/db/Database.php';
  require_once '../rentaAutos-back/interfaces/AutosInterface.php';

  class AutosService implements AutosInterface {
    private $db;

    public function __construct ($db){
      $this->db = $db;
    }

    public function obtenerTodosAutos(){
      $sql = "SELECT * FROM auto";
      $result = $this->db->query($sql);
      $autos = array(); 

      if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $autos[] = $row;
        }
      }

      return $autos;  
    }
  }
?>