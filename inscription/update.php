<?php

$update ="UPDATE inscription SET numero=? , etablissement=?, annee=? , prenom_etudiant=? ,niveau = ?,somme = ? WHERE id=?";
$prepR = $db->prepare($update);

try {
    $execute = $prepR->execute([

    
       $data->numero,
       $data->etablissement,
       $data->annee,
       $data->prenom_etudiant,
       $data->niveau,
       $data->somme,
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
