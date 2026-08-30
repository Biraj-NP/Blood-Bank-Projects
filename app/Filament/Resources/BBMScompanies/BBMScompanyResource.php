<?php

namespace App\Filament\Resources\BBMScompanies;

use App\Filament\Resources\BBMScompanies\Pages\CreateBBMScompany;
use App\Filament\Resources\BBMScompanies\Pages\EditBBMScompany;
use App\Filament\Resources\BBMScompanies\Pages\ListBBMScompanies;
use App\Filament\Resources\BBMScompanies\Schemas\BBMScompanyForm;
use App\Filament\Resources\BBMScompanies\Tables\BBMScompaniesTable;
use App\Models\BBMScompany;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BBMScompanyResource extends Resource
{
    protected static ?string $model = BBMScompany::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Cog8Tooth;

    protected static string|UnitEnum|null $navigationGroup = 'Company Information';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'name',
            'address',
            'phone',
            'email',
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return BBMScompanyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BBMScompaniesTable::configure($table);
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
            'index' => ListBBMScompanies::route('/'),
            'create' => CreateBBMScompany::route('/create'),
            'edit' => EditBBMScompany::route('/{record}/edit'),
        ];
    }
}
