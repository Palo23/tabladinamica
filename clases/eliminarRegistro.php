<?php

$id= $_POST['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $persona = Persona::buscarPorId(Conexion::getInstancia(), $id);
    $persona->eliminar(Conexion::getInstancia());
    Conexion::cerrar();
}