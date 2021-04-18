<?php

declare(strict_types=1);

require 'autoload.php';

use PHPUnit\Framework\TestCase;
use App\Vehicles\Car;
use App\Park;
use App\Vehicles\Motorbike;
use App\Vehicles\Helicopter;

class Test extends TestCase
{
    private Car $car;
    private Helicopter $helicopter;
    private Motorbike $motorbike;
    private Park $park;

    protected function setUp(): void
    {
        $this->car = new Car('Volga', 0, 150);
        $this->motorbike = new Motorbike('Africa',1000.55, 200);
        $this->helicopter = new Helicopter('Mi-8',100000,60);
        $this->car = new Car('Volga', 100000, 150);

        $vehicles = [$this->car, $this->motorbike, $this->helicopter];

        $this->park = new Park();

        foreach ($vehicles as $vehicle) {
            $this->park->addVehicle($vehicle);
        }
    }

    public function testCreateVehicle(): void
    {
        $testCar = new Car(
            $model = 'Volga',
            $price = 15000,
            $speed = 150
        );

        self::assertEquals($model, $testCar->getModel());
        self::assertEquals($price, $testCar->getPrice());
        self::assertEquals($speed, $testCar->getSpeed());
    }

    public function testGetCarInfo(): void
    {
        $model = $this->car->getModel();
        $speed = $this->car->getSpeed();
        $price = $this->car->getPrice();

        self::assertEquals("Car: $model, $speed km/h, $$price", $this->car->getInfo());
    }

    public function testGetMotorbikeInfo(): void
    {
        $model = $this->motorbike->getModel();
        $speed = $this->motorbike->getSpeed();
        $price = $this->motorbike->getPrice();

        self::assertEquals("Motorbike: $model, $speed km/h, $$price", $this->motorbike->getInfo());
    }

    public function testGetHelicopterInfo(): void
    {
        $model = $this->helicopter->getModel();
        $speed = $this->helicopter->getSpeed();
        $price = $this->helicopter->getPrice();

        self::assertEquals("Helicopter: $model, $speed km/h, $$price", $this->helicopter->getInfo());
    }

    public function testAddVehicleToPark(): void
    {
        $testPark = new Park(2);

        self::assertTrue($testPark->addVehicle($this->car));
        self::assertTrue($testPark->addVehicle($this->motorbike));
        self::assertFalse($testPark->addVehicle($this->helicopter));
    }

    public function testGetParkVehicles(): void
    {
        $vehicles = $this->park->getVehicles();

        self::assertCount(3, $vehicles);
        self::assertContains($this->car, $vehicles);
        self::assertContains($this->motorbike, $vehicles);
        self::assertContains($this->helicopter, $vehicles);
    }

    public function testGetExpensiveVehicleInPark(): void
    {
        $testPark = new Park();

        self::assertNull($testPark->getExpensiveVehicle());

        self::assertEquals($this->helicopter->getPrice(), $this->park->getExpensiveVehicle()->getPrice());
    }

    public function testGetParkCost(): void
    {
        $testPark = new Park();

        self::assertEquals(0,$testPark->getExpensiveVehicle());

        $cost = $this->helicopter->getPrice() + $this->car->getPrice() + $this->motorbike->getPrice();

        self::assertEquals($cost, $this->park->getCost());
    }

    public function testGetAverageVehiclePriceInPark(): void
    {
        $testPark = new Park();

        self::assertEquals(0,$testPark->getExpensiveVehicle());

        $cost = $this->helicopter->getPrice() + $this->car->getPrice() + $this->motorbike->getPrice();

        self::assertEquals($cost / 3, $this->park->getAverageVehiclePrice());
    }
}