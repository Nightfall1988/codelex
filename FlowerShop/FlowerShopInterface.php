<?php
interface FlowerShopInterface
{
    public function buyFlowers() ;

    public function checkGender();

    public function printFlowerOptions();

    public function applyDiscount($price);

    public function getGender();

    public function calculateFullPrice();

    public function getAllFlowers();

}
?>