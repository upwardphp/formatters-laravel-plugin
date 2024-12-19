<?php

namespace Upward\Formatters\Laravel\Support;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Upward\Formatters\Document as DocumentFormatter;
use Upward\Formatters\Documents\CnpjDocument;
use Upward\Formatters\Documents\CpfDocument;
use Upward\Formatters\Exceptions\Documents\InvalidDocumentException;
use function Upward\Formatters\Helpers\Sanitization\only_digits;

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
        try {
            $value = Str::of(string: only_digits($value))
                ->when(
                    value: static fn (Stringable $string): bool => $string->length() < 11,
                    callback: static fn (Stringable $string): Stringable => $string->padLeft(length: 11, pad: '0'),
                )
                ->when(
                    value: static fn (Stringable $string): bool => $string->length() > 11,
                    callback: static fn (Stringable $string): Stringable => $string->padLeft(length: 14, pad: '0'),
                )
                ->value();

            return new DocumentFormatter(
                document: match (Str::length($value)) {
                    11 => new CpfDocument($value),
                    14 => new CnpjDocument($value),
                    default => throw InvalidDocumentException::make($value),
                },
            );
        } catch (Exception) {
            return null;
        }
    }
}
