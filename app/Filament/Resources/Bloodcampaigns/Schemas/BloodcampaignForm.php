<?php

namespace App\Filament\Resources\Bloodcampaigns\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class BloodcampaignForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                   // Campaign ID
                TextInput::make('id')
                    ->label('Campaign ID')
                    ->disabled()
                    ->dehydrated(false)
                    ->placeholder('Auto Generated')
                    ->columnSpanFull(),


                TextInput::make('title')
                    ->live()
                    ->debounce(2000)
                    ->afterStateUpdated(
                        fn(Set $set, ?string $state) =>
                        $set('slug', Str::slug($state ?? ''))
                    )
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('slug')
                    ->required(),

                TextInput::make('duration')
                    ->required(),

                FileUpload::make('image')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('bloodcampaigns')
                    ->columnSpanFull(),

                TextInput::make('duration_time')
                    ->required(),

                TextInput::make('day_time')
                    ->required(),

                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('phone_no')
                    ->tel()
                    ->required(),

                TextInput::make('venue')
                    ->required(),

                TextInput::make('location')
                    ->required(),
            ]);
    }
}
