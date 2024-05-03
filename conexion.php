<?php
$conexion = "mysql:dbname=pruebaarapiles;host:localhost";
$usuario = "usuario1";
$clave = "usuario1";
try{$bdd = new PDO($conexion, $usuario, $clave);
    echo "conexion con la base de datos establecida con exito";
    //$bdd = null;
}catch(PDOException $incidencia){
    echo "error con la base de datos: ".$incidencia->getMessage();
}

/*namespace Clases;
use PDO;
use PDOException;
class Conexion
{
    private $host;
    private $db;
    private $user;
    private $pass;
    private $dsn;
    protected $conexion;

    public function __construct()
    {
        $this->host = "localhost";
        $this->db = "pruebaarapiles";
        $this->user = "usuario1";
        $this->pass = "usuario1";
        $this->dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
        $this->crearConexion();
    }

    public function crearConexion()
    {
        try {
            $this->conexion = new PDO($this->dsn, $this->user, $this->pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conexion con la base de datos establecida con exito";
        } catch (PDOException $ex) {
            echo("Error en la conexión: mensaje: " . $ex->getMessage());
        }
        return $this->conexion;
    }
}*/
?>