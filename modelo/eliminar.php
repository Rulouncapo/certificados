<?php
require_once("user.php");
function Deleteo(){
    $id = $_POST["id"];
        if (User::deletear($id)) {
            http_response_code(200);
        }
        else {
            http_response_code(400);
        }
    }
    Deleteo();        