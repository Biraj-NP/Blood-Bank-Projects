<?php

namespace App\Filament\Resources\SmallFeatursOfBloodBanks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class SmallFeatursOfBloodBankForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

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
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('small_icon')
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('small_description')
                    ->required()
                    ->columnSpanFull(),

            ]);
    }
}
