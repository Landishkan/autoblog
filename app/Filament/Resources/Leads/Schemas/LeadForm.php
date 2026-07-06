<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('car_number'),
                TextInput::make('service_type')
                    ->required()
                    ->default('general'),
                TextInput::make('status')
                    ->required()
                    ->default('new'),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
