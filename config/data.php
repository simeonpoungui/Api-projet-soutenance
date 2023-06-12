<?php
//autoriser les cors (cors) 
header('content-Type:application/json;charset=utf-8');//
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

//conversion en json du contenu du fichier php
function json_data(){
    $json =  file_get_contents('php://input');//
    $data = json_decode($json);
    return $data;
}


?>