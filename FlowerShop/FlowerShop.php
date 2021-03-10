<?php

require_once('FlowerShopInterface.php');

class FlowerShop implements FlowerShopInterface
{
    private bool $isWoman = false;

    private array $allFlowers = [];

    private array $available_products = [];

    private array $selected_flowers = [];

    private array $warehouses = [];

    private array $price_list = [];

    public function __construct(array $price_list, array $warehouses)
    {
        $this->price_list = $price_list;

        $this->warehouses = $warehouses;
        
    }

    public function checkGender(): void
    {
        $isWoman = readline('Is customer a woman? Y/N: ');
        while ($isWoman != 'Y' && $isWoman != 'N') {
            $isWoman = readline('Incorrect input. Is customer a woman? Y/N: ');
        }

        if ($isWoman == 'Y') {
            $this->isWoman = true;
        } else {
            $this->isWoman = false;
        }
    }

    public function getAllFlowers(): array 
    {
        foreach ($this->warehouses as $warehouse) {
            $collection = $warehouse->getFlowerCollection();
            $flowerList = $collection->getFlowerList();
            
            foreach ($flowerList as $flowerName=>$value)
            if (!array_key_exists($flowerName, $this->allFlowers)) {
                $this->allFlowers[$flowerName] = $value;
            } else {
                $this->allFlowers[$flowerName] = $value + $this->allFlowers[$flowerName];
            }
        }
        return $this->allFlowers;
    }

    public function printFlowerOptions(): array
    {
        foreach ($this->allFlowers as $flowerName=>$value) {
           $price = $this->price_list[$flowerName];
           array_push($this->available_products, "Flower name: $flowerName available: $value, price for 1: $price" . "\n");
        }
        return $this->available_products;
    }

    public function selectFlowers(): array
    {
        $amount_of_types = readline('How many types of flowers do you want? ');

        while (!is_numeric($amount_of_types)) {
            $amount_of_types = readline('Sorry, only numbers. How many types of flowers do you want? ');
        }

        for($i=0; $i<$amount_of_types; $i++) 
        {
            $index = readline('Which flower do you want to buy? ');
            while (!is_numeric($index)) {
                $index = readline('Sorry, only numbers. Which flower do you want to buy? ');
            }
            $index = $index-1;
            $flower = explode(' ', $this->available_products[$index])[2];
            $amount_available = $this->allFlowers[$flower];

            $amount = readline("You selected $flower, available amount: $amount_available. How many do you want? ");
            while (!is_numeric($amount) || $amount > $amount_available) {
                $amount = readline('Sorry, invalid input. How many do you want? ');
            }
            $this->selected_flowers[$i] = [$flower, $amount];
        }
        return $this->selected_flowers;
    }

    public function calculateFullPrice(): int {
        $price = 0;
        for($i=0; $i<count($this->selected_flowers); $i++) {
            $selected_flower = $this->selected_flowers[$i][0];
            $selected_amount = $this->selected_flowers[$i][1];

            $price += $this->price_list[$selected_flower] * $selected_amount;
        }

        if ($this->isWoman == true) {
            $price = $this->applyDiscount($price);
        }
        return $price;
    }

    public function getGender(): bool
    {
        return $this->isWoman;
    }

    public function buyFlowers()
    {
        foreach($this->warehouses as $warehouse) {
            $collection = $warehouse->getFlowerCollection();
            $list = $collection->getFlowerList();

            for ($i=0; $i<count($this->selected_flowers); $i++)
            {
                $name = $this->selected_flowers[$i][0];
                $amount = $this->selected_flowers[$i][1];
                if (array_key_exists($name, $list)) {
                    $warehouse->sellFlowers($name,$amount);
                }
            }
        }
        return $this->warehouses;
    }

    public function applyDiscount($price): int 
    {
        $discount = $price * 0.2;
        $price = $price - $discount;

        return $price;
    }
}

?>