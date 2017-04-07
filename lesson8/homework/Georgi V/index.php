<?php
class Vehicle {

    protected $km = 0;

    public function move($distance = 0) {
        $this -> km += $distance;
    }

    public function resetKm() {
        $this -> km = 0;
    }

}

class Truck extends Vehicle {

    protected $konskiSili = 0;
    protected $natovareni = 0;

    public function mo6tnost($power = 0) {
        $this -> konskiSili += $power;
    }

}

class Cistern extends Truck {

    public function voda($kolist4estvo = 0) {
        $this -> natovareni += $koli4estvo;
    }

}

class Lainovoz extends Truck {

   public function laina($koli4estvo = 0) {
        $this -> natovareni += $koli4estvo;
    }
    
}

class Plane extends Vehicle {

    protected $kerosin = 0;

    public function gorivo($aGorivo){
        $this -> kerosin += $aGorivo;
    }
}

class Cargo extends Plane {
    
    private $matrial;

    public function matrial($materail = 0) {
        $this -> matrial += $material;
    }

}

class Passanger extends Plane {
    
    private $patnici;

    public function hora($aHora = 0) {
        $this -> patnici += $aHora;

}
}

$h = new Lainovoz();
//изведнъж спря да работи и даде:  
// Parse error: syntax error, unexpected '$h' (T_VARIABLE), expecting function 
// (T_FUNCTION) in C:\Users\Erediael\Desktop\Georgi V\index.php on line 71

//Оправих ти го 7.04.2017 08:55
$h -> mo6tnost(300);
$h -> laina(5000);
$h -> resetkm(0);
$h -> move(100);
var_dump($h);
exit;
?>