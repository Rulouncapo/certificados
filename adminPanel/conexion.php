<?php
session_start();
require_once '../adminPanel/conexion.php';
    $usuario = $_SESSION["usuario"];
    if (!isset($usuario)) {
        header("location:../login.html");
    }
class Conexion extends Mysqli{
    function __construct(){
        parent::__construct('localhost','root','','certificados');
        $this->set_charset('utf8');
            $this->connect_error == NULL ? 'Conexión exitosa' : die('Error al conectarse');
    }
} 
