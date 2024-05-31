<?php
    interface UserInterface {
        public function registrarUsuario($usuario);
        public function login($correo, $password);
        public function actualizarUsuario($id, $usuario);
        public function obtenerUsuarioPorId($id);
    }
?>