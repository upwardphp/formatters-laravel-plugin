<?php

namespace Upward\Formatters\Laravel\Tests;

use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Upward\Formatters\Laravel\FormattersServiceProvider;

abstract class TestCase extends BaseTestCase
{
    use WithWorkbench;

    protected function getPackageProviders($app): array
    {
        return [
            FormattersServiceProvider::class,
        ];
    }
}
