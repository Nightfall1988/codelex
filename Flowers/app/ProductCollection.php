<?php
namespace app;

class ProductCollection
{
    private array $products = [];

    public function addProducts(Product $product, int $amount = 1): void
    {
        $barCode = $product->barCode();

        if (isset($this->products[$barCode])) {
            $this->products[$barCode]['amount'] += $amount;
        }
        else {
        $this->products[$product->barCode()] = [
            'product' => $product,
            'amount'=> $amount
        ];
    }
    }

    public function getAllProducts(): array
    {
        return $this->products;
    }
}

 
?>