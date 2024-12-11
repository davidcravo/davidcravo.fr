<?php
include 'includes' . DIRECTORY_SEPARATOR . 'init.php';

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$router = new AltoRouter();
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routes.php';

$match = $router->match();
if(is_array($match)) {
    if(is_callable($match['target'])){
        call_user_func_array($match['target'], $match['params']);
    }else{
        $params = $match['params'];
        ob_start();
        require 'templates' . DIRECTORY_SEPARATOR . "{$match['target']}.php";
        $pageContent = ob_get_clean();
    }
    require 'elements' . DIRECTORY_SEPARATOR . 'layout.php';
}else{
    echo '404';
}