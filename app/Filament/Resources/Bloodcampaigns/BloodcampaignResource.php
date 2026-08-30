<?php

namespace App\Filament\Resources\Bloodcampaigns;

use App\Filament\Resources\Bloodcampaigns\Pages\CreateBloodcampaign;
use App\Filament\Resources\Bloodcampaigns\Pages\EditBloodcampaign;
use App\Filament\Resources\Bloodcampaigns\Pages\ListBloodcampaigns;
use App\Filament\Resources\Bloodcampaigns\Schemas\BloodcampaignForm;
use App\Filament\Resources\Bloodcampaigns\Tables\BloodcampaignsTable;
use App\Models\Bloodcampaign;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BloodcampaignResource extends Resource
{
    protected static ?string $model = Bloodcampaign::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Home;

     protected static string|UnitEnum|null $navigationGroup = 'Blood Bank';

    protected static ?int $navigationSort = 1;

    // protected static ?string $recordTitleAttribute = 'Bloodcampaign';
    protected static ?string $recordTitleAttribute = 'title';

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'title',
            'slug',
            'venue',
            'location',
            'description',
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return BloodcampaignForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BloodcampaignsTable::configure($table);
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
            'index' => ListBloodcampaigns::route('/'),
            'create' => CreateBloodcampaign::route('/create'),
            'edit' => EditBloodcampaign::route('/{record}/edit'),
        ];
    }
}
