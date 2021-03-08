<?php 

# Exercise 6

$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;


class Stats 

{
    private float $purchased_percent;

    private float $prefer_citrus_percent;

    public function __construct(float $purchased_percent, float $prefer_citrus_percent)
    {
        $this->purchased_percent = $purchased_percent;
        $this->prefer_citrus_percent = $prefer_citrus_percent;
    }

    function calculate_energy_drinkers(int $numberSurveyed): int
    {
        $drinkers_number = $numberSurveyed * $this->purchased_percent;
        return $drinkers_number;
    }

    function calculate_prefer_citrus(int $numberSurveyed): int
    {
        $drinkers_number = $this->calculate_energy_drinkers($numberSurveyed);
        $those_prefer_citrus = $drinkers_number * $this->prefer_citrus_percent;
        return $those_prefer_citrus;
    }
}

$statistics = new Stats($purchased_energy_drinks, $prefer_citrus_drinks);
$regular_customer = $statistics->calculate_energy_drinkers($surveyed);
$amount_of_citrus_lovers = $statistics->calculate_prefer_citrus($surveyed);
echo "Total number of people surveyed " . $surveyed . "\n"; 
echo "Approximately " . $regular_customer . " bought at least one energy drink";
echo " of those " . $amount_of_citrus_lovers . " prefer citrus flavored energy drinks." . "\n";
