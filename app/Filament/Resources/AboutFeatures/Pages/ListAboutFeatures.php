<?php

namespace App\Filament\Resources\AboutFeatures\Pages;

use App\Filament\Resources\AboutFeatures\AboutFeatureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAboutFeatures extends ListRecords
{
    protected static string $resource = AboutFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
