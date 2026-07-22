<?php

namespace App\Filament\Resources\Reviews\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ReviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('client_photo')
                    ->label('Фото')
                    ->circular()
                    ->size(40),

                TextColumn::make('client_name')
                    ->label('Имя')
                    ->searchable(),

                TextColumn::make('car_model')
                    ->label('Авто')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('rating')
                    ->label('Оценка')
                    ->formatStateUsing(fn ($state) => str_repeat('⭐️', $state)),

                TextColumn::make('text')
                    ->label('Текст')
                    ->limit(50)
                    ->tooltip(fn ($state) => $state),

                IconColumn::make('is_published')
                    ->label('Опубликовано')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                TextColumn::make('created_at')
                    ->label('Дата')
                    ->dateTime('d.m.Y')
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_published')
                    ->label('Статус публикации')
                    ->trueLabel('Только опубликованные')
                    ->falseLabel('Только скрытые')
                    ->native(false),
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