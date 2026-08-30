<?php

namespace App\Filament\Resources\Statistics\Pages;

use App\Filament\Resources\Statistics\StatisticsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStatistics extends EditRecord
{
    protected static string $resource = StatisticsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
