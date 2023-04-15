<?php
session_start();

// Charger la bibliothèque de routage FastRoute
require_once("vendor/autoload.php");

if (!class_exists('FastRoute\RouteCollector')) { 
    http_response_code(500); 
    echo json_encode(array("message" => "La bibliothèque FastRoute n'est pas correctement chargée.")); 
    exit; 
}

// Configurer les en-têtes HTTP pour accepter les réponses JSON
header("Content-Type: application/json");

// Charger les fichiers de configuration
require_once("config.php");

// Définir la méthode d'API pour récupérer les 10 derniers tweets
function get_tweets() {
    dbConnect();
    $data = getLast10Tweets();
    http_response_code(200);
    echo json_encode($data);
}

// Créer le routeur FastRoute
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/tweets', 'get_tweets');
});

// Récupérer la méthode d'API à appeler en fonction de la requête HTTP et de la route

$projectPath = '/Cours7_PHP_TwitterAPI/API.php';
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$routeUri = substr($requestUri, strlen($projectPath));


$routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $routeUri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo json_encode(array("message" => "Route non trouvée"));
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo json_encode(array("message" => "Méthode non autorisée"));
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
}
?>
