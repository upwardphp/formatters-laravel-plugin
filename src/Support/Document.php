<?php

namespace Upward\Formatters\Laravel\Support;

use Upward\Formatters\Document as DocumentFormatter;
use Upward\Formatters\Documents\CnpjDocument;
use Upward\Formatters\Documents\CpfDocument;
use function Upward\Formatters\Helpers\Document\choose as document_choose;

class Document
{
    public function cpf(string $value): DocumentFormatter
    {
        return new DocumentFormatter(document: new CpfDocument($value));
    }

    public function cnpj(string $value): DocumentFormatter
    {
        return new DocumentFormatter(document: new CnpjDocument($value));
    }

    /**
     * Choose a Document based on the given value.
     */
    public function choose(string $value): DocumentFormatter | null
    {
        return document_choose($value);
    }
}
