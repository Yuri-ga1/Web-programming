<?php
abstract class Game{
    abstract function getPrice();
    abstract function getName();
    abstract function getEngineName();
}

interface Tax{
    public function getTaxPercent($percentValue);
}

trait GameInformer{
    public function Informer(){
        echo "It's your game!";
    }
}

class YourGame extends Game implements Tax
{
    use GameInformer;
    private $sales;
    private $price;
    public function __construct($sales = 0, $price = 0){
        $this->sales = $sales;
        $this->price = $price;
    }

    public function getPrice(){
        return $this->sales * $this->price;
    }

    public function getTaxPercent($percentValue = 5){
        return $this->getPrice() * ($percentValue / 100.0);
    }

    public function getEngineName(){
        return "Unity";
    }

    public function getName(){
        return "Dino Dash";
    }

    public function getURL(){
        return "https://play.google.com/store/apps/details?id=com.AirusGames.DinoDash";
    }
}

$testCans = new YourGame(10, 1);
$percents = 30;
echo $testCans->Informer();
echo "<br>" . "<br>";
echo "Name: " . $testCans->getName() . "<br>";
echo "Engine: " . $testCans->getEngineName() . "<br>";
echo "You earned: " . $testCans->getPrice() . "<br>";
echo "Game URL: " . $testCans->getURL() . "<br>";
echo "Tax Interest Rate: " . $percents . "%" . "<br>";
?>
