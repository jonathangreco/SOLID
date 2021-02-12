<?php

namespace Solid;

use Solid\SingleResponsability\Document\Build as BuildSrp;

/**
 * Class SolidManager (Applicative)
 * @package Solid
 */
class SolidManager
{
    public function srpBad()
    {
        $srp = new BuildSrp();
        $srp->bad();
    }

    public function srpGood()
    {
        $srp = new BuildSrp();
        $srp->good();
    }
}
