<?php
require_once('VehicleInterface.php');
require_once('Road.php');


class Car implements Vehicle
{
    private string $vehicle_name;

    private int $vehicle_position;

    private string $vehicle_type = "Car";

    private array $vehicle_speed;

    private array $vehicle_track;

    private bool $finished = false;

    public function __construct(string $vehicle_name, array $vehicle_speed, Road $road)
    {
        $this->vehicle_name = $vehicle_name;

        $this->vehicle_speed = $vehicle_speed;

        $this->vehicle_track = $road->constructRoad();
        
        $this->vehicle_position = 0;

    }
    
    public function getVehicleName(): string
    {
        return $this->vehicle_name;
    }

    public function getVehicleSpeed(): array
    {
        return [$this->vehicle_speed[0], $this->vehicle_speed[1]];
    }

    public function getVehicleType(): string
    {
        return $this->vehicle_type;
    }

    public function move(): int
    {
        $min = $this->vehicle_speed[0];
        $max = $this->vehicle_speed[1];
        $position = rand($min, $max);
        return $this->vehicle_position + $position;          
    }

    public function vehicleFinished(): bool
    {

        $this->finished = true;
        return $this->finished;
    }

    public function getVehicleStatusFinished(): bool
    {
        return $this->finished;
    }

    public function setPosition(int $position): void
    {
        $this->vehicle_position = $position;
    }

    public function printableTrack(): string
    {
        $position = $this->vehicle_position;
        for ($i=0; $i<count($this->vehicle_track); $i++) {
            if ($i == $position) {
                $this->vehicle_track[$i] = $this->vehicle_name;
            } else {
                $this->vehicle_track[$i] = " * ";
            }
        }
        return implode("", $this->vehicle_track);
    }
}

?>