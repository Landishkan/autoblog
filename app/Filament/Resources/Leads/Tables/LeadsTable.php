<?php

namespace App\Filament\Resources\Leads\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Имя')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Телефон')
                    ->searchable()
                    ->copyable(), // Позволяет скопировать номер в 1 клик

                TextColumn::make('car_number')
                    ->label('Госномер'),

                TextColumn::make('service_type')
                    ->label('Услуга')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'credit' => 'Кредит',
                        'trade-in' => 'Trade-In',
                        'general' => 'Общая',
                        default => $state,
                    }),

                TextColumn::make('entity_type')
                    ->label('Лицо')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'physical' => 'Физ. лицо',
                        'legal' => 'Юр. лицо',
                        default => $state,
                    }),

                TextColumn::make('status')
                    ->label('Статус')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'success',      // Зеленый
                        'in_progress' => 'warning', // Желтый
                        'completed' => 'info',   // Синий
                        'cancelled' => 'danger', // Красный
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Статус')
                    ->options([
                        'new' => 'Новая',
                        'in_progress' => 'В работе',
                        'completed' => 'Завершена',
                        'cancelled' => 'Отменена',
                    ]),

                SelectFilter::make('service_type')
                    ->label('Услуга')
                    ->options([
                        'credit' => 'Кредит',
                        'trade-in' => 'Trade-In',
                        'general' => 'Общая',
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