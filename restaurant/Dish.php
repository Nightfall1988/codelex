<?php
require_once('Ingredient.php');

abstract class Dish
{
    protected array $recipie = [];

    protected string $name;

    public function __construct(string $name, array $recipie)
    {
        $this->name = $name;
        $this->recipie = $recipie;
    }

    public function get_recipie():array {
        return $this->recipie;
    }
}




?> 
