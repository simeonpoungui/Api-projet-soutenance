<?php

$update ="UPDATE preinscription SET nom_etudiant=? , prenom_etudiant=?, genre=? , telephone=? ,date_naissance = ?,
parcours = ? ,niveau = ? ,email = ? , etablissement = ? , civilite = ? , adresse= ?,residence = ?, departement = ? , 
image = ? , quittance=?,cycle=?,CNI=?,bac=?,session=?,mension=?,lycee=?,pays=?,serie=? WHERE id=?";
$prepR = $db->prepare($update);

try {
    $execute = $prepR->execute([

        $data->nom_etudiant,
        $data->prenom_etudiant,
        $data->genre,
        $data->telephone,
        $data->date_naissance,
        $data->parcours,
        $data->niveau,
        $data->email,
        $data->etablissement,
        $data->civilite,
        $data->adresse,
        $data->residence,
        $data->departement,
        $data->image,
        $data->quittance,
        $data->cycle,
        $data->CNI,
        $data->bac,
        $data->session,
        $data->mension,
        $data->lycee,
        $data->pays,
        $data->serie,
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
