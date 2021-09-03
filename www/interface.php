<?php

abstract class vehicule {
	abstract public function calculItineraire();

	public  function go(){
		echo "Go go go";
	}
}


class moto extends vehicule {

	public $vitesse = 2;

	public function calculItineraire(){

	}

}

class velo extends vehicule {
	
	public $vitesse = 1;

	public function calculItineraire(){

	}

}

$moto = new moto();
$velo = new velo();
$velo->go();
