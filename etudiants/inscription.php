<?php




$selection = "SELECT * from etudiants where nom_etudiant = :nom_etudiant and prenom_etudiant = :prenom_etudiant and date_de_naissance = :date_de_naissance";
$prepRequest = $db->prepare($selection);

try {

    $execute = $prepRequest->execute([

        "nom_etudiant" => $data->nom_etudiant,
        "prenom_etudiant" => $data->prenom_etudiant,
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

            if ($data->password == $data->retype_password) {


                $insertion = "INSERT INTO etudiants (nom_etudiant,prenom_etudiant,niveau,genre,options,date_de_naissance, adresse,
                telephone,email,parcours,etablissement,annee_accademique,nationalite,pays,password) 
                    VALUES (:nom_etudiant,:prenom_etudiant,:niveau,:genre,:options,:date_de_naissance,
                    :adresse,:telephone,:email,:parcours,:etablissement,:annee_accademique,:nationalite,:pays,:password)";

                $prepR = $db->prepare($insertion);

                try {

                    $execute = $prepR->execute([

                        "nom_etudiant" => $data->nom_etudiant,
                        "prenom_etudiant" => $data->prenom_etudiant,
                        "niveau" => $data->niveau,
                        "genre" => $data->genre,
                        "options" => $data->options,
                        "date_de_naissance" => $data->date_de_naissance,
                        "adresse" => $data->adresse,
                        "telephone" => $data->telephone,
                        "email" => $data->email,
                        "parcours" => $data->parcours,
                        "etablissement" => $data->etablissement,
                        "annee_accademique" => $data->annee_accademique,
                        "nationalite" => $data->nationalite,
                        "pays" => $data->pays,
                        "password" => $data->password

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
            } else {

                echo 'Les deux mots de passe ne correspondent pas';
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