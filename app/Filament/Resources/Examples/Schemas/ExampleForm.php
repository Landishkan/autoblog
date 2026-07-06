<?php

namespace App\Filament\Resources\Examples\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ExampleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('service_type')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image(),
            ]);
    }
}
