<?php

namespace App\Filament\Resources\AiCars\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Schemas\Schema;

class AiCarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Базовая информация
                TextInput::make('brand')
                    ->label('Марка')
                    ->required()
                    ->maxLength(255),

                TextInput::make('model')
                    ->label('Модель')
                    ->required()
                    ->maxLength(255),

                TextInput::make('year')
                    ->label('Год выпуска')
                    ->required()
                    ->numeric()
                    ->minValue(1990)
                    ->maxValue(2025),

                TextInput::make('price')
                    ->label('Цена (₽)')
                    ->required()
                    ->numeric()
                    ->prefix('₽'),

                Select::make('body_type')
                    ->label('Тип кузова')
                    ->options([
                        'sedan' => 'Седан',
                        'hatchback' => 'Хэтчбек',
                        'suv' => 'Внедорожник / Кроссовер',
                        'wagon' => 'Универсал',
                        'coupe' => 'Купе',
                        'convertible' => 'Кабриолет',
                        'minivan' => 'Минивэн',
                        'pickup' => 'Пикап',
                    ])
                    ->required(),

                // Технические характеристики
                Select::make('engine_type')
                    ->label('Тип двигателя')
                    ->options([
                        'petrol' => 'Бензин',
                        'diesel' => 'Дизель',
                        'hybrid' => 'Гибрид',
                        'electric' => 'Электро',
                    ]),

                TextInput::make('engine_volume')
                    ->label('Объём двигателя (л)')
                    ->placeholder('2.0')
                    ->numeric(),

                TextInput::make('horsepower')
                    ->label('Мощность (л.с.)')
                    ->numeric(),

                Select::make('transmission')
                    ->label('Коробка передач')
                    ->options([
                        'automatic' => 'Автомат',
                        'manual' => 'Механика',
                        'robot' => 'Робот',
                        'cvt' => 'Вариатор',
                    ]),

                Select::make('drive_type')
                    ->label('Привод')
                    ->options([
                        'fwd' => 'Передний',
                        'rwd' => 'Задний',
                        'awd' => 'Полный',
                    ]),

                TextInput::make('fuel_consumption')
                    ->label('Расход топлива (л/100км)')
                    ->numeric()
                    ->step(0.1),

                // Вместимость
                TextInput::make('seats')
                    ->label('Количество мест')
                    ->numeric()
                    ->default(5)
                    ->minValue(2)
                    ->maxValue(9),

                TextInput::make('trunk_volume')
                    ->label('Объём багажника (л)')
                    ->numeric(),

                // Категории и особенности
                Select::make('category')
                    ->label('Категория')
                    ->options([
                        'family' => 'Семейный',
                        'sport' => 'Спортивный',
                        'economy' => 'Экономичный',
                        'premium' => 'Премиум',
                        'offroad' => 'Внедорожник',
                        'city' => 'Городской',
                        'business' => 'Бизнес-класс',
                    ]),

                TagsInput::make('features')
                    ->label('Особенности (теги)')
                    ->placeholder('Добавьте особенность и нажмите Enter')
                    ->suggestions([
                        'безопасный',
                        'экономичный',
                        'динамичный',
                        'комфортный',
                        'просторный',
                        'надёжный',
                        'престижный',
                        'экологичный',
                    ])
                    ->separator(',')
                    ->columnSpanFull(),

                Textarea::make('ai_description')
                    ->label('Описание для ИИ')
                    ->helperText('Напишите подробное описание, которое поможет ИИ рекомендовать этот автомобиль. Укажите ключевые преимущества и для кого он подходит.')
                    ->rows(4)
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Фото автомобиля')
                    ->image()
                    ->directory('ai_cars')
                    ->disk('public')
                    ->maxSize(2048)
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9'),

                Toggle::make('is_available')
                    ->label('Доступен для продажи')
                    ->default(true),

                Toggle::make('is_recommended')
                    ->label('Рекомендовать в первую очередь')
                    ->default(false),
            ]);
    }
}