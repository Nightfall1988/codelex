<?php
require_once('Salad.php');
require_once('DishCollection.php');

class Restaurant
{
    private object $ingredient_collection;

    private object $dish_collection;

    private array $ingredient_list;

    private array $dish_list;

    private array $missing_products;

    private array $messedge_array;

    public function __construct(object $ingredient_collection, object $dish_collection)
    {
        $this->ingredient_collection = $ingredient_collection;
        $this->dish_collection = $dish_collection;
        $this->missing_products = [];
        $this->messedge_array = [];
    }

    public function get_possible_dishes(): array {

        $this->ingredient_list = $this->ingredient_collection->get_ingredient_list();
        $this->dish_list = $this->dish_collection->get_dish_list();
        $possible_dishes = [];
        for($i=0; $i<count($this->ingredient_list); $i++) {
            $item_name = $this->ingredient_list[$i]->get_name();
            for ($j=0; $j<count($this->dish_list); $j++)
            if (in_array($item_name,$this->dish_list[$j]->get_recipie())) {
                array_push($possible_dishes, $this->dish_list[$j]);
            }
        }
        return $possible_dishes;
    }

    public function print_existing_ingredients_message(array $possible_dishes): string {

        foreach ($possible_dishes as $salad) {
            $saladName = $salad->get_name();
            $saladRecipie = $salad->get_recipie();
            $existing_products = [];
            for ($i=0; $i<count($this->ingredient_list); $i++ ) {
                $name = $this->ingredient_list[$i]->get_name();
                if (in_array($name, $saladRecipie)) {
                    array_push($existing_products, $name);
                    $key = array_search($name, $saladRecipie);
                    unset($saladRecipie[$key]);
                    if (count($saladRecipie) == 0) {
                        $missing_products_state = 'and you are set up!';
                    } else {
                        $missing_products_state = 'but you need';
                    }
                }
            }
            $this->missing_products = $saladRecipie;
            $messedge = "You have ". implode(', ', $existing_products)  . " for $saladName, $missing_products_state " . implode(', ', $this->missing_products);
            if (!in_array($messedge, $this->messedge_array)) {
                array_push($this->messedge_array, $messedge);
            }
        }

       $messege = implode("\n", $this->messedge_array);
        return $messege;
    }



}

