<?php


$email = $_POST['email'];
$password = $_POST['password'];

$select = "select * from etudiants where email = :email and password = :password";
$prepRes = $db->prepare($select);
try {
    $execute = $prepRes->execute([

        "email"=>$email, 
        "password"=>$password
         
    ]);

    var_dump($execute);

    if ($execute) {
        if ($prepRes->rowCount() == 1) {
            $tab_reponse = array(
                "code" => "succes",
                "message"=>"vous etes authentifié",
                "details" => $prepRes->fetch(PDO::FETCH_ASSOC)
            );

            echo json_encode($tab_reponse);
            
        } else {

            $tab_reponse = array(
                "code" => "erreur",
                "message" => "Identifiant email ou mot de passe incorrect",
            );
            echo json_encode($tab_reponse);
        }
    }
} catch (\Throwable $th) {
    $tab_reponse = array(
        "code" => "erreur",
        "message" => "erreur server",
    );
    echo json_encode($tab_reponse);
}
