<?php

namespace Panelis\Redirect\Panel\Resources\SlugResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Panelis\Redirect\Panel\Resources\SlugResource;

class ListSlugs extends ListRecords
{
    protected static string $resource = SlugResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
