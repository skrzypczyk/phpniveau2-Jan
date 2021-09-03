<?php

interface Component
{
    public function send(): void;
}


class Email implements Component
{

    public function send(): void
    {
        echo "Envoyer un email<br>";
    }
}


class Decorator implements Component
{

    protected $component;

    public function __construct(Component $component)
    {
        //$component = objet email
        $this->component = $component;
    }


    public function send():void
    {
        //$component = objet email
        //appel de la methode send sur l'objet email
        $this->component->send();
    }
}




class Slack extends Decorator
{

    public function send(): void
    {
        echo "Il va envoyer un message slack<br>";
        parent::send();
    }
}


class SMS extends Decorator
{
    public function send(): void
    {
        echo "Il va envoyer un SMS<br>";
        parent::send();
    }
}


$email = new Email(); //création d'object classique

$slack = new Slack($email);
$sms = new SMS($slack); //Appel du constructeur parent
$sms->send();





