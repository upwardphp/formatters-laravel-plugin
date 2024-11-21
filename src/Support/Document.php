<?php

namespace Upward\Formatters\Laravel\Support;

use Upward\Formatters\Document as DocumentFormatter;
use Upward\Formatters\Documents\CpfDocument;

class Document
{
    public function cpf(string $value): DocumentFormatter
    {
        return new DocumentFormatter(document: new CpfDocument($value));
    }
}
