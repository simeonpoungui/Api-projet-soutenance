<?php

require('config/db.php');

$data = (object) $_POST;

$select = "SELECT * from annee";

if (empty($data->id)) {

    $query = $db->query($select);
    $etudiant = $query->fetchAll(PDO::FETCH_ASSOC);

    $affiche = array(
        "code" => "succes",
        "message" => $etudiant

    );

    echo json_encode($affiche);
} else {
    $select = "SELECT * from     where id=? ";
    $requestP = $db->prepare($select);
    try {

        $execute = $requestP->execute([$data->id]);
        $etudiants = $requestP->fetchAll(PDO::FETCH_ASSOC);

        $affiche = array(
            "code" => "succes",
            "message" => $etudiants

        );
        echo json_encode($affiche);
    } catch (PDOException $e) {

        $code = $e->getCode();
        $message = $e->getMessage();

        $affiche = array(
            "code" => "succes",
            "message" => "erreur server"

        );

        echo json_encode($affiche);
    }
}