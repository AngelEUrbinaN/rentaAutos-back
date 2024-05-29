<?php
    interface RentasInterface {
        public function registrarRenta($rentaNueva);
        public function obtenerRentasPorUsuario($userID);
        public function obtenerAllDataRenta($rentaID);
    }
?>