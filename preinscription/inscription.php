<?php




$selection = "SELECT * from preinscription where nom_etudiant = :nom_etudiant and prenom_etudiant = :prenom_etudiant and date_naissance = :date_naissance";
$prepRequest = $db->prepare($selection);

try {

    $execute = $prepRequest->execute([

        "nom_etudiant" => $data->nom_etudiant,
        "prenom_etudiant" => $data->prenom_etudiant,
        "date_naissance" => $data->date_naissance

    ]);

    if ($execute) {

        if ($prepRequest->rowCount() > 0) {

            $reponse = [

                "code" => "arreur",
                "message" => "cet etudiant existe deja"

            ];

            echo json_encode($reponse);

        } else {


            $insertion = "INSERT INTO preinscription (nom_etudiant,prenom_etudiant,genre,telephone,date_naissance,parcours, niveau,email,etablissement,civilite,adresse,residence,departement,image,quittance,cycle,CNI,bac,session,mension,lycee,pays,serie) 
            VALUES (:nom_etudiant,:prenom_etudiant,:genre,:telephone,:date_naissance,:parcours,:niveau,:email,:etablissement,:civilite,:adresse,:residence,:departement,
            :image,:quittance,:cycle,:CNI,:bac,:session,:mension,:lycee,:pays,:serie)";

             $prepR = $db->prepare($insertion);

            try {

                $execute = $prepR->execute([

                    "nom_etudiant" => $data->nom_etudiant,
                    "prenom_etudiant" => $data->prenom_etudiant,
                    "genre" => $data->genre,
                    "telephone" => $data->telephone,
                    "date_naissance" => $data->date_naissance,
                    "parcours" => $data->parcours,
                    "niveau" => $data->niveau,
                    "email" => $data->email,
                    "etablissement" => $data->etablissement,
                    "civilite" => $data->civilite,
                    "adresse" => $data->adresse,
                    "residence" => $data->residence,
                    "departement" => $data->departement,
                    "image" => $data->image,
                    "quittance" => $data->quittance,
                    "cycle" => $data->cycle,
                    "CNI" => $data->CNI,
                    "bac" => $data->bac,
                    "session" => $data->session,
                    "mension" => $data->mension,
                    "lycee" => $data->lycee,
                    "pays" => $data->pays,
                    "serie" => $data->serie
              

                ]);

                var_dump($execute);

                if ($execute) {

                    $etudiants = [

                        "code" => "succes",
                        "message" => "preinscription effectuee"

                    ];

                    echo json_encode($etudiants);

                } else {

                    $etudiants = array(

                        "code" => "erreur",
                        "message" => "preinscription non effectuee",
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