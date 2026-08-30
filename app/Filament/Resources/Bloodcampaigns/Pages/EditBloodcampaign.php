<?php

namespace App\Filament\Resources\Bloodcampaigns\Pages;

use App\Filament\Resources\Bloodcampaigns\BloodcampaignResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBloodcampaign extends EditRecord
{
    protected static string $resource = BloodcampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
