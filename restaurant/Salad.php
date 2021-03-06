<?php
require_once('Dish.php');
require_once('IngredientCollection.php');

class Salad extends Dish
{
    protected array $recipie;

    protected string $name;

    private object $collection;

    private array $missing_items = [];

    private array $existing_items = [];

    public function __construct(string $name, array $recipie, object $collection)
    {
        $this->name = $name;
        $this->recipie = $recipie;
        $this->collection = $collection;
    }

    public function get_recipie(): array
    {
        return $this->recipie;
    }

    public function get_name(): string
    {
        return $this->name;
    }

    public function get_collection() {
        return $this->collection;
    }

    public function check_all_ingredients(): void {

        $ingredient_list = $this->collection->get_ingredient_list();
            foreach($ingredient_list as $ingredient) {
                $name = $ingredient->get_name();
                if (!in_array($name, $this->recipie)) {
                    array_push($this->missing_items, $ingredient);
                } else {
                    array_push($this->existing_items, $ingredient);
                }
            }
        }

    public function get_missing_items() {
        return $this->missing_items;
    }

    public function get_existing_items() {
        return $this->existing_items;
    }
}

// FIND ALL RECIPIES (SALADS) THAT USE INGREDIENT
// OUTPUT WHICH INGREDIENTS ARE MISSING FOR EACH SALAD, THAT USES THE INGREDIENT 
?> 
