<?php
namespace App;

interface Supplier
{
    public function getProducts(): ProductCollection;
}
?>