<?php


require_once 'clases/Persona.php';

$personas = Persona::recuperarTodos(Conexion::getInstancia());

Conexion::cerrar();

require_once 'vistas/tabla.php';


