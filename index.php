<?php

require __DIR__ . '/vendor/autoload.php';
error_reporting(E_ALL);
use App\SayHello;
use App\GetBase64;
use App\SayHelloInLanguage;


$uriSegments = explode('/', $_SERVER['REQUEST_URI']);
$controllerName = !empty($uriSegments[1]) ? $uriSegments[1] : SayHello::class;
$actionName = !empty($uriSegments[2]) ? $uriSegments[2] : 'index';


try {

    $controllerName = "App\\" . ucfirst($controllerName);
    if (class_exists($controllerName) == false) {
        throw new Exception('Unknown class');
    }
    $controller = new $controllerName;
    if (method_exists($controller, $actionName) == false) {
        throw new Exception('Unknown action');
    }
    $controller->{$actionName}();

} catch (\Exception $e) {
    echo 'Page not found, error 404';
}

