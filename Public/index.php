<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../routes.php';

use Utils\Utils;

use View\ViewConnect;
use View\ViewHome;

use Controller\ControllerHome;
use Controller\ControllerUser;

use Model\ModelHome;
use Model\ModelUser;

//On récupère le "path" de l'URL demandé par l'utilisateur
$url = parse_url($_SERVER['REQUEST_URI']);
$path = isset($url['path']) ? $url['path'] : '/';

switch ($path) {
    //Page d'accueil
    case '/':
    case $_ENV['accueil']:
        $controller = new ControllerHome(new ModelHome(Utils::connect()), new ViewHome("Accueil", "/assets/js/main.js"));
        $controller->index();
        $controller->render();
        break;

    //Page de connexion / inscription
    case $_ENV['connexion']:
        $controller = new ControllerUser(new ModelUser(Utils::connect()), new ViewConnect("Connexion", "/assets/js/connexion.js"));
        //Formulaire de connexion
        $controller->seConnecter();
        //Formulaire d'inscription
        $controller->registerUser();
        //Rendu de l'affichage
        $controller->render();
        break;

    default:
        http_response_code(404);
        echo "Page introuvable";
}
