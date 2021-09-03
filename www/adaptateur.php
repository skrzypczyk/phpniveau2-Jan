<?php




interface Notification
{
    public function send(string $message) :void;
}


class EmailNotification implements Notification
{
    private $email;
    private $title;

    public function __construct(string $email, string $title)
    {
        $this->email = $email;
        $this->title = $title;
    }

    public function send(string $message): void
    {
        //mail($this->email, $this->title, $message);
        echo "Sent email with objet '$this->title' to '{$this->email}' that says '$message'.<br>";
    }
}



class SMSApi
{
    private $host;
    private $number;
    private $login;
    private $apiKey;

    public function __construct(string $number, string $login, string $apiKey)
    {
        $this->number = $number;
        $this->login = $login;
        $this->apiKey = $apiKey;
    }

    public function logIn(): void
    {
        
        echo "Logged in to a SMS API with account '{$this->login}'.<br>";
    }

    public function sendMessage(string $message): void
    {
        
        echo "Send SMS to '$this->number' message: '$message'.<br>";
    }
}


class SMSNotification implements Notification
{
    private $sms;
    private $phone;

    public function __construct(SMSApi $sms)
    {
        $this->sms = $sms;
    }

    public function send(string $message): void
    {
        $this->sms->logIn();
        $this->sms->sendMessage($message);
    }
}




$notification = new EmailNotification("developers@example.com", "Objet de mon mail");
echo $notification->send("Voici mon super message");




$SMSApi = new SMSApi("+330102030405", "Yves",  "FSD432R2FDSFD");
$notification = new SMSNotification($SMSApi);
echo $notification->send("Voici mon super message");






