<?php

namespace Solid\SingleResponsability\Document\Good;

interface ExportableDocumentInterface
{
    public function export(Document $document);
}
