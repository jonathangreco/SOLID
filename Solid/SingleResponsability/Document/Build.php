<?php

namespace Solid\SingleResponsability\Document;

use Solid\BuildableInterface;
use Solid\SingleResponsability\Document\Good\Document as GoodDocument;
use Solid\SingleResponsability\Document\Bad\Document as BadDocument;
use Solid\SingleResponsability\Document\Good\HtmlExportableDocument;
use Solid\SingleResponsability\Document\Good\PdfExportableDocument;

/**
 * Class Build (Applicative)
 * @package Solid\SingleResponsability
 */
class Build implements BuildableInterface
{
    public function bad($outputWanted = "html")
    {
        $bad = new BadDocument("Bad Document", "really bad content");

        // SmS case => turn this to a switch.
        if ($outputWanted == "html") {
            $bad->exportHtml();
        } else {
            $bad->exportPdf();
        }
    }

    public function good($outputWanted = "html")
    {
        $good = new GoodDocument("Good Document", "Good content");
        $exportPdf = new PdfExportableDocument();
        $exportHtml = new HtmlExportableDocument();

        // SmS case => turn this to a switch.
        if ($outputWanted == "html") {
            $exportHtml->export($good);
        } else {
            $exportPdf->export($good);
        }
    }
}
