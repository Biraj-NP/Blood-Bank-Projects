<?php

namespace App\Filament\Resources\AboutFeatures\Pages;

use App\Filament\Resources\AboutFeatures\AboutFeatureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAboutFeature extends EditRecord
{
    protected static string $resource = AboutFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
