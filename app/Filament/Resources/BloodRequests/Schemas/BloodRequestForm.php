<?php

namespace App\Filament\Resources\BloodRequests\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BloodRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                // TextInput::make('password')
                //     ->password()
                //     ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                DatePicker::make('dob')
                    ->required(),
                Select::make('gender')
                    ->options(['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'])
                    ->required(),
                Select::make('blood_group')
                    ->options([
                        'A+' => 'A+',
                        'A-' => 'A ',
                        'B+' => 'B+',
                        'B-' => 'B ',
                        'AB+' => 'A b+',
                        'AB-' => 'A b ',
                        'O+' => 'O+',
                        'O-' => 'O ',
                    ])
                    ->required(),
                TextInput::make('province')
                    ->required(),
                TextInput::make('district')
                    ->required(),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('cause')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_verified')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
