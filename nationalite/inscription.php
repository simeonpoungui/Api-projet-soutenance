<?php




$selection = "SELECT * from annee where libelle_annee = :libelle_annee";
$prepRequest = $db->prepare($selection);

try {

    $execute = $prepRequest->execute([

        "libelle_annee" => $data->libelle_annee,
  

    ]);

    if ($execute) {

        if ($prepRequest->rowCount() > 0) {

            $reponse = [

                "code" => "succes",
                "message" => "utilisateur existe deja"

            ];

            echo json_encode($reponse);

        } else {

                $insertion = "INSERT INTO annee (libelle_annee) VALUES (:libelle_annee)";

                $prepR = $db->prepare($insertion);

                try {

                    $execute = $prepR->execute([

                        "libelle_annee" => $data->libelle_annee,
                     

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