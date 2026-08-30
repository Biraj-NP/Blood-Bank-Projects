<?php

namespace App\Filament\Resources\BBMScompanies\Pages;

use App\Filament\Resources\BBMScompanies\BBMScompanyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBBMScompanies extends ListRecords
{
    protected static string $resource = BBMScompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
