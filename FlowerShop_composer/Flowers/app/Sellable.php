<?php
namespace App;

interface Sellable 
{
    public function id(): string;

    public function getName(): string;
}
?>