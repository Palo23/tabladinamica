<?php


require_once 'Conexion.php';

class Persona
{
   private $id;
   private $nombre;
   private $apellido;
   private $email;
   private $telefono;
   const TABLA='persona';

   public function __construct($nombre=null, $apellido=null, $email=null, $telefono=null, $id=null)
   {
       $this->nombre=$nombre;
       $this->apellido=$apellido;
       $this->email=$email;
       $this->telefono=$telefono;
       $this->id=$id;
   }


    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }


    public function guardar($conexion) {
        if ($this->id) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, apellido = :aṕellido,
             email = :email, telefono = :telefono WHERE id = :id');
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':apellido', $this->apellido);
            $consulta->bindParam(':email', $this->email);
            $consulta->bindParam(':telefono', $this->telefono);
            $consulta->bindParam(':id', $this->id);
            echo $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, apellido, email, telefono) 
            VALUES(:nombre, :apellido, :email, :telefono)');
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':apellido', $this->apellido);
            $consulta->bindParam(':email', $this->email);
            $consulta->bindParam(':telefono', $this->telefono);
            echo $consulta->execute();
            $this->id = $conexion->lastInsertId();
        }
    }
    public function eliminar($conexion){
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $this->id);
        echo $consulta->execute();
    }
    public static function buscarPorId($conexion, $id) {
        $consulta = $conexion->prepare('SELECT nombre, apellido, email, telefono FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $registro = $consulta->fetch();
        if ($registro) {
            return new self($registro['nombre'], $registro['apellido'], $registro['email'], $registro['telefono'], $id);
        } else {
            return false;
        }
    }
    public static function recuperarTodos($conexion) {
        $consulta = $conexion->prepare('SELECT id, nombre, apellido, email, telefono FROM ' . self::TABLA);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }



}