<?php
session_start();
require_once '../adminPanel/conexion.php';
    $usuario = $_SESSION["usuario"];
    if (!isset($usuario)) {
        header("location:../login.html");
    }
require_once("conexion.php");
function Verificador(){
    if ($_POST["user"] && $_POST["pass"]) {
    $db=new Conexion();
    $dni = $_POST["user"];
    $pass = md5($_POST["pass"]);
    $query = "SELECT * FROM `usuarios` WHERE dni=".$dni." AND contrasena='".$pass."'";
    $resultado = $db->query($query);
    $data = $resultado->fetch_all(MYSQLI_ASSOC);
        if($data==null){
          return http_response_code(401);
        };
    echo " Inicio___: ";
    $dni_db = $data[0]["dni"];
    $pass_db = $data[0]["contrasena"];
    $rol_db = $data[0]["rol"];
    $baja_db = $data[0]["baja"];
        if ($dni_db == $dni && $pass_db == $pass &&  $baja_db !=1) {
            session_start();
            $_SESSION["login"] = true;
            $_SESSION["usuario"] = $dni;
            $_SESSION["rol"] = $rol_db;
            if ($rol_db==1) {
                echo header( "location:admin.php", 200 );
            }else{
                echo header( "location:index.php", 200 );
            }
        }
        else{
            echo http_response_code(403);
        }
    }
};
Verificador();
