<?php
require_once('Race.php');
require_once('Car.php');
require_once('Motorcycle.php');
require_once('Ship.php');
require_once('VehicleCollection.php');
require_once('Road.php');

class App 
{
    public function run() 
    {
        $road = new Road(40);
        $ferrari = new Car('Ferrari',[2,5],$road);
        $lambo = new Car('Lambo',[1,6],$road);
        $bugatti = new Car('Bugatti',[2,7],$road);
        $fiat = new Car('Fiat',[1,3],$road);
        $mercedes = new Car('Mercedes',[2,5],$road);
        $titanic = new Ship('Titanic',[6,10],$road);
        $harley = new Motorcycle('Haley-Davidson',[2,4],$road);
        $collection = new VehicleCollection([$ferrari, $lambo, $bugatti, $fiat, $mercedes, $titanic, $harley]);
        $race = new Race($collection, $road);
        $tracks = $race->startRace();
        $this->printTracks($tracks);
        echo $race->displayLeaderboard();
    }

    public function printTracks($tracks): void
    {
        for ($i=0; $i<count($tracks); $i++) {
            foreach ($tracks[$i] as $each_car_track) {
                echo $each_car_track . "\n";
            }
            echo "\n";
        }
    }
}


$app = new App;
$app->run();
?>
