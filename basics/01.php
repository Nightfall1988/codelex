
###### Exercise 1

Create variable that prints out an integer 10, float 10.10, string "hello world"

###### Exercise 2

Dump the same values that should display both data type & its value. (Note, usage of var_dump)

###### Exercise 3

Concatenate your name, surname and integer of your age.

<?php

// 01

$var = 10;
echo $var;

$floatVar = 10.10;
echo $floatVar;

$str = 'hello world';
echo $str;

//02

var_dump($var);
var_dump($floatVar);
var_dump($str);

// 03

$fname = 'Grigorijs';
$lname = 'Mamilovs';
$age = '30';

echo $fname . ' ' . $lname . ' ' . $age . ' ';
?>