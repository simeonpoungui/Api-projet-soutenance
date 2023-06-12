<?php




$selection = "SELECT * from nationalite where libelle = :libelle";
$prepRequest = $db->prepare($selection);

try {

    $execute = $prepRequest->execute([

        "libelle" => $data->libelle,
  

    ]);

    if ($execute) {

        if ($prepRequest->rowCount() > 0) {

            $reponse = [

                "code" => "succes",
                "message" => "utilisateur existe deja"

            ];

            echo json_encode($reponse);

        } else {

                $insertion = "INSERT INTO nationalite (libelle) VALUES (:libelle)";

                $prepR = $db->prepare($insertion);

                try {

                    $execute = $prepR->execute([

                        "libelle" => $data->libelle,
                     

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