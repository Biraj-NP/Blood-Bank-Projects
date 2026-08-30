<?php

namespace App\Filament\Resources\HospitalInfos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class HospitalInfoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->image()
                    ->required()->columnSpanFull(),
                TextInput::make('hospital_name')
                    ->required()->columnSpanFull(),
                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('hospital_phone')
                    ->tel()
                    ->required()->columnSpanFull(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()->columnSpanFull(),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('messenger')
                    ->required()->columnSpanFull(),
            ]);
    }
}
