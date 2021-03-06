<?php

class Ingredient 
{
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
    function get_name() 
    {
        return $this->name;
    }
}


?> 
