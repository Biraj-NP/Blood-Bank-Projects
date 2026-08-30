<?php

namespace App\Filament\Resources\SmallFeatursOfBloodBanks;

use App\Filament\Resources\SmallFeatursOfBloodBanks\Pages\CreateSmallFeatursOfBloodBank;
use App\Filament\Resources\SmallFeatursOfBloodBanks\Pages\EditSmallFeatursOfBloodBank;
use App\Filament\Resources\SmallFeatursOfBloodBanks\Pages\ListSmallFeatursOfBloodBanks;
use App\Filament\Resources\SmallFeatursOfBloodBanks\Schemas\SmallFeatursOfBloodBankForm;
use App\Filament\Resources\SmallFeatursOfBloodBanks\Tables\SmallFeatursOfBloodBanksTable;
use App\Models\SmallFeatursOfBloodBank;
use UnitEnum;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SmallFeatursOfBloodBankResource extends Resource
{
    protected static ?string $model = SmallFeatursOfBloodBank::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BookOpen;

    protected static string|UnitEnum|null $navigationGroup = 'Frontend Information';

    protected static ?int $navigationSort = 4;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'title',
            'slug',
            'small_description',
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return SmallFeatursOfBloodBankForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SmallFeatursOfBloodBanksTable::configure($table);
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
            'index' => ListSmallFeatursOfBloodBanks::route('/'),
            'create' => CreateSmallFeatursOfBloodBank::route('/create'),
            'edit' => EditSmallFeatursOfBloodBank::route('/{record}/edit'),
        ];
    }
}
