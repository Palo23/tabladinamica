<?php

require_once "Persona.php";

$persona = new Persona();
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $persona->setNombre($nombre);
    $persona->setApellido($apellido);
    $persona->setEmail($email);
    $persona->setTelefono($telefono);
    $persona->guardar(Conexion::getInstancia());
    Conexion::cerrar();
}