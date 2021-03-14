<?php

class Road
{
    private int $road_length;

    private array $road_array;

    public function __construct(int $road_length)
    {
        $this->road_length = $road_length;        
    }

    public function constructRoad(): array
    {
        for($i=0; $i<$this->road_length; $i++) {
            $this->road_array[$i] = '* ';
        }
        return $this->road_array;
    }

    public function getCurrentRoad(): array
    {
        return $this->road_array;
    }

    public function getRoadLength(): int
    {
        return $this->road_length;
    }

    public function setNewTrack(array $track): array
    {
        $this->road_array = $track;
        return $this->road_array;
    }

}

?>