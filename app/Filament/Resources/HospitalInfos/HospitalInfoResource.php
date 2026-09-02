<?php

namespace App\Filament\Resources\HospitalInfos;

use App\Filament\Resources\HospitalInfos\Pages\CreateHospitalInfo;
use App\Filament\Resources\HospitalInfos\Pages\EditHospitalInfo;
use App\Filament\Resources\HospitalInfos\Pages\ListHospitalInfos;
use App\Filament\Resources\HospitalInfos\Schemas\HospitalInfoForm;
use App\Filament\Resources\HospitalInfos\Tables\HospitalInfosTable;
use App\Models\HospitalInfo;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HospitalInfoResource extends Resource
{
    protected static ?string $model = HospitalInfo::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BuildingOffice2;

    protected static string|UnitEnum|null $navigationGroup = 'Blood Bank';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'hospital_name';

     protected static ?string $navigationLabel = 'Hospital Information';

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'hospital_name',
            'email',
            'hospital_phone',
            'address',
            'description',
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return HospitalInfoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HospitalInfosTable::configure($table);
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
            'index' => ListHospitalInfos::route('/'),
            'create' => CreateHospitalInfo::route('/create'),
            'edit' => EditHospitalInfo::route('/{record}/edit'),
        ];
    }
}
