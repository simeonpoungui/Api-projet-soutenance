<?php

$update ="UPDATE etudiants SET nom_etudiant=? , prenom_etudiant=?, date_de_naissance=? , email=? WHERE id=?";
$prepR = $db->prepare($update);

try {
    $execute = $prepR->execute([$data->nom_etudiant,$data->prenom_etudiant,$data->date_de_naissance,$data->email,$data->id]);
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
