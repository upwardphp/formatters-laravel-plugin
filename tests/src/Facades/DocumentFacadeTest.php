<?php

use Upward\Formatters\Documents\CnpjDocument;
use Upward\Formatters\Documents\CpfDocument;
use Upward\Formatters\Laravel\Facades\Document;
use Upward\Formatters\Laravel\Tests\Facades\TestCase;

uses(TestCase::class);

it('should return Document instance', function () {
    expect(value: Document::cpf(value: '12345678901'))
        ->toBeInstanceOf(class: \Upward\Formatters\Document::class);
});

it('should be able choose CPF Document by the given value', function (string $value): void {
    $document = Document::choose($value);

    $reflector = new ReflectionClass($document);

    expect(value: $reflector->getProperty(name: 'document')->getValue($document))
        ->toBeInstanceOf(class: CpfDocument::class);
})->with([
    '12345678901',
    '66988536078',
    '12045683087',
]);

it('should be able choose CNPJ Document by the given value', function (string $value): void {
    $document = Document::choose($value);

    $reflector = new ReflectionClass($document);

    expect(value: $reflector->getProperty(name: 'document')->getValue($document))
        ->toBeInstanceOf(class: CnpjDocument::class);
})->with([
    '46730186000135b',
    'd00562650000152',
    '04593675000106',
]);
