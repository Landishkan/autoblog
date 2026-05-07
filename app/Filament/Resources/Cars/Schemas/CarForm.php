<?php

namespace App\Filament\Resources\Cars\Schemas;

use Filament\Schemas\Schema;

class CarForm
{
  public static function configure(Schema $schema): Schema
{
    return $schema
        ->components([
            \Filament\Forms\Components\TextInput::make('brand')
                ->required()
                ->label('Марка'),
            \Filament\Forms\Components\TextInput::make('model')
                ->required()
                ->label('Модель'),
              
\Filament\Forms\Components\FileUpload::make('image')
    ->image() // Разрешаем только картинки
    ->directory('car-photos') // Папка, куда полетят файлы
    ->label('Фото машины'),
            \Filament\Forms\Components\TextInput::make('year')
                ->numeric()
                ->label('Год выпуска'),
            \Filament\Forms\Components\TextInput::make('price')
                ->numeric()
                ->prefix('$')
                ->label('Цена'),
            \Filament\Forms\Components\Textarea::make('description')
                ->columnSpanFull()
                ->label('Описание'),
            \Filament\Forms\Components\Toggle::make('is_published')
                ->label('Опубликовано')
                ->default(true),
        ]);
}
}
