
<?php

require('config/db.php');

$select = "SELECT * from agents";

if (empty($data->id)) {
    $query = $db->query($select);
    $etudiants = $query->fetchAll(PDO::FETCH_ASSOC);

    $affiche = array(
        "code" => "succes",
        "message" => $etudiants
    );

    echo json_encode($affiche);
} else {
    $select = "SELECT * from agents";
    $whereClause = "WHERE id=?";
    $requestP = $db->prepare($select . ' ' . $whereClause);
    
    try {
        $execute = $requestP->execute([$data->id]);
        $etudiant = $requestP->fetch(PDO::FETCH_ASSOC);
    
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
