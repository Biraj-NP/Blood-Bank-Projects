<?php

namespace App\Filament\Resources\HospitalInfos\Pages;

use App\Filament\Resources\HospitalInfos\HospitalInfoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHospitalInfo extends EditRecord
{
    protected static string $resource = HospitalInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
