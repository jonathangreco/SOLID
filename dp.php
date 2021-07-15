<?php

use DesignPatterns\Factory\Main;

require_once './vendor/autoload.php';

$builder = new DI\ContainerBuilder();
$builder->addDefinitions('DesignPatterns/config.php');
$container = $builder->build();

ini_set('display_errors', true);

$function = "factory";

switch($function) {
    case "factory":
        $container->get(Main::class);
        break;
}
