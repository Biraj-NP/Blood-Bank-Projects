<?php

namespace App\Filament\Resources\Statistics;

use App\Filament\Resources\Statistics\Pages\CreateStatistics;
use App\Filament\Resources\Statistics\Pages\EditStatistics;
use App\Filament\Resources\Statistics\Pages\ListStatistics;
use App\Filament\Resources\Statistics\Schemas\StatisticsForm;
use App\Filament\Resources\Statistics\Tables\StatisticsTable;
use App\Models\Statistics;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StatisticsResource extends Resource
{
    protected static ?string $model = Statistics::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ChartPie;

    protected static string|UnitEnum|null $navigationGroup = 'Frontend Information';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'active_campaigns';

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'active_campaigns',
            'donors_participated',
            'units_collected',
            'cities_covered',
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return StatisticsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StatisticsTable::configure($table);
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
            'index' => ListStatistics::route('/'),
            'create' => CreateStatistics::route('/create'),
            'edit' => EditStatistics::route('/{record}/edit'),
        ];
    }
}
