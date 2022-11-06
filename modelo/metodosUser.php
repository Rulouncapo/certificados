<?php

require_once("user.php");
session_start();
require_once '../adminPanel/conexion.php';
    $usuario = $_SESSION["usuario"];
    if (!isset($usuario)) {
        header("location:../login.html");
    }
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id'])) {
            echo json_encode(User::obtenerCon($_GET['id']));
        }
        else {
            echo json_encode(User::obtenerTodos());
        }
        break;
    case 'POST':
        echo "llegue";
        if (isset($_POST)) {
            $datos=$_POST;
            var_dump(($datos));
        }
        if ($datos != NULL) {
            if (User::insertar($datos["dni"],$datos["contrasena"],$datos["rol"],$datos["baja"])) {
                http_response_code(200);
            }
            else {
                http_response_code(400);
            }
        }
        else {  
            http_response_code(405);
        }
        break;

    case 'PUT':
        $datos=$_POST;
        if ($datos != NULL) {   
            if (User::update($datos["id"], $datos["dni"], $datos["contrasena"], $datos["rol"], $datos["baja"])) {
                http_response_code(200);
            }
            else {
                http_response_code(400);
            }
        }
        else {
            http_response_code(405);

        }
        break;
    case 'DELETE':
        if (isset($_GET['id'])) {
            if (User::eliminar($_GET['id'])) {
                http_response_code(200);
            }
            else {
                http_response_code(400);
            }
        }
        else {
            http_response_code(405);
        }
        break;
    default:
        http_response_code(405);
        break;
}