<?php

namespace App;
use App\Supplier;

class BlueWarehouse implements Supplier
{
    private ProductCollection $products;

    public function __construct()
    {
        $json = (file_get_contents('/mnt/d/laragon/www/codelex/Flowers/storage/Flowers.json'));

        $product_list = json_decode($json);
        $this->products = new ProductCollection;
        foreach($product_list as $key=>$product) {

            $this->products->addProducts(new Product(new Flower($product->name),$product->price),$product->amount);
        }
    }

    public function getProducts(): ProductCollection 
    {
        return $this->products;
    }
}

?>