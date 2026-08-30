<?php

namespace App\Filament\Resources\BloodStocks\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BloodStockForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('blood_group')
                    ->label('Blood Group')
                    ->options([
                        'A+' => 'A+',
                        'A-' => 'A-',
                        'B+' => 'B+',
                        'B-' => 'B-',
                        'AB+' => 'AB+',
                        'AB-' => 'AB-',
                        'O+' => 'O+',
                        'O-' => 'O-',
                    ])
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('units')
                    ->label('Available Units')
                    ->numeric()
                    ->minValue(0)
                    ->required()
                    ->default(0),
            ]);
    }
}
