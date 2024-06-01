<?php
    interface RentasInterface {
        public function registrarRenta($rentaNueva);
        public function obtenerRentasPorUsuario($userID);
        public function obtenerAllDataRenta($rentaID);
        public function finalizarRenta($idRenta, $finReal, $costoReal, $idAuto);
    }
?>