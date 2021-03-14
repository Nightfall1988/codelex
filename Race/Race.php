<?php

class Race 
{

    private VehicleCollection $collection;

    private Road $road;

    private bool $raceFinished = false;

    private array $carsFinished = [];

    public function __construct(VehicleCollection $collection, Road $road)
    {
        $this->collection = $collection;
        $this->road = $road;
    }
   
    public function raceFinished(): bool
    {
        return $this->raceFinished;
    }

    public function createRoad(): void
    {
        $this->road->constructRoad();
    }

    public function checkCarStatus(): void
    {
        $array_of_finished = [];
        $cars = $this->collection->getVehicles();

        for ($i=0; $i<count($cars); $i++) {
            if ($cars[$i]->getVehicleStatusFinished() == false) {
                $array_of_finished[$i] = false;
            } else {
                $array_of_finished[$i] = true;
            }
        }
    }

    public function checkIfAllCarsFinished(): bool
    {
        $allCarStatuses = [];
        foreach ($this->collection->getVehicles() as $vehicle) {
            $vehicleStatusIfWon = $vehicle->getVehicleStatusFinished();
            array_push($allCarStatuses, $vehicleStatusIfWon);
        }

        if (in_array(false, $allCarStatuses)) {
            return false;
        } else {
            return true;
        }
    }

    public function startRace() 
    {
        $allVehicles = $this->collection->getVehicles();
        $tracks = [];
        $races_count = 0;            
        while ($this->checkIfAllCarsFinished() != true) {
            $allVehicles = $this->collection->getVehicles();
            $counter = 0;
            for ($i=0; $i<count($allVehicles);$i++) {
                $position = $allVehicles[$i]->move();
                $road_length = $this->road->getRoadLength();
                if ($road_length <= $position) {
                    $allVehicles[$i]->setPosition($road_length-1);
                    $allVehicles[$i]->vehicleFinished();
                    $this->getLeaderBoard($allVehicles[$i]);
                    $counter++;
                } else {
                    $allVehicles[$i]->setPosition($position);
                    $allVehicles[$i]->getVehicleStatusFinished(); 
                }
                $tracks[$races_count][$i] =  $allVehicles[$i]->printableTrack() . "\n";
            }
            $races_count++;
        }
        return $tracks;
    }

    public function getLeaderBoard($car): array
    {
        $name = $car->getVehicleName();
        if (!in_array($name, $this->carsFinished)) {
            array_push($this->carsFinished, $name);
        }
        return $this->carsFinished;
    }

    public function displayLeaderboard(): string
    {
        if (count($this->carsFinished) == count($this->collection->getVehicles())) {
            $display_leaderboard = [];
            for($i=0; $i<count($this->carsFinished); $i++) {
                $place = $i+1;
                array_push($display_leaderboard, "Winner $place Place winner is: " . $this->carsFinished[$i] . " Congratulations!\n");
            }
        }
        return implode('', $display_leaderboard);
    }
}

// CREATE LEADERBOARD WHO WON, 1st PLACE, 2nd PLACE .... nth PLACE

?>
