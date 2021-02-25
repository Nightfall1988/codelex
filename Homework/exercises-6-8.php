<?php 

# Exercise 6

function RollTwoDice() {
    $number = readline('Enter number: ');
    while ($number > 12) {
        echo 'Please enter a number that is less or equals to 12' . "\n";
        $number = readline('Enter number: ');
    }

    $firstDie = rand(1,6);
    $secondDie = rand(1,6);

    while($firstDie + $secondDie != $number) {
        $firstDie = rand(1,6);
        $secondDie = rand(1,6);
        echo "First die result: $firstDie, second die result: $secondDie" . "\n";
    }

    return "Success! First die result: $firstDie, second die result: $secondDie";
}

echo RollTwoDice();

# Exercise 7

 function AsciiArt($size) {
       $star_amount = 8; // stars added/line
       
        $maxLineWidth = $star_amount * ($size - 1);
        for ($line = 0; $line < $size; $line++) {
            $numStarsOnLine = $star_amount * $line;
            $numberOfSlashes = ($maxLineWidth - $numStarsOnLine) / 2;
            for ($i = 0; $i < $numberOfSlashes; $i++) {
                echo "/";
            }
            for ($i = 0; $i < $numStarsOnLine; $i++) {
            echo ("*");
            }
            for ($i = 0; $i < $numberOfSlashes; $i++) {
            echo ("\\");
            }
            echo "\n";
        }
    }
echo AsciiArt(5);

# Exercise 8

function NumberSquare($min, $max) {
    $side = $max - $min + 1;
    $string = $side * $side;
    $numbers = [];
 
     for ($row = 0; $row < $side; $row++) {
         for($col = 0; $col < $side; $col++) {
         array_push($numbers, $min + (($row + $col) % $side) );
         $string = implode($numbers, '');
         echo $string;
         $numbers = [];
         }
         echo "\n";
     }

 }
 
 echo NumberSquare(1,5);
?>