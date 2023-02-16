<?php
require 'vendor/autoload.php';

CONST ROOT = __DIR__;


require_once 'class/Nasa/Object.php';
$object = new \Nasa\ObjectNasa('2023-02-16','2023-02-16');

var_dump($object->getData());