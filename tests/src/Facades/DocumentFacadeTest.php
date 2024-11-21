<?php

use Upward\Formatters\Laravel\Facades\Document;
use Upward\Formatters\Laravel\Tests\Facades\TestCase;

uses(TestCase::class);

it('should return Document instance', function () {
    expect(value: Document::cpf(value: '12345678901'))
        ->toBeInstanceOf(class: \Upward\Formatters\Document::class);
});
