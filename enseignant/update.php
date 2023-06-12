<?php

$update = "UPDATE enseignant SET nom_enseignant=? , prenom_enseignant=?, adresse = ? , telephone = ? , email = ? , nationalite = ? , etablissement = ? ,  date_de_naissance=?  WHERE id = ?";
$prepR = $db->prepare($update);

try {
    $execute = $prepR->execute([

     $data->nom_enseignant,
     $data->prenom_enseignant,
     $data->adresse,
     $data->telephone,
     $data->email,
     $data->nationalite,
     $data->etablissement,
     $data->date_de_naissance,
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