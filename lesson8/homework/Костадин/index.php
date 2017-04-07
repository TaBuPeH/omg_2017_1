<?php
class Vehicle{
    protected $milage = 0;
    protected $dateOfFirstReg;
    
    public function move($aMilage){
        $this->milage += $aMilage;
    }
    public function register($aReg){
        $this->dateOfFirstReg = $aReg;
    }
    
}

class Boat extends Vehicle{
    protected $docked = false;
    public function dock(){
        $this->docked = true;
    }
    public function undock(){
        $this->docked = false;
    }
}

class Yacht extends Boat{
    private $womenOnboard = 0;
    public function fillWithWomen($aWomen){
        $this->womenOnboard = $aWomen;
    }
    public function getWomen(){
        return $this->womenOnboard;
    }
}

class Ferry extends Boat{
    protected $carCapacity;
    protected $carsOnboard;
    public function __construct($aCapacity){
        $this->carCapacity = $aCapacity;
    }
    
    public function fill($aCarsFilled){
        if($aCarsFilled < $this->carCapacity) $this->carsOnboard = $aCarsFilled;
    }
    
    public function freeSpaces(){
        return $this->carCapacity - $this->carsOnboard;
    }
}

class Car extends Vehicle{
    protected $power;
    protected $make;
    protected $model;
    protected $engineSize;
    private $drivenWheels = "";
    
    public function __construct($aMake, $aModel, $aPower, $aWheels){
        $this->power = $aPower;
        $this->make = $aMake;
        $this->model = $aModel;
        $this->drivenWheels = $aWheels;
    }
}

class Sedan extends Car{
    private $allDoorsClosed = true;
    
    public function openDoors(){
        $this->allDoorsClosed = false;
    }
    
    public function closeDoors(){
        $this->allDoorsClosed = true;
    }
    
    public function getDoorsClosed(){
        return $this->allDoorsClosed;
    }
}

class Convertible extends Car{
    private $roof = true;
    
    public function roofDown(){
        $this->roof = false;
    }
    
    public function roofUp(){
        $this->roof = true;
    }
    
    public function roofPosition(){
        return $this->roof;
    }
}

class Touring extends Car{
    private $loaded = false;
    
    public function load(){
        $this->loaded = true;
    }
    
    public function unload(){
        $this->loaded = false;
    }
    
    public function isLoaded(){
        return $this->loaded;
    }
}

$e46 = new Sedan("BMW", "M3", 333, "RWD");
$e46->register(2002);
$e46->move(100);
$e46->openDoors();

$rs6avant = new Touring("Audi", "RS6 Avant", 605, "AWD");
$rs6avant->register(2016);
$rs6avant->move(200);
$rs6avant->load();

$ftype = new Convertible("Jaguar", "F-TYPE S", 380, "RWD");
$ftype->register(2017);
$ftype->move(300);
$ftype->roofDown();

$jubilee = new Yacht;
$jubilee->register(2017);
$jubilee->move(2000);
$jubilee->fillWithWomen(30);
$jubilee->dock();

$stamatTheFerry = new Ferry(200);
$stamatTheFerry->register(2001);
$stamatTheFerry->move(100000);
$stamatTheFerry->fill(148);
$stamatTheFerry->dock();


echo "<pre>";
var_dump($e46);
var_dump($rs6avant);
var_dump($ftype);
var_dump($jubilee);
var_dump($stamatTheFerry);
?>