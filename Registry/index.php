<?php
session_start();
use App\Controllers\Controller;
use App\Controllers\LoginController;
require 'vendor/autoload.php';
$loader = new Twig\Loader\FilesystemLoader('app/Views');
$twig = new Twig\Environment($loader);

 $dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', [Controller::class,'home']);
    $r->addRoute('POST', '/displayregister', [Controller::class,'add']);
    $r->addRoute('POST', '/search', [Controller::class,'search']);
    $r->addRoute('POST', '/addperson', [Controller::class,'showForm']);
    $r->addRoute('POST', '/searchperson', [Controller::class,'search']);
    $r->addRoute('POST', '/results', [Controller::class,'showResults']);
    $r->addRoute('POST', '/dashboard', [Controller::class,'showDashboard']);
    $r->addRoute('POST', '/login', [LoginController::class,'login']);
    $r->addRoute('GET', '/token={token:\d+}', [LoginController::class,'dashboard']);

 });

 // Fetch method and URI from somewhere
 $httpMethod = $_SERVER['REQUEST_METHOD'];
 $uri = $_SERVER['REQUEST_URI'];
 
 // Strip query string (?foo=bar) and decode URI
 if (false !== $pos = strpos($uri, '?')) {
     $uri = substr($uri, 0, $pos);
 }

 $uri = rawurldecode($uri);
 
 $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
 switch ($routeInfo[0]) {
     case FastRoute\Dispatcher::NOT_FOUND:
         break;
     case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
         $allowedMethods = $routeInfo[1];
         // ... 405 Method Not Allowed
         break;
     case FastRoute\Dispatcher::FOUND:
         $handler = $routeInfo[1][0];
         $method = $routeInfo[1][1];
         $vars = $routeInfo[2];
         $class = new $handler;
         $action = call_user_func(array($class,$method));
         echo $twig->render($action[1], 
         ['post' => $action[0]]);
     }
 
?>