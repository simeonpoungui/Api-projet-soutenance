<?php

require('config/db.php');


$select = "SELECT * from preinscription";

if (empty($data->id)) {

    $query = $db->query($select);
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);

    $affiche = array(
        "code" => "succes",
        "message" => $tableau

    );

    echo json_encode($affiche);
} else {
    $select = "SELECT * from preinscription where id=?";
    $requestP = $db->prepare($select);
    try {
        $execute = $requestP->execute([$data->id]);
        $etudiant = $requestP->fetch(PDO::FETCH_ASSOC); // Utilisez fetch au lieu de fetchAll
    
        if ($etudiant) {
            $affiche = array(
                "code" => "succes",
                "message" => $etudiant
            );
        } else {
            $affiche = array(
                "code" => "erreur",
                "message" => "aucun étudiant trouvé avec cet ID"
            );
        }
    
        echo json_encode($affiche);
    } catch (PDOException $e) {
        $code = $e->getCode();
        $message = $e->getMessage();
    
        $affiche = array(
            "code" => "erreur",
            "message" => "erreur serveur"
        );
    
        echo json_encode($affiche);
    }
    
}