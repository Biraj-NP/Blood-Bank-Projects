<?php

namespace App\Filament\Resources\AboutFeatures\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class AboutFeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema

            ->components([
                TextInput::make('icon')
                    ->required(),

                TextInput::make('title')
                    ->live()
                    ->debounce(2000)
                    ->afterStateUpdated(
                        fn (Set $set, ?string $state) =>
                        $set('slug', Str::slug($state ?? ''))
                    )
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('slug')
                    ->required(),

                RichEditor::make('description')
                    ->default(null)
                    ->columnSpanFull(),

            ]);
    }
}
