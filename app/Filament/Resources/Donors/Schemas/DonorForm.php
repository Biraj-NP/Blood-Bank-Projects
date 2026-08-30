<?php

namespace App\Filament\Resources\Donors\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class DonorForm
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
                //     ->label('Password')
                //     ->password()
                //     ->dehydrateStateUsing(
                //      fn ($state) => filled($state) ? Hash::make($state) : null     )
                //     ->dehydrated(fn ($state) => filled($state))
                //     ->required(fn (string $operation): bool => $operation === 'create'),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                DatePicker::make('dob')
                    ->required(),
                Select::make('gender')
                    ->options(['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'])
                    ->required(),
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
                    ->required(),
                TextInput::make('province')
                    ->required(),
                TextInput::make('district')
                    ->required(),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_verified')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
