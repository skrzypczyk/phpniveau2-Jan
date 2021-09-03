<?php
class Singleton{

	private static $_instance = null;

	private function __construct() {  
   	}

	public static function getInstance() {

		if(is_null(self::$_instance)) {
			self::$_instance = new Singleton();  
		}

		return self::$_instance;
	}
}

echo "<pre>";
// Tentative d'instanciation de la classe
$singleton = Singleton::getInstance();
var_dump($singleton);

$singleton = Singleton::getInstance();
var_dump($singleton);
echo "</pre>";



