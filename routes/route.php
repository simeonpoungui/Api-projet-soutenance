<?php

    // agents
    $router->map('POST|OPTIONS','/add/agents','agents/inscription.php');
    $router->map('POST|OPTIONS','/delete/agents','agents/delete.php');
    $router->map('POST|OPTIONS','/recuperation/agents','agents/recuperation.php');
    $router->map('POST|OPTIONS','/update/agents','agents/update.php');
    $router->map('POST|OPTIONS','/verification/agents','agents/Tes_doublant.php');


    //enseignant en general
    // $router->map('POST|OPTIONS','/inscription/etudiant','etudiants/inscription.php');
    // $router->map('POST|OPTIONS','/delete/etudiant','etudiants/delete.php');
    // $router->map('POST|OPTIONS','/recuperation/etudiant','etudiants/recuperation.php');
    // $router->map('POST|OPTIONS','/update/etudiant','etudiants/update.php');
    // $router->map('POST|OPTIONS','/verification/etudiant','etudiants/Tes_doublant.php');


    //enseignant
    $router->map('POST|OPTIONS','/add/enseignant','enseignant/inscription.php');
    $router->map('POST|OPTIONS','/delete/enseignant','enseignant/delete.php');
    $router->map('POST|OPTIONS','/recuperation/enseignant','enseignant/recuperation.php');
    $router->map('POST|OPTIONS','/update/enseignant','enseignant/update.php');
    $router->map('POST|OPTIONS','/verification/enseignant','enseignant/Tes_doublant.php');

    //nationalité
    $router->map('POST|OPTIONS','/add/nationalite','nationalite/inscription.php');
    $router->map('POST|OPTIONS','/delete/nationalite','nationalite/delete.php');
    $router->map('POST|OPTIONS','/recuperation/nationalite','nationalite/recuperation.php');
    $router->map('POST|OPTIONS','/update/nationalite','nationalite/update.php');
    $router->map('POST|OPTIONS','/verification/nationalite','nationalite/Tes_doublant.php');

    //inscription etudiant
    $router->map('POST|OPTIONS','/add/Etudiant','inscription/inscription.php');
    $router->map('POST|OPTIONS','/delete/Etudiant','inscription/delete.php');
    $router->map('POST|OPTIONS','/recuperation/Etudiant','inscription/recuperation.php');
    $router->map('POST|OPTIONS','/update/Etudiant','inscription/update.php');
    $router->map('POST|OPTIONS','/verification/inscriptionEtudiant','inscription/Tes_doublant.php');


    //preinscription etudiant
    $router->map('POST|OPTIONS','/add/preinscriptionEtudiant','preinscription/inscription.php');
    $router->map('POST|OPTIONS','/delete/preinscriptionEtudiant','preinscription/delete.php');
    $router->map('POST|OPTIONS','/recuperation/preinscriptionEtudiant','preinscription/recuperation.php');
    $router->map('POST|OPTIONS','/update/preinscriptionEtudiant','preinscription/update.php');
    $router->map('POST|OPTIONS','/verification/preinscriptionEtudiant','preinscription/Tes_doublant.php');


    //paiement
    $router->map('POST|OPTIONS','/recuperation/paiement','paiement/recuperation.php');
    $router->map('POST|OPTIONS','/delete/paiement','paiement/delete.php');
    $router->map('POST|OPTIONS','/add/paiement','paiement/inscription.php');
    $router->map('POST|OPTIONS','/update/paiement','paiement/update.php');

    //impression
    $router->map('GET|OPTIONS','/impression/liste/etudiants/inscrits','index2.php');
    $router->map('GET|OPTIONS','/impression/liste/etudiants/preinscrits','index3.php');
    $router->map('GET|OPTIONS','/impression/liste/agents','index4.php');
    $router->map('GET|OPTIONS','/impression/liste/paiement','index5.php');

    //attestation
    $router->map('GET|OPTIONS','/attestation/etudiant','index6.php');


             

?>  