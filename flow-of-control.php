<?php
//todo print the largest number

function FindLargestNumber() {
    $firstNr = readline("Input the 1st number: ");
    $secondNr = readline("Input the 2nd number: ");
    $thirdNr = readline("Input the 3rd number: ");

    $number_array = [$firstNr, $secondNr, $thirdNr];

    $largestNr = max($number_array);

    return $largestNr;
}

echo FindLargestNumber();

//todo print if number is positive or negative
function DetermineNumberSign() {

    $number = readline("Enter the number: ");

    if ($number < 0) {
        return 'Negative';
    } elseif ($number == 0) {
        return 'Number is 0';
    } else {
        return 'Positive';
    }
}

echo DetermineNumberSign();

