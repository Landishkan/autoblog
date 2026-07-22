<?php

namespace App\Filament\Resources\Leads;

use App\Filament\Resources\Leads\Pages\CreateLead;
use App\Filament\Resources\Leads\Pages\EditLead;
use App\Filament\Resources\Leads\Pages\ListLeads;
use App\Filament\Resources\Leads\Schemas\LeadForm;
use App\Filament\Resources\Leads\Tables\LeadsTable;
use App\Models\Lead;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;
 // Перевод названия модели (для заголовков страниц "Создать заявку", "Редактировать заявку")
    protected static ?string $modelLabel = 'Заявка';
    protected static ?string $pluralModelLabel = 'Заявки';

    // Перевод названия вкладки в боковом меню
    public static function getNavigationLabel(): string
    {
        return 'Заявки';
    }

    // (Бонус) Можно поменять иконку вкладки
    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-inbox-stack'; // Иконка входящих
    }
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return LeadForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LeadsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLeads::route('/'),
            'create' => CreateLead::route('/create'),
            'edit' => EditLead::route('/{record}/edit'),
        ];
    }
}
