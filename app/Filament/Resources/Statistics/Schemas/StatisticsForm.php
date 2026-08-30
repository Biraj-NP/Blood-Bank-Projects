<?php

namespace App\Filament\Resources\Statistics\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StatisticsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('active_campaigns')
                    ->required()
                    ->default('0'),
                TextInput::make('donors_participated')
                    ->required()
                    ->default('0'),
                TextInput::make('units_collected')
                    ->required()
                    ->default('0'),
                TextInput::make('cities_covered')
                    ->required()
                    ->default('0'),
            ]);
    }
}
