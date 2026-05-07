<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('client_name')
                    ->label('Имя клиента')
                    ->required(),
                TextInput::make('car_model')
                    ->label('Проданный автомобиль'),
                TextInput::make('profit_amount')
                    ->numeric()
                    ->label('Выгода клиента (₽)')
                    ->prefix('+'),
                Textarea::make('text')
                    ->label('Текст отзыва')
                    ->columnSpanFull(),
                TextInput::make('video_url')
                    ->label('Ссылка на видео (YouTube)')
                    ->url(),
            ]);
    }
}