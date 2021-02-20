<?php

// 01

$var1 = 10;
$var2 = '10';


if ($var1 === $var2) {
    echo 'same';
}
else {
    echo 'different';
}

//02

$var = 50;

if ($var < 100 && $var > 1) {
    echo 'in range';
} else {
    echo 'out of range';
}

//03

$var = 'hello';

if ($var == 'hello') {
    echo 'world';
}

//04

$var = 17;

if ($var % 2 == 0) {
    echo 'even';
} elseif ($var % 3 == 0) {
    echo 'not devided by 3';
} else {
    echo 'not even or divided by 3';
}

//05

$var = 50;
$min = 1;
$max = 100;

if ($var < $max && $var > $min) {
    echo 'correct';
} else {
    echo 'out of range';
}

//06

$plateNumber = 'HH420';

switch($plateNumber) {
    case 'HH420':
        echo 'My car';
        break;
}
//07

$number = 77;

switch($number) {
    case $number < 50:
        echo 'low';
        break;
    case $number > 50 && $number < 100:
        echo 'medium';
        break;
    case $number > 100:
        echo 'high';
        break;
}
?>