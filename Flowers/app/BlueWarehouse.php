<?php
namespace App;
use App\Supplier;
use Database;

class BlueWarehouse implements Supplier
{
    private ProductCollection $products;

    public function __construct()
    {
        $db = new Database;
        $this->products = new ProductCollection;
        $sql1 = "SELECT * FROM Products;";
        $result = $db->query($sql1);
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $amount = $row['amount'];
            $price = $row['price'];
            $this->products->addProducts(new Product(new Flower($name),$price),$amount);
        }
    }

    public function getProducts(): ProductCollection 
    {
        return $this->products;
    }
}

?>