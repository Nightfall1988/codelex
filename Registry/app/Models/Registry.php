<?php
namespace App;
use App\Collections\PeopleCollection;

class Registry
{
    private PeopleCollection $collection;

    public function __construct()
    {
        $this->collection = new PeopleCollection();
        $this->collection->setCollection();
    }

    public function getCollection(): PeopleCollection 
    {
        return $this->collection;
    }

}
?>