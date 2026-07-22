<?php

namespace App\Filament\Resources\Examples\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class ExampleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('service_type')
                    ->label('Тип услуги')
                    ->options([
                        'credit' => 'Кредит',
                        'trade-in' => 'Trade-In',
                    ])
                    ->required(),

                TextInput::make('title')
                    ->label('Заголовок')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Описание')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),

                FileUpload::make('image')
    ->label('Картинка примера')
    ->image()
    ->directory('examples')
    ->disk('public')
    ->maxSize(2048)
    ->imageResizeMode('cover')
    ->imageResizeTargetWidth('1200')  // Целевая ширина
    ->imageResizeTargetHeight('675'), // Целевая высота (примерно 16:9)
            ]);
    }
}