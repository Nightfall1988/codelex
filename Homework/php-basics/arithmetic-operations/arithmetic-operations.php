<?php
# Exercise #1 

function CheckIf15(int $val1, int $val2): bool {
    if ($val1 === 15 || $val2 === 15 || $val1 - $val2 === 15 || $val1 + $val2 === 15) {
        return true;
    } else {
        return false;
    }

}

//echo CheckIf15(9,6);

# Exercise #2

function CheckOddEven(int $number): string {
    $result = '';
    if ($number % 2 === 0) {
        $result = "Even Number";
    } else {
        $result = 'Odd Number';
    }
    return $result . '. Bye!';

}
//echo CheckOddEven(6);

# Exercise #3 

$lower_bound = 1;
$upper_bound = 100;

function CountNumbers(int $lower_bound, int $higher_bound): int {
    $counter = 0;
    for ($i = $lower_bound; $i <= $higher_bound; $i++) {
        $counter += $i;
    }
    return $counter;
}

//echo CountNumbers($lower_bound, $upper_bound);

function AverageOfNumbers(int $lower_bound,  int $higher_bound): float{
    $divider = ($higher_bound - $lower_bound) + 1;
    $average = (CountNumbers($lower_bound, $higher_bound)) / $divider;
    $average = number_format($average,2);
    return $average;
}

//echo AverageOfNumbers($lower_bound, $upper_bound);

# Exercise 4

function Factorial(int $number): int {
    $factorial = 1;  
    for ($i = $number; $i > 1; $i--) {  
        $factorial = $factorial * $i;  
    }  
    return "Factorial of $number is $factorial";
}

//echo Factorial(4);

# Exercise 5

function GuessNumber() {

    $random_nr = rand(1,100);
    $guess = readline("I'm thinking of a number between 1-100.  Try to guess it!");

    if ($guess < $random_nr) {
        return "Sorry, you are too low. I was thinking of $random_nr";
    } elseif ($guess > $random_nr) {
        return "Sorry, you are too high. I was thinking of $random_nr";
    } else {
        return 'Correct';
    }
}

//echo GuessNumber();

# Exercise 6


function CozaLozaWoza() {

    $output = [];

    for ($i = 0; $i < 110; $i++) {

        if ($i % 3 == 0 && $i % 5 != 0) {
            array_push($output, 'Coza');
        }

        elseif ($i % 3 != 0 && $i % 5 == 0) {
             array_push($output, 'Loza');
        }

        elseif ($i % 3 == 0 && $i % 5 == 0) {
            array_push($output, 'CozaLoza');
        }

        elseif ($i % 3 != 0 && $i % 5 != 0 && $i % 7 == 0) {
            array_push($output, 'Woza');
        }
        else {
            array_push($output, $i);
        }
    }

    $all_arrays = array_chunk($output, 11);

    for ($i = 0; $i < count($all_arrays); $i++) {
        echo implode($all_arrays[$i], ' ') . "\n";
    } 
}

//echo CozaLozaWoza();

# Exercise #7

function FindPosition($time) {
    $a = -9.81;
    $init_v = 0;
    $init_x = 0;
    $pos = 0.5 * $a * $time ** 2 + $init_v * $time + $init_x;
    return $pos . 'm';
}
//echo FindPosition(10);

# Exercise #8

function SalaryCalculator($base_pay, $hours_worked) {
    $overtime_hours = $hours_worked - 40;
    $overtime_pay = $base_pay * 1.5;

    if ($hours_worked >= 60 || $base_pay < 8.00) {
        return "Error: The Employee is is insufficently paid or worked too many hours";
    } else {
        if ($overtime_hours <= 0) {
            return $salary = $hours_worked * $base_pay;
        } elseif ($overtime_hours > 0) {
            $base_salary = 40 * $base_pay;
            $overtime_pay = $base_pay * 1.5;
            $overtime_salary = $overtime_pay * $overtime_hours;
            return $base_salary + $overtime_salary;
        }
    }
}

//echo SalaryCalculator(7.50,35) . "\n";
//echo SalaryCalculator(8.20,47) . "\n";
//echo SalaryCalculator(10.00,73) . "\n";

# Exercise #9

// Accepts  BMI_Calculator(meters, kilograms)

function BMI_Calculator($height, $weight) {
    $height = $height * 39.37;
    $weight = $weight * 2.205;

    $BMI = $weight * 703 / $height ** 2;

    if ($BMI > 18.5 && $BMI < 25) {
        return "Optimal weight";
    } elseif ($BMI <= 18.5) {
        return "Underweight";
    } elseif ($BMI >= 25) {
        return "Overweight";
    }
}

//echo BMI_Calculator(1.7, 67);

class Geometry {

    public static function CircleArea($r) {
        if ($r < 0) {
            return 'Error: Radius cannot be negative';
        } else {
        $pi = pi();
        return $pi * $r ** 2;
        }
    }

    public static function RectangleArea($width, $length) {
        if (($width < 0) || ($width < 0)) {
            return 'Error: Width and Height cannot be negative';
        } else {
            return $width * $length;
        }
    }

    public static function TriangleArea($base, $height) {
        if (($base < 0) || ($height < 0)) {
            return 'Error: Base and Height cannot be negative';
        } else {
            return $base * $height * 0.5;
        }
    }
}

function GeometryCalculator() {

   echo "Geometry calculator:" . "\n";
   echo "Calculate the Area of a Circle" . "\n";
   echo "Calculate the Area of a Rectangle" . "\n";
   echo "Calculate the Area of a Triangle" . "\n";
   echo "Quit" . "\n";

   $choice = readline("Enter your choice (1-4): ");

   if ((1 > $choice) || ($choice > 4)) {
       echo "Error: Incorrect input. Please choose a numbeer between 1 and 4";
   } else {
       switch ($choice) {
           case "1":
            $radius = readline('Enter radius: ');
            echo Geometry::CircleArea($radius);
            break;

            case "2":
            $width = readline('Enter width: ');
            $length = readline('Enter lenghth: ');
            echo Geometry::RectangleArea($width, $length);
            break;

            case "3":
            $base = readline('Enter base: ');
            $height = readline('Enter height: ');
            echo Geometry::TriangleArea($base, $height);
            break;

            case '4':
            echo 'Bye!';
            die();
       }
   }
}

echo GeometryCalculator();

?>  
