<?php
require 'vendor/autoload.php';

use Nasa\Asteroid;

$asteroid = new Asteroid('2023-02-17','2023-02-17');
$asteroid->getData();

$asteroid = $asteroid->getAll();
var_dump(count($asteroid));