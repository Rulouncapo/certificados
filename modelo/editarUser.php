<?php
require_once("user.php");
if(!isset($_POST["engranaje"])){
    Editar();
}else{
    EditarConCambio();
}
function Editar(){
    $datos=$_POST;
    if ($datos != NULL) {   

        if (User::update($datos["id"], $datos["dni"],$datos["nombre"],$datos["email"], $datos["pass"], $datos["rol"], $datos["baja"])) {
            http_response_code(200);
        }
        else {
            http_response_code(400);
        }
    }
    else {
        http_response_code(405);

    }
}
function EditarConCambio(){
    $datos=$_POST;
    if ($datos != NULL) {   
        if (User::update($datos["id"], $datos["dni"],$datos["nombre"],$datos["email"], md5($datos["pass"]), $datos["rol"], $datos["baja"])) {
            http_response_code(200);
        }
        else {
            http_response_code(400);
        }
    }
    else {
        http_response_code(405);
    }
}