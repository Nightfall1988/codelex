<?php

require_once('Ingredient.php');


class IngredientCollection
{
    private array $ingredient_list = [];

    public function __construct(array $ingredient_list)
    {
        $this->ingredient_list = $ingredient_list;
    }

    public function get_ingredient_list():array {
        return $this->ingredient_list;
    }

    public function check_list_for_ingredient(object $ingredient): bool {
        $ingredient_in_array = false;
        $neededIngredient = array_filter(
            $this->ingredient_list,
            function ($obj) use (&$ingredient) {
                if ($obj->get_name() === $ingredient->get_name()) {
                    return true;
                } else {
                    return false;
                }
            }
        );
        
        if ($neededIngredient == true) {
            $ingredient_in_array = true;
            return $ingredient_in_array;
        } else {
            $ingredient_in_array = false;
            return $ingredient_in_array;
        }
    }

    public function add_ingredient(object $ingredient): string
    {
        if ($this->check_list_for_ingredient($ingredient) == false) {
            array_push($this->ingredient_list, $ingredient);
            return 'Item added to list';
        } else {
            return 'Item already in list';
        }
    }

}

?> 
