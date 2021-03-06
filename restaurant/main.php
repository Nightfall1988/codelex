<?php
require_once('Restaurant.php');

$item_amount = readline('How many ingredients do you have? ');

while(!is_numeric($item_amount)) {
    $item_amount = readline('Sorry, only numeric input How many ingredients do you have? ');
}

$available_items = [];
for ($i = 0; $i<$item_amount; $i++) {
    $name =  readline("Please give the name to ingredient " . $i + 1 . ": ");
    $item = new Ingredient($name);
    $available_items[$i] = $item;
}

$ing_collection = new IngredientCollection($available_items);
$garden_salad = new Salad('Garden Salad', ['Tomato', 'Cucumber', 'Bell pepper', 'Mushroom'], $ing_collection);
$caesar_salad = new Salad('Caesar Salad', ['Tomato' ,'Pepper', 'Mushroom', 'Cheese'], $ing_collection);
$fruit_salad = new Salad('Fruit Salad', ['Melon', 'Grape'], $ing_collection);
$available_dishes = new DishCollection([$garden_salad, $caesar_salad, $fruit_salad]);

$restaurant = new Restaurant($ing_collection, $available_dishes);
$possible_dishes = $restaurant->get_possible_dishes();
echo $restaurant->print_existing_ingredients_message($possible_dishes);

?>
