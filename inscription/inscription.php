<?php

$selection = "SELECT * from inscription where numero = :numero and etablissement = :etablissement and annee = :annee";
$prepRequest = $db->prepare($selection);

try {

    $execute = $prepRequest->execute([

        "numero" => $data->numero,
        "etablissement" => $data->etablissement,
        "annee" => $data->annee

    ]);

    if ($execute) {

        if ($prepRequest->rowCount() > 0) {

            $reponse = [

                "code" => "succes",
                "message" => "cet etudiant avait deja payer"

            ];

            echo json_encode($reponse);

        } else {


                $insertion = "INSERT INTO inscription (numero,etablissement,annee,prenom_etudiant,niveau,somme) 
                    VALUES (:numero,:etablissement,:annee,:prenom_etudiant,:niveau,:somme)";

                $prepR = $db->prepare($insertion);

                try {

                    $execute = $prepR->execute([

                        "numero" => $data->numero,
                        "etablissement" => $data->etablissement,
                        "annee"=>$data->annee,
                        "prenom_etudiant" => $data->prenom_etudiant,
                        "niveau" => $data->niveau,
                        "somme" => $data->somme

                    ]);

                    var_dump($execute);

                    if ($execute) {

                        $etudiants = [

                            "code" => "succes",
                            "message" => "inscription effectuee"

                        ];

                        echo json_encode($etudiants);

                    } else {

                        $etudiants = array(

                            "code" => "erreur",
                            "message" => "inscription non effectuee",
                        );

                        echo json_encode($etudiants);

                    }
                } catch (PDOException $e) {

                    $code = $e->getCode();
                    $message = $e->getMessage();

                    $etudiants = array(

                        "code" => "erreur",
                        "message" => "erreur server",
                    );

                    echo json_encode($etudiants);
                }
           
        }

    } else {

        $reponse = array(

            "code" => "succes",
            "message" => "erreur d'execution"
        );

        echo json_encode($reponse);
    }
} catch (PDOException $e) {

    $code = $e->getCode();
    $message = $e->getMessage();

    $reponse = array(

        "code" => "erreur",
        "message" => "erreur server"

    );

    echo json_encode($reponse);
}