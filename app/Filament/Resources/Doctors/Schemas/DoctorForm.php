<?php

namespace App\Filament\Resources\Doctors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DoctorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('designation')
                    ->required(),
                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('experience')
                    ->required(),
                TextInput::make('available_time')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->required()->columnSpanFull(),
            ]);
    }
}
