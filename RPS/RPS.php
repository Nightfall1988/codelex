<?php

// RPS
$possible_inputs = ['R', 'P', 'S'];
$user_input = readline('Enter R for Rock, S for Scissors and P for paper: ');
$computer_input = $possible_inputs[rand(0,2)];

while (!in_array($user_input, $possible_inputs)) {
    echo "Sorry, there is no option $user_input" . "\n";
    $user_input = readline('Enter: ');
}

if (in_array($user_input, $possible_inputs)) {
    if ($user_input == $computer_input) {
        echo 'Tie!';
    } elseif (($user_input == 'R' && $computer_input == 'P') || 
              ($user_input == 'P' && $computer_input == 'S') ||
              ($user_input == 'S' && $computer_input == 'R') ) {
        echo "Computer has $computer_input and you have $user_input" . "\n";
        echo 'Computer has Won!';
    } elseif (($user_input == 'R' && $computer_input == 'S') || 
              ($user_input == 'P' && $computer_input == 'R') ||
              ($user_input == 'S' && $computer_input == 'P')) {
        echo "Computer has $computer_input and you have $user_input" . "\n";
        echo 'You Won!';
    }
}
?>