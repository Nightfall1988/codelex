<?php

interface Vehicle
{
    public function getVehicleName(): string;

    public function getVehicleType(): string;

    public function getVehicleSpeed(): array;

    public function move(): int;

    public function vehicleFinished(): bool;

    public function getVehicleStatusFinished(): bool;

    public function setPosition(int $position): void;

    public function printableTrack(): string;
}

?>