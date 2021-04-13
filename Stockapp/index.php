<?php declare(strict_types=1);
session_start();
use League\Container\Container;
use App\Controllers\PurchaseController;
use App\Services\Service;
use App\Repositories\StockRepository;
use App\Controllers\HomeController;
use App\Collections\ShareCollection;
use App\Views\View;
use Twig\Extra\CssInliner\CssInlinerExtension;

require 'vendor/autoload.php';

$loader = new Twig\Loader\FilesystemLoader('app/Views/views');
$twig = new Twig\Environment($loader,
    [
        'debug' => true
    ]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());
    $twig->addExtension(new CssInlinerExtension());

$container = new League\Container\Container;

$container->add(StockRepository::class);
$container->add(ShareCollection::class);
$container->add(View::class);
$container->add(HomeController::class)->addArgument(Service::class);
$container->add(PurchaseController::class)->addArgument(Service::class);
$container->add(Service::class)->addArgument(StockRepository::class);

// FASTROUTE
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', [HomeController::class, 'showForm']);
    $r->addRoute('GET', '/buy', [PurchaseController::class, 'getFormSelection']);
    $r->addRoute('GET', '/confirmPurchase', [PurchaseController::class, 'buyShares']);
    $r->addRoute('GET', '/myshares', [HomeController::class, 'showAllShares']);
    $r->addRoute('POST', '/sell', [PurchaseController::class, 'sell']);
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
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $method = $routeInfo[1][1];
        $vars = $routeInfo[2];
        $class = $routeInfo[1][0];
        $action = $container->get($class)->$method();
        echo $twig->render($action[1], 
        ['post' => [$action[0]]]);
        break;
    }
?>