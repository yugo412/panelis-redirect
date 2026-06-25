<?php

namespace Panelis\Redirect\Panel\Resources;

use Filament\Actions;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Panelis\Event\Panel\Resources\ScheduleResource\Pages\ViewSchedule;
use Panelis\Redirect\Models\Slug;
use Panelis\Redirect\Panel\Resources\SlugResource\Enums\SlugPermission;
use Panelis\Redirect\Panel\Resources\SlugResource\Enums\SlugType;
use Panelis\Redirect\Panel\Resources\SlugResource\Pages;

class SlugResource extends Resource
{
    protected static ?string $model = Slug::class;

    private static array $httpCodes = [
        301 => 301,
        302 => 302,
        303 => 303,
        307 => 307,
        308 => 308,
    ];

    public static function getLabel(): ?string
    {
        return __('slug.label');
    }

    public static function getNavigationLabel(): string
    {
        return __('slug.navigation');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('ui.utility');
    }

    public static function canAccess(): bool
    {
        return user_can(SlugPermission::Browse);
    }

    public static function shouldRegisterNavigation(): bool
    {
        return self::canAccess();
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('slug.label'))
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('sluggable_type')
                            ->label(__('slug.type'))
                            ->disabled(),

                        TextInput::make('sluggable_id')
                            ->label(__('slug.id'))
                            ->disabled(),

                        TextInput::make('origin')
                            ->label(__('slug.origin'))
                            ->required(),

                        TextInput::make('destination')
                            ->label(__('slug.destination'))
                            ->required(),

                        Radio::make('status')
                            ->label(__('slug.http_status'))
                            ->required()
                            ->options(self::$httpCodes),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('sluggable_type')
                    ->label(__('slug.type'))
                    ->searchable(),

                TextColumn::make('sluggable_id')
                    ->label(__('slug.id'))
                    ->sortable()
                    ->url(function (Slug $record): string {
                        return ViewSchedule::getUrl(['record' => $record->sluggable_id]);
                    }),

                TextColumn::make('origin')
                    ->label(__('slug.origin'))
                    ->icon(Heroicon::Link)
                    ->searchable()
                    ->sortable()
                    ->openUrlInNewTab()
                    ->url(function (Slug $record): string {
                        return route('schedule.view', $record->origin);
                    }),

                TextColumn::make('destination')
                    ->label(__('slug.destination'))
                    ->icon(Heroicon::Link)
                    ->searchable()
                    ->sortable()
                    ->openUrlInNewTab()
                    ->url(function (Slug $record): string {
                        return route('schedule.view', $record->destination);
                    }),

                TextColumn::make('status')
                    ->label(__('slug.http_status'))
                    ->badge()
                    ->sortable()
                    ->toggleable()
                    ->searchable(),

                TextColumn::make('hit_count')
                    ->label(__('slug.hit_count'))
                    ->numeric()
                    ->alignEnd()
                    ->sortable()
                    ->toggleable(),

                TextColumn::makeSinceDate('created_at', __('ui.created_at')),

                TextColumn::makeSinceDate('updated_at', __('ui.updated_at')),
            ])
            ->filters([
                SelectFilter::make('sluggable_type')
                    ->label(__('slug.type'))
                    ->options(SlugType::class),

                SelectFilter::make('status')
                    ->label(__('slug.http_status'))
                    ->options(self::$httpCodes),
            ])
            ->recordActions([
                Actions\EditAction::make(),
            ])
            ->toolbarActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSlugs::route('/'),
            // 'create' => Pages\CreateSlug::route('/create'),
            'edit' => Pages\EditSlug::route('/{record}/edit'),
        ];
    }
}
