<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('client_name')
                    ->required(),
                TextInput::make('car_model')
                    ->required(),
                Textarea::make('text')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('profit_amount')
                    ->numeric(),
                TextInput::make('video_url')
                    ->url(),
                TextInput::make('client_photo'),
                TextInput::make('rating')
                    ->required()
                    ->numeric()
                    ->default(5),
                Toggle::make('is_published')
                    ->required(),
            ]);
    }
}
