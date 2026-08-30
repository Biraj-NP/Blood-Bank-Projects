<?php

namespace App\Filament\Resources\BBMScompanies\Pages;

use App\Filament\Resources\BBMScompanies\BBMScompanyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBBMScompany extends EditRecord
{
    protected static string $resource = BBMScompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
