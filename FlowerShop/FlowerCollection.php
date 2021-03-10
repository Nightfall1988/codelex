<?php
 class FlowerCollection 
 {
     private array $flowerList;

     public function __construct($flowerList)
     {
         $this->flowerList = $flowerList;
     }

     public function getFlowerList(): array
     {
        return $this->flowerList;
     }

     public function deleteFlowers(string $flower, string $amount): array {
         $this->flowerList[$flower] = $this->flowerList[$flower] - $amount;
         return $this->flowerList;
     }
 }
?>