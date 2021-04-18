<?php

declare(strict_types=1);


namespace App;

class Park
{
    private array $vehicles;
    private int $capacity;

    public function __construct(int $capacity = 50)
    {
        $this->capacity = $capacity;
        $this->vehicles = [];
    }

    public function addVehicle(VehicleInterface $vehicle): bool
    {
        if (count($this->vehicles) === $this->capacity) {
            return false;
        }

        $this->vehicles[] = $vehicle;

        return true;
    }

    public function getExpensiveVehicle(): ?VehicleInterface
    {
        $expensiveVehicle = reset($this->vehicles) ?: null;

        foreach ($this->vehicles as $vehicle) {
            if ($expensiveVehicle->getPrice() < $vehicle->getPrice()) {
                $expensiveVehicle = $vehicle;
            }
        }

        return $expensiveVehicle;
    }

    public function getVehicles(): array
    {
        return $this->vehicles;
    }

    public function getAverageVehiclePrice(): float
    {
        $count = count($this->vehicles);

        return $count === 0 ? 0 : $this->getCost() / $count;
    }

    public function getCost(): float
    {
        $cost = 0;
        foreach ($this->vehicles as $vehicle) {
            $cost += $vehicle->getPrice();
        }

        return $cost;
    }
}