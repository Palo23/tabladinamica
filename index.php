<?php

require_once 'clases/Persona.php';

$personas = Persona::recuperarTodos(Conexion::getInstancia());

Conexion::cerrar();

require_once 'vistas/tabla.php';

/*require_once 'clases/Persona.php';

if (isset($_SESSION['consulta'])){
    session_start();
    if ($_SESSION['consulta'] > 0){
        $id = $_SESSION['consulta'];
        $persona=Persona::buscarPorId(Conexion::getInstancia(), $id);
        Conexion::cerrar();

    }
}else{

    $personas = Persona::recuperarTodos(Conexion::getInstancia());

    Conexion::cerrar();

    require_once 'vistas/tabla.php';
}

*/

