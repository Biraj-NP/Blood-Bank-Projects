<?php

namespace App\Filament\Resources\SmallFeatursOfBloodBanks\Pages;

use App\Filament\Resources\SmallFeatursOfBloodBanks\SmallFeatursOfBloodBankResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSmallFeatursOfBloodBanks extends ListRecords
{
    protected static string $resource = SmallFeatursOfBloodBankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
