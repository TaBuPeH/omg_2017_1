<?php

class Vehicle
{
    protected $km = 0;
    protected $oil = 0;
    protected $horsePower;
    protected $maxKM;
    public $tempMaxKM;

    public function move($distance)
    {
        $this->km += $distance;
    }

    public function addOil($plusOil)
    {
        $this->oil += $plusOil;
    }

    public function resetKM() 
    {
        $this->km = 0;
    }

    protected function getOil()
    {
        return $this->oil;
    }

        public function setHP($aHorsePower)
    {
        $this->horsePower = $aHorsePower;
    }

    public function setMaxKM($aMaxKM)  
    {
        $this->maxKM = $aMaxKM;
        $this->tempMaxKM = $aMaxKM;
    }
}

class Car extends Vehicle 
{

    private $type;
    private $seats;

    public function setType($aType)
    {
        $this->type = $aType;
    }

    public function setSeats($aSeats)
    {
        $this->seats = $aSeats;
    }

    public function outOfOil()
    {
        if(parent::getOil() == 0)
        {
            $this->maxKM = 0;
        }
        
        else
        {
            $this->maxKM =  $this->tempMaxKM;
        }
    }
}

class Truck extends Vehicle
{
    protected $maxCapacity;
    protected $trailers;
    protected $capacity = 0;
    
    public function setCapacity($aMaxCapacity)
    {
        $this->maxCapacity = $aMaxCapacity;
    }

    public function setTrailers($aTrailers)
    {
        $this->trailers = $aTrailers;
    }

    public function load($aCapacity)
    {
        $this->capacity += $aCapacity;
    }

    public function unload()
    {
        $this->capacity = 0;
    }

    public function drop()
    {
        if($this->capacity > $this->maxCapacity)
        {
            $this->unload();
        }
    }
}

class Tank extends Truck
{
    private $typeOfGas;
    private $isDangerous;

    public function setTypeOfGas($aTypeOfGas)
    {
        $this->typeOfGas = $aTypeOfGas;
    }

    public function Danger($aDanger)
    {
        $this->isDangerous = $aDanger;
    }
}

class Hopper extends Truck
{
    private $typeOfLuggage;

    public function setTypeOfLuggage($aTypeOFLuggage)
    {
        $this->typeOfLuggage = $aTypeOFLuggage;
    }
}

class Plane extends Vehicle
{
    private $maxHeight;
    private $pilotName;

    public function setMaxHeight($aMaxHeight)
    {
        $this->maxHeight = $aMaxHeight;
    }

    public function setPilotName($aPilotName)
    {
        $this->pilotName = $aPilotName;
    }
}

class touristPlane extends Plane
{
    private $amountOfPassengers;
    private $businessClass;

    public function setPassengers($aPassengers)
    {
        $this->amountOfPassengers = $aPassengers;
    }

    public function businessClass($aBusinessClass)
    {
        $this->businessClass = $aBusinessClass;
    }
}

class Cargo extends Plane
{
    private $capacity = 0;

    public function loadPlane($addCapacity)
    {
        $this->capacity += $addCapacity;
    }

    public function unloadPlane()
    {
        $this->capacity = 0;
    } 
}

echo "<pre>";
$x = new Car();
$x->move(4);
$x->setType("Cargo");
$x->setHP(300);
$x->setMaxKM(260);
$x->setSeats(4);
$x->outOfOil();
$x->addOil(400);
$x->outOfOil();
var_dump($x);
echo "<br><br>";
echo "<pre>";
$y = new Tank();
$y->move(200);
$y->setHP(500);
$y->setMaxKM(120);
$y->addOil(400);
$y->setCapacity(2500);
$y->setTrailers(2);
$y->load(1300);
$y->setTypeOfGas("Methane");
$y->Danger("true");
var_dump($y);
echo "<br><br>";
echo "<pre>";
$z = new touristPlane();
$z->move(1000);
$z->setHP(1400);
$z->setMaxKM(1500);
$z->addOil(2000);
$z->setMaxHeight("9000m.");
$z->setPilotName("Ivan Grozdanov");
$z->setPassengers(200);
$z->businessClass(50);
var_dump($z);
echo "<br>";
?>