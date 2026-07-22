<?php

namespace App\Filament\Resources\AiCars;

use App\Filament\Resources\AiCars\Pages\CreateAiCar;
use App\Filament\Resources\AiCars\Pages\EditAiCar;
use App\Filament\Resources\AiCars\Pages\ListAiCars;
use App\Filament\Resources\AiCars\Schemas\AiCarForm;
use App\Filament\Resources\AiCars\Tables\AiCarsTable;
use App\Models\AiCar;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AiCarResource extends Resource
{
    protected static ?string $model = AiCar::class;
        protected static ?string $modelLabel = 'Автомобиль';
    protected static ?string $pluralModelLabel = 'Автомобили для ИИ';

    public static function getNavigationLabel(): string
    {
        return 'Автомобили (ИИ)';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-truck';
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'model';

    public static function form(Schema $schema): Schema
    {
        return AiCarForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AiCarsTable::configure($table);
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
            'index' => ListAiCars::route('/'),
            'create' => CreateAiCar::route('/create'),
            'edit' => EditAiCar::route('/{record}/edit'),
        ];
    }
}
