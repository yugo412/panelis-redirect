<?php

namespace Panelis\Redirect\Panel\Resources\SlugResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Panelis\Redirect\Panel\Resources\SlugResource;

class EditSlug extends EditRecord
{
    protected static string $resource = SlugResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
