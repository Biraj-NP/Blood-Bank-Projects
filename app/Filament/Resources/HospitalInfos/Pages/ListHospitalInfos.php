<?php

namespace App\Filament\Resources\HospitalInfos\Pages;

use App\Filament\Resources\HospitalInfos\HospitalInfoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHospitalInfos extends ListRecords
{
    protected static string $resource = HospitalInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
