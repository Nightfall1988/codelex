<?php
require_once('FlowerCollection.php');

class Warehouse 
{
    private FlowerCollection $flowerCollection;

    public function __construct(FlowerCollection $flowerCollection)
    {
        $this->flowerCollection = $flowerCollection;
    }

    public function getFlowerCollection(): FlowerCollection
    {
        return $this->flowerCollection;
    }

    public function sellFlowers(string $flower, string $amount) {
        $this->flowerCollection->deleteFlowers($flower, $amount);
        return $this->flowerCollection->getFlowerList();
    }
}

?>