<?php

class Facade
{
    protected $api1;
    protected $api2;


    public function __construct(API1 $api1 = null, API2 $api2 = null) {
        $this->api1 = $api1 ?: new API1();
        $this->api2 = $api2 ?: new API2();
    }

    public function loginAllAPI(): void
    {
        $this->api1->login();
        $this->api2->createKey();
        $this->api2->login();
    }

     public function uploadAllAPI(File $file): void
    {
        $this->api1->upload();
        $this->api2->upload();
    }
}


class AWS
{
    public function login(): void
    {
        echo "Connexion à l'API 1!<br>";
    }

    public function upload(File $file) {
        echo "upload sur le cloud"
    }
}

class Google
{
    public function login(): void
    {
        echo "Connexion à l'API 3!<br>";
    }

    public function upload(File $file) {
        echo "upload sur le cloud Google"
    }

}


class Azure
{
    private $key=null;

    public function createKey(): void
    {
        $this->key = "GFDrze1234FES4675";
        echo "Demande d'une clé auprès de l'API2 (retour :'$this->key')<br>";
    }

    public function login(): void
    {
        echo "Connexion à l'API 2!<br>";
    }

    public function upload(File $file) {
        echo "upload sur le cloud"
    }
}



$api1 = new AWS();
$api2 = new Google();

$facade = new Facade($api1, $api2);
$facade->loginAllAPI();
$facade->uploadAllAPI();







