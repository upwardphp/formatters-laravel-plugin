<?php

namespace Upward\Formatters\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Upward\Formatters\Document cpf(string $value)
 *
 * @see \Upward\Formatters\Laravel\Support\Document
 */
class Document extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'upward.formatters.document';
    }
}
