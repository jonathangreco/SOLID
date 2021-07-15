<?php
require_once './vendor/autoload.php';

ini_set('display_errors', true);

$function = "ocp";

switch($function) {
    case "srp":
        $build = new \Solid\SingleResponsability\Document\Build();
        $build->bad();
        echo "<br>";
        $build->good();
        break;
    case "ocp":
        $build = new \Solid\OpenClosedPrinciple\Payment\Build();
        echo ($build->payBad('CB'));
        echo "<br>";
        echo ($build->payGood('CB'));
        break;
    case "lsp":
        break;
    case "isp":
        break;
    case "dip":
        break;
}
