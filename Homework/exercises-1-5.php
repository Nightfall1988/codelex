<?php
# Exercise 1

echo "The first 10 natural numbers are:";

//todo write a program that displays first 10 natural numbers

for ($i = 1; $i <= 10; $i++) {
    echo $i . "\n";
}

# Exercise 2

$n = readline( "Input number of terms: ");

//todo complete loop to multiply i with itself n times, it is NOT allowed to use built-in pow() function

for ($i = 0; $i <= $n; $i++) {
    echo ($i * $i) . "\n";
}

# Exercise 3

function PrintWords() {
    $first_word = readline('First word: ');
    $second_word = readline('Second word: ');

    $first_length = strlen($first_word);
    $second_length = strlen($second_word);

    $fullWordLength = $first_length + $second_length;

    $amountOfDots = 30 - $fullWordLength;
    $dots_array = [];
    for ($i=0; $i<$amountOfDots; $i++) {
        $dots_array[$i] = '.';
    }

    $dots = implode($dots_array, '');


    return $first_word . $dots . $second_word;
}

echo PrintWords();

# Exercise 4

function FizzBuzz() {

    $number = readline('Enter max number: ');

    $output = [];

    for ($i = 0; $i < $number; $i++) {

        if ($i % 3 == 0 && $i % 5 != 0) {
            array_push($output, 'Fizz');
        }

        elseif ($i % 3 != 0 && $i % 5 == 0) {
             array_push($output, 'Buzz');
        }

        elseif ($i % 3 == 0 && $i % 5 == 0) {
            array_push($output, 'FizzBuzz');
        }
        else {
            array_push($output, $i);
        }
    }

    $all_arrays = array_chunk($output, 20);

    for ($i = 0; $i < count($all_arrays); $i++) {
        echo implode($all_arrays[$i], ' ') . "\n";
    } 
}

FizzBuzz();

# Exercice 5

function Pig() {

    $total_points = 0;

    echo 'Welcome To Piglet!' . "\n";
    $random_nr = rand(1,6);
    $total_points += $random_nr;
    echo "You rolled $random_nr! You have $total_points points at the moment" . "\n";

    $roll = readline('Would you like to roll?');

    while($roll == 'y') {
        $random_nr = rand(1,6);
        if ($random_nr > 1) {
            $total_points += $random_nr;
            echo "You rolled $random_nr! You have $total_points points at the moment" . "\n";
            $roll = readline('Would you like to roll again? ');
        } else {
            echo "You rolled $random_nr!" . "\n";
            return "You Lost $total_points points.";
        }
    }

    if ($roll == 'n') {
        return "You won with $total_points Points";
    } 
}

echo Pig();
?>