<?php
namespace Solid\SingleResponsability\Document\Good;

/**
 * Class Document (Métier)
 * @package Solid\SingleResponsability\Good
 */
class Document
{
    protected $title;
    protected $content;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content= $content;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
