<?php
    // $serveur = "localhost";
    // $dbname = "user";
     $login =  "root";
     $pass  = "Poungui1234@";

try {

    $db = new PDO('mysql:host=localhost;dbname=Bd_umng', $login,$pass);
} catch (\Throwable $err) {

    // $render->reponse($err);

}