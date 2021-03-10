<?php

require_once('FlowerCollection.php');
require_once('Warehouse.php');
require_once('FlowerShop.php');


$list1 = [
    'Tulips' => 200,
    'Roses' => 30,
    'Violets' => 60,
    'Lillies' => 25 
];

$list2 = [
    'Tulips' => 50,
    'Daisies' => 50,
    'Lotuses' => 60,
    'Violets' => 30
];

$prices = [
    "Tulips"=> 12,
    "Roses"=>25,
    "Violets"=>15,
    "Lillies"=>20,
    "Daisies"=>10,
    "Lotuses"=>100
];
$flowerColl = new FlowerCollection($list1);
$flowerColl2 = new FlowerCollection($list2);
$warehouse1 = new Warehouse($flowerColl);
$warehouse2 = new Warehouse($flowerColl2);
$warehouses = [$warehouse1, $warehouse2];

$shop = new FlowerShop($prices, $warehouses);
$shop->checkGender();
$list = $shop->getAllFlowers($warehouses);

$all_products = $shop->printFlowerOptions($prices);

$shop->calculateFullPrice();

for ($i=0; $i<count($all_products); $i++) {
    $index = $i+1;
    echo "[$index] $all_products[$i]";
}

$selected = $shop->selectFlowers();
for ($i=0; $i<count($selected); $i++) {
    $flower = $selected[$i][0];
    $amount = $selected[$i][1];

    echo "Selected flower: $flower Selected amount: $amount" . "\n";
}
echo "Full Price: " . $shop->calculateFullPrice() . "\n";
$warehouses = $shop->buyFlowers(); 

echo "Flowers left in all warehouses: " . "\n";
foreach($warehouses as $warehouse) {
    $list = $warehouse->getFlowerCollection()->getFlowerList();
    foreach($list as $name=>$value) {
        echo "$name" . ": " . "$value" . " pieces left\n";
    }
}

?>