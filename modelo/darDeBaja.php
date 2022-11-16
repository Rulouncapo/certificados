<?php
require_once("user.php");
    function darDebaja(){
        $id = $_POST['id'];
        if (User::eliminar($id)) {
            http_response_code(200);
        }
        else {
            http_response_code(400);
        }
    }
darDebaja();