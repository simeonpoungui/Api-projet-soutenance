<?php

// Allow from any origin  
if (isset($_SERVER['HTTP_ORIGIN'])) {
  // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
  // you want to allow, and if so:header
  header("Access-Control-Allow-Origin");
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
  header('Access-Control-Allow-Credentials: true');
  header('Access-Control-Max-Age: 86400'); // cache for 1 day
}
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    // may also be using PUT, PATCH, HEAD etc
    header("Access-Control-Allow-Origin");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
}
/* importation autoload pour les fichiers de dependance lance toutes les dependances */
require('vendor/autoload.php');
/* appelle la base de donnée */
require('config/db.php');
//impportation de data
require('config/data.php');
$data = json_data();
/* initialisation de altorouteur  */
$router = new AltoRouter();
/* les routes */
require('routes/route.php');
//  pour comparer les routes qui se trouve dans altorouter avecle route demandé.
$match = $router->match();
if ($match) {
  // cette commande permet d'afficher les pages demandées au cas de dependances.
  require $match['target'];
} else {
  header('Location: 404.php');
}