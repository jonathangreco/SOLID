<?php

require_once './vendor/autoload.php';

$builder = new DI\ContainerBuilder();
$builder->addDefinitions('DesignPatterns/config.php');
$container = $builder->build();

ini_set('display_errors', true);

$function = "factory";

switch($function) {
    case "factory":
        $car = $container->get('Car');
        $car->vroum();
        break;
}
