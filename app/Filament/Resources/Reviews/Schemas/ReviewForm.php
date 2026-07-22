<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('client_name')
                    ->label('Имя клиента')
                    ->required()
                    ->maxLength(255),

                TextInput::make('car_model')
                    ->label('Модель авто')
                    ->maxLength(255),

                FileUpload::make('client_photo')
                    ->label('Фото клиента')
                    ->image()
                    ->directory('reviews')
                    ->disk('public')
                    ->maxSize(2048) // Максимум 2 МБ
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->avatar(), // Отображать как круглую аватарку в форме

                Select::make('rating')
                    ->label('Оценка (звезды)')
                    ->options([
                        1 => '1 звезда',
                        2 => '2 звезды',
                        3 => '3 звезды',
                        4 => '4 звезды',
                        5 => '5 звезд',
                    ])
                    ->default(5)
                    ->required(),

                Textarea::make('text')
                    ->label('Текст отзыва')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),

                Toggle::make('is_published')
                    ->label('Опубликовано на сайте')
                    ->default(true),
            ]);
    }
}