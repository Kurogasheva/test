<?php

declare(strict_types=1);


namespace App;

abstract class Vehicle implements VehicleInterface
{
    private string $model;
    private float $price;
    private int $speed;

    public function __construct(string $model, float $price, int $speed)
    {
        $this->model = $model;
        $this->price = $price;
        $this->speed = $speed;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    abstract public function getInfo(): string;

    protected function prepareInformation(string $vehicleType): string
    {
        return "$vehicleType: $this->model, $this->speed km/h, $$this->price";
    }
}