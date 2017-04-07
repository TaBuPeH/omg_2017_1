<?php

class Vehicle {

    private $distance = 0;
    
    public function move($aDistance) {
        $this->distance += $aDistance;
    }
}

class Car extends Vehicle {

    private $oilChange;
    private $oilChangeDistance;

    function __construct($aOilChangeDistance) {
        $this->oilChangeDistance = $aOilChangeDistance;
        $this->oilChange = 0;
    }

    public function resetDistance() {
        $this->distance = 0;
    }

    public function resetOilChange() {
        if ($this->oilChange >= $this->oilChangeDistance){
            $this->resetDistance();
        }
    }

    public function driven($aDistance) {
        parent::move($aDistance);
        $this->oilChange += $aDistance;
    }
}

class Truck extends Vehicle {

    private $oilChange = 0;
    private $oilChangeDistance;

    function __construct($aOilChangeDistance) {
        $this->oilChangeDistance = $aOilChangeDistance;
    }

    public function resetDistance() {
        $this->distance = 0;
    }

    public function resetOilChange() {
        if ($this->oilChange >= $this->oilChangeDistance){
            $this->resetDistance();
        }
    }

    public function driven($aDistance) {
        parent::move($aDistance);
        $this->oilChange += $aDistance;
    }
}

class Sedan extends Car {

    private $horsePower = 0;
    private $extras = 0;
    
    function __construct($aOilChangeDistance, $aHorsePower, $aExtras) {
        parent::__construct($aOilChangeDistance);
        $this->horsePower = $aHorsePower;
        $this->extras = $aExtras;
    }
    
    public function addExtras($aExtras) {
        $this->extras += $aExtras;
    }
}

class Cabrio extends Car {

    private $horsePower = 0;
    private $extras = 0;
    private $roofDown;

    function __construct($aOilChangeDistance, $aHorsePower, $aExtras) {
        parent::__construct($aOilChangeDistance);
        $this->horsePower = $aHorsePower;
        $this->extras = $aExtras;
        $this->roofDown = false;
    }

    public function addExtras($aExtras) {
        $this->extras += $aExtras;
    }

    public function roofToggle() {
        if ($this->roofDown == false) {
            $this->roofDown = true;
        } else {
            $this->roofDown = false;
        }
    }
}

class Cistern extends Truck {

    private $horsePower = 0;
    private $capacity = 0;
    
    function __construct($aOilChangeDistance, $aHorsePower, $aCapacity) {
        parent::__construct($aOilChangeDistance);
        $this->horsePower = $aHorsePower;
        $this->capacity = $aCapacity;
    }
}

class Hopper extends Truck {

    private $horsePower = 0;
    private $capacity = 0;
    private $offload;
    
    function __construct($aOilChangeDistance, $aHorsePower, $aCapacity) {
        parent::__construct($aOilChangeDistance);
        $this->horsePower = $aHorsePower;
        $this->capacity = $aCapacity;
        $this->offload = false;
    }

    public function offloadToggle() {
        if ($this->offload == false) {
            $this->offload = true;
        } else {
            $this->offload = false;
        }
    }
}

$ferrari458Spider = new Cabrio (15000, 597, 15);
$mercedesE63SAMG = new Sedan (15000, 603, 70);
$volvoFM400 = new Cistern (10000, 400, 43900);
$caterpillar797F = new Hopper (5000, 3793, 363000);

$ferrari458Spider->roofToggle();
$mercedesE63SAMG->driven(500);

echo "<pre>";

var_dump($ferrari458Spider);
var_dump($mercedesE63SAMG);
var_dump($volvoFM400);
var_dump($caterpillar797F);

?>