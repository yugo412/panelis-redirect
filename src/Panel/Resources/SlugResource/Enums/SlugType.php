<?php

namespace Panelis\Redirect\Panel\Resources\SlugResource\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum SlugType: string implements HasLabel
{
    case Schedule = 'schedule';

    public function getLabel(): string|Htmlable|null
    {
        return __('event.schedule.label');
    }
}
