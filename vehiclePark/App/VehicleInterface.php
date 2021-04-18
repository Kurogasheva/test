<?php

declare(strict_types=1);


namespace App;

interface VehicleInterface
{
    public function getModel(): string;

    public function getPrice(): float;

    public function getSpeed(): int;

    public function getInfo(): string;
}