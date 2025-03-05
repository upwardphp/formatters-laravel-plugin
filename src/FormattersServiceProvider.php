<?php

namespace Upward\Formatters\Laravel;

use Illuminate\Support\ServiceProvider;
use Upward\Formatters\Laravel\Support\Document;

final class FormattersServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('upward.formatters.document', fn (): Document => new Document());
    }
}
