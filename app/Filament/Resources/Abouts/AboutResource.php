<?php

namespace App\Filament\Resources\Abouts;

use App\Filament\Resources\Abouts\Pages\CreateAbout;
use App\Filament\Resources\Abouts\Pages\EditAbout;
use App\Filament\Resources\Abouts\Pages\ListAbouts;
use App\Filament\Resources\Abouts\Schemas\AboutForm;
use App\Filament\Resources\Abouts\Tables\AboutsTable;
use App\Models\About;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBookOpen;

protected static string|UnitEnum|null $navigationGroup = 'Frontend Information';

protected static ?int $navigationSort = 2;

protected static ?string $recordTitleAttribute = 'hero_heading';

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'sub_title',
            'hero_heading',
            'short_description',
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return AboutForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutsTable::configure($table);
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
            'index' => ListAbouts::route('/'),
            'create' => CreateAbout::route('/create'),
            'edit' => EditAbout::route('/{record}/edit'),
        ];
    }
}
