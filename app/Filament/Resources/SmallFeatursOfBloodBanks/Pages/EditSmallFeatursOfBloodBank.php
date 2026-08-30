<?php

namespace App\Filament\Resources\SmallFeatursOfBloodBanks\Pages;

use App\Filament\Resources\SmallFeatursOfBloodBanks\SmallFeatursOfBloodBankResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSmallFeatursOfBloodBank extends EditRecord
{
    protected static string $resource = SmallFeatursOfBloodBankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
