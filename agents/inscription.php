<?php




$selection = "SELECT * from agents where nom_agent = :nom_agent and prenom_agent = :prenom_agent and email = :email";
$prepRequest = $db->prepare($selection);

try {

    $execute = $prepRequest->execute([

        "nom_agent" => $data->nom_agent,
        "prenom_agent" => $data->prenom_agent,
        "email" => $data->email

    ]);

    if ($execute) {

        if ($prepRequest->rowCount() > 0) {

            $reponse = [

                "code" => "succes",
                "message" => "cet etudiant avait deja payer"

            ];

            echo json_encode($reponse);

        } else {


                $insertion = "INSERT INTO agents (nom_agent,prenom_agent,telephone,email,adresse,nationalite,role,pays) 
                    VALUES (:nom_agent,:prenom_agent,:telephone,:email,:adresse,:nationalite,:pays,:pays)";

                $prepR = $db->prepare($insertion);

                try {

                    $execute = $prepR->execute([

                        "nom_agent" => $data->nom_agent,
                        "prenom_agent" => $data->prenom_agent,
                        "telephone"=>$data->telephone,
                        "email" => $data->email,
                        "adresse" => $data->adresse,
                        "nationalite" => $data->nationalite,
                        "role"=>$data->rol,
                        "pays"=>$data->pays

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