<?php 

# Exercise 7

class Dog 

{
    private string $name;

    private string $sex;

    private object $father;

    private object $mother;

    public function __construct(string $name, string $sex) 
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function fathersName(): string
    {
        if (!isset($this->father)) {
            return "Unknown";
        } else {
            return $this->father->getName(); 
        }
    }

    public function mothersName(): string
    {
        if (!isset($this->mother)) {
            return "Unknown";
        } else {
            return $this->mother->getName(); 
        }
    }

    public function setFather(object $dog): object
    {
        $this->father = $dog;
        return $this->father;

    }

    public function setMother(object $dog): object
    {
        $this->mother = $dog;
        return $this->mother;
    }

    public function HasSameMotherAs(object $otherDog): bool {
        if ($this->mother->getName() === $otherDog->mother->getName()) {
            return true;
        } else {
            return false; 
        }
    }
}

?>