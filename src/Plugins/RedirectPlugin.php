<?php

declare(strict_types=1);

namespace Panelis\Redirect\Plugins;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Panelis\Redirect\Panel\Resources\SlugResource;

class RedirectPlugin implements Plugin
{
    public function getId(): string
    {
        return 'redirect';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            SlugResource::class,
        ]);
    }

    public function boot(Panel $panel): void {}
}
