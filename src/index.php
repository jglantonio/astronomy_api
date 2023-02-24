<?php
CONST API_KEY_NASA = "pyLChVua0jsWvSvdKY5RzNE1y2sTiajtgqM7oFoN";
require 'vendor/autoload.php';

use Nasa\Asteroid;

$asteroid = new Asteroid('2023-02-17','2023-02-17');
$asteroid->getData();

$asteroids = $asteroid->getAll();
foreach($asteroids as $key => $asteroidDto){
    echo "NUMBER : $key  </br>";
    echo "MIN : ".$asteroidDto->getEstimatedDiameter('kilometers')->estimated_diameter_min."</br>";
    echo "MAX : ".$asteroidDto->getEstimatedDiameter('kilometers')->estimated_diameter_max."</br>";
}