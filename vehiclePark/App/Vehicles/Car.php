<?php

declare(strict_types=1);


namespace App\Vehicles;

use App\Vehicle;

class Car extends Vehicle
{
    public const VEHICLE_TYPE = "Car";

    public function getInfo(): string
    {
        return $this->prepareInformation(self::VEHICLE_TYPE);
    }
}