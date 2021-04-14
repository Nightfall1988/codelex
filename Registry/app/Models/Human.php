<?php
namespace App\Models;

class Human
{
    private string $name;
    private int $age;
    private string $code;
    private string $description;
    private string $address;

    public function __construct(string $name,
                                string $age,
                                string $code,
                                string $description,
                                string $address
                                )
    {
        $this->name = $name;
        $this->age = intval($age);
        $this->description = $description;
        $this->code = $code;
        $this->address = $address;
    }

    public function getName(): string {
        return $this->name;
    }    
    
    public function getCode(): string {
        return $this->code;
    }   
    
    public function getDesc(): string {
        return $this->description;
    }
    
    public function getAge(): string {
        return $this->age;
    }

    public function getAddress(): string {
        return $this->address;
    }
}
?>