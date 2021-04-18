<?php

declare(strict_types=1);


namespace App\Vehicles;

use App\Vehicle;

class Helicopter extends Vehicle
{
    public const VEHICLE_TYPE = "Helicopter";

    public function getInfo(): string
    {
        return $this->prepareInformation(self::VEHICLE_TYPE);
    }
}