<?php

namespace App\Filament\Resources\CalculatorSettings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CalculatorSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('type')
                    ->required(),
                TextInput::make('min_amount')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('max_amount')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('min_term')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('max_term')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('rate')
                    ->required()
                    ->numeric()
                    ->default(0),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
