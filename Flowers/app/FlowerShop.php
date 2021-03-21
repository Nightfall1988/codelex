<?php
namespace App;

class FlowerShop
{
    private array $suppliers = [];

    private array $prices = [];

    public function addSupplier(Supplier $supplier): void
    {
        $this->suppliers[] = $supplier;
    }

    public function allProducts(): ProductCollection
    {
        $products = new ProductCollection();

        foreach($this->suppliers as $supplier)
        {
            $supplier_products = $supplier->getProducts()->getAllProducts();

            foreach($supplier_products as $barCode => ['product' => $product, 'amount' => $amount])
            {
                
                $products->addProducts( new Product(
                    $product->getSellable(),
                    $product->getPrice() +  ($product->getPrice() * 0.2),
                ),$amount
            );
            }
        }

        return $products;
    }
}

?>