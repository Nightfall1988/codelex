<?php
namespace App;

class GreenWarehouse implements Supplier
{
    private ProductCollection $products;

    public function __construct()
    {
        $this->products = new ProductCollection;
        $row = 1;
        if ($handle = fopen("/mnt/d/laragon/www/codelex/Flowers/storage/Flowers.csv",'r') !== FALSE) {
            $handle = fopen("/mnt/d/laragon/www/codelex/Flowers/storage/Flowers.csv",'r');
            $each_row_array = []; 
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {   
                unset($data[1]);   
                {
                $num = count($data);
                $row++;
                for ($i=0; $i < $num; $i++) {
        
                    $each_row_array[] = explode(',', $data[$i]);
                }
            }
            }
            fclose($handle);
        }

        if (count($each_row_array) > 0) {
            for ($i=0; $i<count($each_row_array); $i++) {
                $name = $each_row_array[$i][0];
                $price = $each_row_array[$i][1];
                $amount = $each_row_array[$i][2];
                $this->products->addProducts(new Product(new Flower($name),$price),$amount);
            }
        }

    }

    public function getProducts(): ProductCollection 
    {
        return $this->products;
    }

    public function sellFlowers(string $flower, string $amount) {

    }
}

?>