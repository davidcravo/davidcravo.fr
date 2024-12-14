<?php
header('Location: /templates/home.php');

ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


// require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
// require __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'init.php';


// $uri = $_SERVER['REQUEST_URI'];
// $dir = $_SERVER['DOCUMENT_ROOT'];
// if (false !== $pos = strpos($uri, '?')) {
//     $uri = substr($uri, 0, $pos);
// }

// if($uri === '/'){
//     $uri = 'templates/home.php';
// }
// dump($uri);

// $routes = [
//     'templates/home.php' => 'home',
//     'templates/experience.php' => 'experience',
//     'templates/contact.php' => 'contact',
// ];

// $handler = $routes[$uri] ?? '/404';
// dump($handler);

// $templatePath = __DIR__ . '/templates/' . $handler . '.php';
// dump($templatePath);
// if (!file_exists($templatePath)) {
//     dump( "Erreur : fichier template introuvable.");
// }
// echo "Fichier trouvé : $templatePath";


// echo 'test1';

// if (!ob_start()) {
//     echo "Erreur : ob_start ne fonctionne pas sur ce serveur.";
//     exit;
// }
// echo "Tampon démarré avec succès.";


// ob_start();

//     echo 'test2';
//     require $templatePath;
//     $pageContent = ob_get_clean();
//     // include __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'init.php';
//     // require __DIR__ . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'head.php';
//     // require __DIR__ . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'header.php';
//     // require __DIR__ . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'footer.php';
//     if (!$pageContent) {
//         echo "Erreur : aucun contenu capturé par ob_get_clean().";
//         exit;
//     }
//     echo "Contenu capturé";

//     $layoutPath = __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'layout.php';
//     if (!file_exists($layoutPath)) {
//         dump("Erreur : layout.php introuvable à l'emplacement $layoutPath");
//         exit;
//     }else{
//         echo 'layout.php trouvé';
//     }
    
//     require $layoutPath;    
//     echo 'test3';
//     //require __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'layout.php';


// require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
// require __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'init.php';

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

// $uri = $_SERVER['REQUEST_URI'];

// // Nettoyer les paramètres GET
// if (false !== $pos = strpos($uri, '?')) {
//     $uri = substr($uri, 0, $pos);
// }

// if ($uri === '/') {
//     $uri = 'templates/experience.php';
// }
// dump("URI : $uri");

// $routes = [
//     'templates/home.php' => 'home',
//     'templates/experience.php' => 'experience',
//     'templates/contact.php' => 'contact',
// ];

// $handler = $routes[$uri] ?? '/404';
// dump("Handler : $handler");

// $templatePath = __DIR__ . '/templates/' . $handler . '.php';
// dump("Template Path : $templatePath");

// if (!file_exists($templatePath)) {
//     echo "Erreur : fichier template introuvable ($templatePath)";
//     exit;
// }
// echo "Avant ob_start()";

// if (!ob_start()) {
//     echo "Erreur : ob_start ne fonctionne pas sur ce serveur.";
//     exit;
// }
// echo "Après ob_start()";

// require $templatePath;
// $pageContent = ob_get_clean();

// if (!$pageContent) {
//     echo "Erreur : aucun contenu capturé par ob_get_clean().";
//     exit;
// }
// echo "Contenu capturé par ob_get_clean().";

// $layoutPath = __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'layout.php';
// dump("Layout Path : $layoutPath");

// if (!file_exists($layoutPath)) {
//     echo "Erreur : layout.php introuvable ($layoutPath)";
//     exit;
// }

// require $layoutPath;

// *********************************************************************************

require __DIR__ . '/vendor/autoload.php'; // Charger l'autoloader de Composer

// Charger les routes depuis un fichier centralisé
$routes = require __DIR__ . '/routes/web.php';

// Récupérer la méthode HTTP et l'URI
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Nettoyer les paramètres GET
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

// Rechercher une correspondance dans les routes
$routeMatched = null;
foreach ($routes as $route) {
    [$httpMethod, $routeUri, $handler] = $route;

    // Vérifier la méthode et l'URI
    if ($method === $httpMethod && preg_match('#^' . $routeUri . '$#', $uri, $matches)) {
        $routeMatched = [$handler, $matches];
        break;
    }
}

// Si aucune route ne correspond, afficher une erreur 404
if (!$routeMatched) {
    http_response_code(404);
    require __DIR__ . '/templates/404.php';
    exit;
}

// Récupérer le gestionnaire et les paramètres
[$handler, $params] = $routeMatched;

// Exécuter le gestionnaire
if (is_callable($handler)) {
    call_user_func_array($handler, array_slice($params, 1)); // Passer les paramètres capturés
} elseif (is_string($handler)) {
    $templatePath = __DIR__ . '/templates/' . $handler . '.php';
    if (file_exists($templatePath)) {
        require $templatePath;
    } else {
        http_response_code(500);
        echo "Erreur : le template $templatePath est introuvable.";
    }
} else {
    http_response_code(500);
    echo "Erreur : gestionnaire non valide.";
}
echo "Avant ob_start()";

if (!ob_start()) {
    echo "Erreur : ob_start ne fonctionne pas sur ce serveur.";
    exit;
}
echo "Après ob_start()";

require $templatePath;
$pageContent = ob_get_clean();

if (!$pageContent) {
    echo "Erreur : aucun contenu capturé par ob_get_clean().";
    exit;
}
echo "Contenu capturé par ob_get_clean().";

$layoutPath = __DIR__ . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'layout.php';
dump("Layout Path : $layoutPath");

if (!file_exists($layoutPath)) {
    echo "Erreur : layout.php introuvable ($layoutPath)";
    exit;
}

require $layoutPath;
