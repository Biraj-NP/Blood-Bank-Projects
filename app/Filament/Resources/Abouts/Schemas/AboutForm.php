<?php

namespace App\Filament\Resources\Abouts\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class AboutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('sub_title')
                    ->live()
                    ->debounce(2000)
                    ->afterStateUpdated(
                        fn (Set $set, ?string $state) =>
                        $set('slug', Str::slug($state ?? ''))
                    )
                    ->required()
                    ->searchable()
                    ->columnSpanFull(),

                TextInput::make('slug')
                    ->required()
                    ->searchable()
                    ->columnSpanFull(),

                TextInput::make('hero_heading')
                    ->required()
                    ->searchable()
                    ->columnSpanFull(),

                Textarea::make('short_description')
                    ->required()
                    ->searchable()
                    ->columnSpanFull(),

            ]);
    }
}
