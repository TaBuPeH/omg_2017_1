<?php
class Vehicle
{
    private $brand;
    protected $oilType;
    protected $fuel;
    protected $weight;
    protected $distance;
    
    public function __construct($brand, $oilType, $fuel, $weight, $distance = 0)
    {
        $this->brand = $brand;
        $this->oilType = $oilType;
        $this->fuel = $fuel;
        $this->weight = $weight;
        $this->distance = $distance;
    }
    
    public function GetBrand()
    {
        return $this->brand;
    }
    
    public function GetOilType()
    {
        return $this->oilType;
    }
    
    public function AddFuel($fuel)
    {
        $this->fuel += $fuel;
    }
    
    public function GetFuel()
    {
        return $this->fuel;
    }
    
    public function GetWeight()
    {
        return $this->weight;
    }
    
    public function GetDistance()
    {
        return $this->distance;
    }
    
    public function Move($distance)
    {
        $this->distance += $distance;
    }
}

class Car extends Vehicle
{
    protected $model;
    protected $numDoors;
    protected $numPassengers;
    
    public function __construct($brand, $model, $oilType, $fuel, $weight, $numDoors, $distance = 0)
    {
        parent::__construct($brand, $oilType, $fuel, $weight, $distance);
        $this->model = $model;
        $this->numDoors = $numDoors;
        $this->numPassengers = 0;
    }
    
    public function GetModel()
    {
        return $this->model;
    }
    
    public function GetNumDoors()
    {
        return $this->numDoors;
    }
    
    public function GetNumPassengers()
    {
        return $this->numPassengers;
    }
    
    public function LoadPassengers($numPassengers)
    {
        $this->numPassengers += $numPassengers;
    }
    
    public function RemovePassengers($numPassengers)
    {
        $this->numPassengers -= $numPassengers;
    }
}

final class Cabrio extends Car
{
    private $openRoof;
    
    public function __construct($brand, $model, $oilType, $fuel, $weight, $numDoors, $distance = 0)
    {
        parent::__construct($brand, $model, $oilType, $fuel, $weight, $numDoors, $distance);
        $this->openRoof = false;
    }
    
    public function IsRoofOpen()
    {
        return $this->openRoof;
    }
    
    public function OpenRoof()
    {
        $this->openRoof = true;
    }
    
    public function CloseRoof()
    {
        $this->openRoof = false;
    }
    
    public function Move($distance)
    {
        parent:: Move($distance);
        $this->fuel -= (0.12 * $distance);
    }
}

echo "<pre>";
$mercedes = new Cabrio("Mercedes", "Ne znam marka", "Benzin", 20, 1460, 4, 725);
$mercedes->OpenRoof();
$mercedes->LoadPassengers(2);
$mercedes->Move(50);

var_dump($mercedes);

echo '<br />' . $mercedes->GetOilType();
$mercedes->AddFuel(15);
echo '<br />' . $mercedes->GetFuel();
$mercedes->CloseRoof();
echo '<br />' . $mercedes->IsRoofOpen();
