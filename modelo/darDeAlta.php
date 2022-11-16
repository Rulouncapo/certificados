<?php
require_once("user.php");
    function Alta(){
        $id = $_POST["id"];
            if (User::darDeAlta($id)) {
                http_response_code(200);
            }
            else {
                http_response_code(400);
            }
        }
Alta();        
