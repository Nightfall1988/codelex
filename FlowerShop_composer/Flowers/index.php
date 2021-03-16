<?php
require_once realpath('vendor/autoload.php');

use App\ProductCollection;
use App\BlueWarehouse;
use App\FlowerShop;
use App\GreenWarehouse;

$products = new ProductCollection();
$green_warehouse = new GreenWarehouse;
$blue_warehouse = new BlueWarehouse;

$shop = new FlowerShop();
$shop->addSupplier($green_warehouse);
$shop->addSupplier($blue_warehouse);
?>
<table style="width:100%">

<?php
echo "<tr><th>Name</th><th>Price</th><th>Amount</th></td>";
foreach ($shop->allProducts()->getAllProducts() as ['product' => $product, 'amount' => $amount]) {
    echo "<tr>" . "<td>" . $product->getSellable()->getName() . "</td>" . ' '  . "<td>" . $product->getPrice()  . "</td>" .  "<td>" . " (amount: $amount)" . "</td>" ."</tr>" . "\n";
}