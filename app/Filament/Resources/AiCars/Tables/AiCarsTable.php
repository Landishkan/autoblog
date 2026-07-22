<?php

namespace App\Filament\Resources\AiCars\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class AiCarsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Фото')
                    ->size(80),

                TextColumn::make('brand')
                    ->label('Марка')
                    ->searchable(),

                TextColumn::make('model')
                    ->label('Модель')
                    ->searchable(),

                TextColumn::make('year')
                    ->label('Год')
                    ->sortable(),

                TextColumn::make('price')
                    ->label('Цена')
                    ->money('RUB')
                    ->sortable(),

                TextColumn::make('body_type')
                    ->label('Кузов')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'sedan' => 'Седан',
                        'hatchback' => 'Хэтчбек',
                        'suv' => 'Внедорожник',
                        'wagon' => 'Универсал',
                        'coupe' => 'Купе',
                        'convertible' => 'Кабриолет',
                        'minivan' => 'Минивэн',
                        'pickup' => 'Пикап',
                        default => $state,
                    }),

                TextColumn::make('category')
                    ->label('Категория')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'family' => 'success',
                        'sport' => 'danger',
                        'economy' => 'info',
                        'premium' => 'warning',
                        'offroad' => 'primary',
                        'city' => 'gray',
                        'business' => 'purple',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'family' => 'Семейный',
                        'sport' => 'Спортивный',
                        'economy' => 'Экономичный',
                        'premium' => 'Премиум',
                        'offroad' => 'Внедорожник',
                        'city' => 'Городской',
                        'business' => 'Бизнес',
                        default => $state,
                    }),

                IconColumn::make('is_available')
                    ->label('Доступен')
                    ->boolean(),

                IconColumn::make('is_recommended')
                    ->label('Рекомендуем')
                    ->boolean()
                    ->trueColor('warning'),
            ])
            ->filters([
                SelectFilter::make('category')
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

                SelectFilter::make('body_type')
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
                    ]),

                TernaryFilter::make('is_available')
                    ->label('Доступность')
                    ->trueLabel('Только доступные')
                    ->falseLabel('Только недоступные'),

                TernaryFilter::make('is_recommended')
                    ->label('Рекомендации')
                    ->trueLabel('Только рекомендуемые')
                    ->falseLabel('Только не рекомендуемые'),
            ])
            ->recordActions([
                EditAction::make()->label('Редактировать'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->label('Удалить'),
                ]),
            ]);
    }
}