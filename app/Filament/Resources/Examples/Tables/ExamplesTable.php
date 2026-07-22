<?php

namespace App\Filament\Resources\Examples\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ExamplesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Картинка')
                    ->size(80),

                TextColumn::make('title')
                    ->label('Заголовок')
                    ->searchable()
                    ->limit(30),

                TextColumn::make('service_type')
                    ->label('Услуга')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'credit' => 'info',
                        'trade-in' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'credit' => 'Кредит',
                        'trade-in' => 'Trade-In',
                        default => $state,
                    }),

                TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->dateTime('d.m.Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('service_type')
                    ->label('Услуга')
                    ->options([
                        'credit' => 'Кредит',
                        'trade-in' => 'Trade-In',
                    ]),
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