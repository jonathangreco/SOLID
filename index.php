<?php
require_once './vendor/autoload.php';

ini_set('display_errors', true);

$solid = new \Solid\SolidManager();

$solid->srpBad();
$solid->srpGood();
