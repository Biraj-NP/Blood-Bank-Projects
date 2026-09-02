<?php

namespace App\Filament\Resources\AboutFeatures;

use App\Filament\Resources\AboutFeatures\Pages\CreateAboutFeature;
use App\Filament\Resources\AboutFeatures\Pages\EditAboutFeature;
use App\Filament\Resources\AboutFeatures\Pages\ListAboutFeatures;
use App\Filament\Resources\AboutFeatures\Schemas\AboutFeatureForm;
use App\Filament\Resources\AboutFeatures\Tables\AboutFeaturesTable;
use App\Models\AboutFeature;
use UnitEnum;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AboutFeatureResource extends Resource
{
    protected static ?string $model = AboutFeature::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Sparkles;

    protected static string|UnitEnum|null $navigationGroup = 'Frontend Information';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'title',
            'slug',
            'description',
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return AboutFeatureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutFeaturesTable::configure($table);
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
            'index' => ListAboutFeatures::route('/'),
            'create' => CreateAboutFeature::route('/create'),
            'edit' => EditAboutFeature::route('/{record}/edit'),
        ];
    }
}
