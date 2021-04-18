<?php

declare(strict_types=1);


namespace App\Vehicles;

use App\Vehicle;

class Motorbike extends Vehicle
{
    public const VEHICLE_TYPE = "Motorbike";

    public function getInfo(): string
    {
        return $this->prepareInformation(self::VEHICLE_TYPE);
    }
}