<?php

declare(strict_types=1);

namespace Panelis\Redirect\Providers;

use Illuminate\Support\ServiceProvider;

class RedirectServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }
}
