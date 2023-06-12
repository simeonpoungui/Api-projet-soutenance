<?php

$update ="UPDATE agents SET nom_agent=? , prenom_agent=?, telephone=? , email=? ,adresse = ?,nationalite = ?,role = ?, pays = ?  WHERE id=?";
$prepR = $db->prepare($update);

try {
    $execute = $prepR->execute([

    
       $data->nom_agent,
       $data->prenom_agent,
       $data->telephone,
       $data->email,
       $data->adresse,
       $data->nationalite,
       $data->role,
       $data->pays,
       $data->id
        
    
    ]);
    var_dump($execute);
    if ($execute) {

        $reponse = array(
            "code" => "succes",
            "message" => "mise a jour effectuee"
        );

        echo json_encode($reponse);
    } else {

        $reponse = array(
            "code" => "erreur",
            "message" => "mise non jour effectuee"
        );

        echo json_encode($reponse);
    }
} catch (\Throwable $th) {

    $reponse = array(
        "code" => "erreur",
        "message" => "erreur server"
    );

    echo json_encode($reponse);
}
