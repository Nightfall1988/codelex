<?php 

# OOP Exercise 1

class Product {

    private $name;

    private $price_at_start;

    private $amount_at_start; 

    public function __construct(string $name, float $price_at_start, int $amount_at_start) {
        $this->name = $name;
        $this->price_at_start = $price_at_start;
        $this->amount_at_start = $amount_at_start;
    }

    public function print_product(): string {
        return "$this->name, price: $this->price_at_start, amount: $this->amount_at_start" . "\n";
    }

    public function change_quantity(): string {

        $quantity = 0;

        while ($quantity == 0) {
            
            $quantity = readline('Enter new quantity: ');

            while (!is_numeric($quantity)) {
                $quantity = readline('Sorry, the quantity should be numeric. Enter new quantity: ');
            } 
                $this->amount_at_start = $quantity;
        }
        return "New Product quantity is: $this->amount_at_start";
    }

    public function change_price(): string {

        $price = 0;

        while ($price == 0) {
            
            $price = readline('Enter new price: ');

            while (!is_numeric($price)) {
                $price = readline('Sorry, the price should be numeric. Enter new price: ');
            } 
                $this->price_at_start = $price;
        }
        return "New Product price is: $this->price_at_start";
    }
}

$mouse = new Product("Logitech mouse", 70.00, 14);
$phone = new Product("iPhone 5s", 999.99, 3);
$printer = new Product("Epson EB-U05", 440.46, 1);

echo $mouse->change_quantity() . "\n";;
echo $mouse->change_price() . "\n";
echo $mouse->print_product()  . "\n";

echo $phone->change_quantity();
echo $phone->change_price() . "\n";
echo $phone->print_product() . "\n";

echo $printer->change_quantity() . "\n";
echo $printer->change_price() . "\n";
echo $printer->print_product() . "\n";

# OOP Exercise 2

class Point {

    private $point_X;

    private $point_Y;

    public function __construct(int $x, int $y) {
        $this->point_X = $x;
        $this->point_Y = $y;
    }

    public function getPointX(): int {
        return $this->point_X;
    }

    public function getPointY(): int {
        return $this->point_Y;
    }
}

$p1 = new Point(3,5);
$p2 = new Point(1,7);

function swap_points(object $p1, object $p2) {
    $p1_point_x = $p1->getPointX();
    $p1_point_y = $p1->getPointY();    
    $p2_point_x = $p2->getPointX();
    $p2_point_y = $p2->getPointY();
    $p1 = new Point($p2_point_x, $p2_point_y);
    $p2 = new Point($p1_point_x, $p1_point_y);
    echo "(" . $p1->getPointX() . ", " .$p1->getPointY() . ")";
    echo "(" . $p2->getPointX() . ", " . $p2->getPointY() . ")"; 
}

swap_points($p1, $p2);

# OOP Exercise 3

class FuelGauge {

    private $fuel_liters = 50;

    public function print_fuel(): int {
        return $this->fuel_liters;
    }

    public function fuel_up_car(int $fuel) {

    for ($i=0; $i<$fuel; $i++) {
        if ($this->fuel_liters < 70) {
            $this->fuel_liters++;
        } else {
            break;
        }
    }

    return $this->fuel_liters;

    }

    public function burn_fuel(): string {

    if ($this->fuel_liters > 0) {
        $this->fuel_liters = $this->fuel_liters - 1;
        return $this->fuel_liters;
    } else {
        return "Your fuel tank is at 0 " . "\n";
        }
    }
}


class Odometer {

    private $milage_km = 100000;

    public function print_milage(): int {
        return $this->milage_km;
    }
    
    public function drive(object $fuel_gauge): void {

        if ($this->milage_km > 0) {
            $current_fuel = $fuel_gauge->print_fuel();
            for ($i=$current_fuel; $i>0; $i--) {
                $fuel_liters = $fuel_gauge->burn_fuel() . " ";
                $this->milage_km = $this->milage_km + 10;
                echo "Current milage: $this->milage_km current fuel: $fuel_liters" . "\n";
                if ($this->milage_km == 999999) {
                    $this->milage_km = 0;
                    continue;
                }
            }
        }
    }
}

$fuel_g = new FuelGauge;
$odometer = new Odometer;
echo $odometer->drive($fuel_g);

?>