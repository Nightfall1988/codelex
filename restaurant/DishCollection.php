<?php

require_once('Ingredient.php');


class DishCollection
{
    private array $dish_list = [];

    public function __construct(array $dish_list)
    {
        $this->dish_list = $dish_list;
    }

    public function get_dish_list() {
        return $this->dish_list;
    }

    public function check_list_for_dish(object $dish): bool {
        $ingredient_in_array = false;
        $neededIngredient = array_filter(
            $this->dish_list,
            function ($obj) use (&$dish) {
                if ($obj->get_name() === $dish->get_name()) {
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

    // public function add_ingredient(object $ingredient): string
    // {
    //     if ($this->check_list_for_dish($ingredient) == false) {
    //         array_push($this->ingredient_list, $ingredient);
    //         return 'Item added to list';
    //     } else {
    //         return 'Item already in list';
    //     }
    // }

}

?> 
