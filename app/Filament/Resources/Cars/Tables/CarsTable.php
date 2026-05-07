<?php

namespace App\Filament\Resources\Cars\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class CarsTable
{
    public static function configure(Table $table): Table
    {
        return $table
          ->columns([

\Filament\Tables\Columns\ImageColumn::make('image')
    ->label('Фото'),
        \Filament\Tables\Columns\TextColumn::make('brand')->searchable()->label('Марка'),
        \Filament\Tables\Columns\TextColumn::make('model')->searchable()->label('Модель'),
        \Filament\Tables\Columns\TextColumn::make('year')->sortable()->label('Год'),
        \Filament\Tables\Columns\TextColumn::make('price')->money('usd')->sortable()->label('Цена'),
        \Filament\Tables\Columns\IconColumn::make('is_published')
            ->boolean()
            ->label('Статус'),
    ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
