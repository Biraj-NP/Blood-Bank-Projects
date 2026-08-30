<?php

namespace App\Filament\Resources\BloodStocks;

use App\Filament\Resources\BloodStocks\Pages\CreateBloodStock;
use App\Filament\Resources\BloodStocks\Pages\EditBloodStock;
use App\Filament\Resources\BloodStocks\Pages\ListBloodStocks;
use App\Filament\Resources\BloodStocks\Schemas\BloodStockForm;
use App\Filament\Resources\BloodStocks\Tables\BloodStocksTable;
use App\Models\BloodStock;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BloodStockResource extends Resource
{
    protected static ?string $model = BloodStock::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Beaker;

    protected static string|UnitEnum|null $navigationGroup = 'Blood Bank';

protected static ?int $navigationSort = 6;

protected static ?string $recordTitleAttribute = 'blood_group';

    public static function form(Schema $schema): Schema
    {
        return BloodStockForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BloodStocksTable::configure($table);
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
            'index' => ListBloodStocks::route('/'),
            'create' => CreateBloodStock::route('/create'),
            'edit' => EditBloodStock::route('/{record}/edit'),
        ];
    }
}
