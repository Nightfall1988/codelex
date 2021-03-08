<?php 

# Exercise 7

require_once('Exercise_7_Dog.php');

class DogTest
{

    public function __construct()
    {
        
    }
    public function Main(): void
    {
        $max = new Dog("Max", "male");
        $rocky = new Dog("Rocky", "male");
        $sparky = new Dog("Sparky", "male");
        $buster = new Dog("Buster", "male");
        $sam = new Dog("Sam", "male");
        $lady = new Dog("Lady", "female");
        $molly = new Dog("Molly", "female");
        $coco = new Dog("Coco", "female");

        $max->setFather($rocky);
        $max->setMother($lady);

        $coco->setFather($buster);
        $coco->setMother($molly);
        
        $rocky->setFather($sam);
        $rocky->setMother($molly);
        
        $buster->setFather($sparky);
        $buster->setMother($lady);

        echo $coco->fathersName() . "\n";
        echo $sparky->fathersName() . "\n";

        echo $coco->HasSameMotherAs($rocky);
    }
}

$dog_test = new DogTest();
$dog_test->Main();
?>