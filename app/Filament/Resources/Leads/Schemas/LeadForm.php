<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Имя клиента')
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label('Телефон')
                    ->tel()
                    ->required()
                    ->maxLength(20),

                TextInput::make('car_number')
                    ->label('Госномер')
                    ->maxLength(20),

                Select::make('service_type')
                    ->label('Тип услуги')
                    ->options([
                        'credit' => 'Кредит',
                        'trade-in' => 'Trade-In',
                        'general' => 'Общая заявка',
                    ])
                    ->default('general')
                    ->required(),

                Select::make('entity_type')
                    ->label('Тип лица')
                    ->options([
                        'physical' => 'Физическое лицо',
                        'legal' => 'Юридическое лицо',
                    ])
                    ->default('physical')
                    ->required(),

                Select::make('status')
                    ->label('Статус')
                    ->options([
                        'new' => 'Новая',
                        'in_progress' => 'В работе',
                        'completed' => 'Завершена',
                        'cancelled' => 'Отменена',
                    ])
                    ->default('new')
                    ->required(),

                Textarea::make('notes')
                    ->label('Заметки менеджера')
                    ->columnSpanFull(),
            ]);
    }
}