<?php

$selection = "SELECT * from enseignant where nom_enseignant = :nom_enseignant and prenom_enseignant = :prenom_enseignant and date_de_naissance = :date_de_naissance";
$prepRequest = $db->prepare($selection);

try {

    $execute = $prepRequest->execute([

        "nom_enseignant" => $data->nom_enseignant,
        "prenom_enseignant" => $data->prenom_enseignant,
        "date_de_naissance" => $data->date_de_naissance

    ]);

    if ($execute) {

        if ($prepRequest->rowCount() > 0) {

            $reponse = [

                "code" => "succes",
                "message" => "utilisateur existe deja"

            ];

            echo json_encode($reponse);

        } else {


                $insertion = "INSERT INTO enseignant (nom_enseignant,prenom_enseignant, adresse ,telephone,email, statut,nationalite,pays,matieres_enseigne,etablissement,date_de_naissance,password) 
                VALUES (:nom_enseignant,:prenom_enseignant,:adresse,:telephone,:email,:statut,:nationalite,:pays,:matieres_enseigne,:etablissement,:date_de_naissance,:password)";

                $prepR = $db->prepare($insertion);

                try {

                    $execute = $prepR->execute([

                        "nom_enseignant" => $data->nom_enseignant,
                        "prenom_enseignant" => $data->prenom_enseignant,
                        "adresse" => $data->date_de_naissance,
                        "telephone" => $data->telephone,
                        "email" => $data->email,
                        "statut" => $data->statut,
                        "nationalite" => $data->nationalite,
                        "pays" => $data->pays,
                        "matieres_enseigne" => $data->matieres_enseigne,
                        "etablissement" => $data->etablissement,
                        "date_de_naissance"=>$data->date_de_naissance,
                        "password" => $data->password,
                     

                    ]);

                    var_dump($execute);

                    if ($execute) {

                        $ensignant = [

                            "code" => "succes",
                            "message" => "enregistrement effectuee avec succes"

                        ];

                        echo json_encode($ensignant);

                    } else {

                        $ensignant = array(

                            "code" => "erreur",
                            "message" => "inscription non effectuee",
                        );

                        echo json_encode($ensignant);

                    }
                } catch (PDOException $e) {

                    $code = $e->getCode();
                    $message = $e->getMessage();

                    $ensignant = array(

                        "code" => "erreur",
                        "message" => "erreur server",
                    );

                    echo json_encode($ensignant);
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