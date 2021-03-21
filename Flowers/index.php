<?php
//require_once realpath('vendor/autoload.php');

require 'vendor/autoload.php';
require 'vendor/FastRoute-master/vendor/autoload.php';
require 'vendor/dbal-3.1.x/vendor/autoload.php';


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', 'aboutus', 'get_all_users_handler');
    // {id} must be a number (\d+)
    $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
    // The /{title} suffix is optional
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
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
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        break;
}



use App\ProductCollection;
use App\BlueWarehouse;
use App\FlowerShop;
use App\GreenWarehouse;

$products = new ProductCollection();
//$green_warehouse = new GreenWarehouse;
$blue_warehouse = new BlueWarehouse;

$shop = new FlowerShop();
//$shop->addSupplier($green_warehouse);
$shop->addSupplier($blue_warehouse);
?>
<table style="width:100%">

<?php
echo "<tr><th>Name</th><th>Price</th><th>Amount</th></td>";
foreach ($shop->allProducts()->getAllProducts() as ['product' => $product, 'amount' => $amount]) {
    echo "<tr>" . "<td>" . $product->getSellable()->getName() . "</td>" . ' '  . "<td>" . $product->getPrice()  . "</td>" .  "<td>" . " (amount: $amount)" . "</td>" ."</tr>" . "\n";
}