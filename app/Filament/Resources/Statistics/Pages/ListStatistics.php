<?php

namespace App\Filament\Resources\Statistics\Pages;

use App\Filament\Resources\Statistics\StatisticsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStatistics extends ListRecords
{
    protected static string $resource = StatisticsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
