<?php
require_once("user.php");
session_start();
require_once '../adminPanel/conexion.php';
    $usuario = $_SESSION["usuario"];
    if (!isset($usuario)) {
        header("location:../login.html");
    }
require_once("../adminPanel/conexion.php");
class User extends Conexion{
    private $id;
    private $user;
    private $contrasena; 
    private $rol; 
    private $baja; 
    public static function obtenerTodos()
    {
        $db = new Conexion();
        $query = "SELECT * FROM usuarios";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                   'id' => $row['id'],
                   'dni' => $row['dni'],
                   'contrasena' => $row['contrasena'],
                   'rol' => $row['rol'],
                   'baja' => $row['baja']
                ];
            }
        }
        return $datos;
    }
    public static function obtenerCon($id)
    {
        $db = new Conexion();
        $query = "SELECT * FROM `usuarios` WHERE id=$id";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'id' => $row['id'],
                    'dni' => $row['dni'],
                    'contrasena' => $row['contrasena'],
                    'rol' => $row['rol'],
                    'baja' => $row['baja']
                ];
            }
        }
        return $datos;
    }
    public static function insertar($dni, $contrasena, $rol, $baja=0)
    {   
        $contrasena = md5($contrasena);
        $db = new Conexion();
        $query="INSERT INTO `usuarios`( `dni`, `contrasena`, `rol`, `baja`) 
        VALUES ('".$dni."','".$contrasena."','". $rol ."','".$baja ."')";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    public static function update($id, $dni, $contrasena, $rol, $baja=0)
    {
        $db = new Conexion();
        $query = "UPDATE usuarios SET 
            dni='" . $dni . "', contrasena = '" . $contrasena . "', rol = '" . $rol . "' baja = '" . $baja . "' WHERE id=$id";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    public static function eliminar($id)
    {
        $db = new Conexion();
        $query = "DELETE FROM usuarios WHERE id=$id";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
 }
 