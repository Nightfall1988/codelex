<?php

class VehicleCollection
{
    private array $all_vehicles;

    public function __construct(array $all_vehicles)
    {
        $this->all_vehicles = $all_vehicles;
    }

    public function getVehicles(): array
    {
        return $this->all_vehicles;
    }

    public function addCar(Car $car): array
    {
        array_push($this->all_vehicles, $car);
        return $this->all_vehicles;
    }


}

?>