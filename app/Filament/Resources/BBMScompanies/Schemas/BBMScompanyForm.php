<?php

namespace App\Filament\Resources\BBMScompanies\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BBMScompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('address')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('facebook')
                    ->default(null),
                TextInput::make('youtube')
                    ->default(null),
                TextInput::make('tiktok')
                    ->default(null),
                TextInput::make('linkedin')
                    ->default(null),
                TextInput::make('instagram')
                    ->default(null),
                TextInput::make('twitter')
                    ->default(null),
                FileUpload::make('image')
                    ->image()
                    ->required(),
            ]);
    }
}
