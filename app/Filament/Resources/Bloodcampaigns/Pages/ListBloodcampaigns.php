<?php

namespace App\Filament\Resources\Bloodcampaigns\Pages;

use App\Filament\Resources\Bloodcampaigns\BloodcampaignResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBloodcampaigns extends ListRecords
{
    protected static string $resource = BloodcampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
