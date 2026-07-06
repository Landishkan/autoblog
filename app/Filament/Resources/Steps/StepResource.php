<?php

namespace App\Filament\Resources\Steps;

use App\Filament\Resources\Steps\Pages\CreateStep;
use App\Filament\Resources\Steps\Pages\EditStep;
use App\Filament\Resources\Steps\Pages\ListSteps;
use App\Filament\Resources\Steps\Schemas\StepForm;
use App\Filament\Resources\Steps\Tables\StepsTable;
use App\Models\Step;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StepResource extends Resource
{
    protected static ?string $model = Step::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return StepForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StepsTable::configure($table);
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
            'index' => ListSteps::route('/'),
            'create' => CreateStep::route('/create'),
            'edit' => EditStep::route('/{record}/edit'),
        ];
    }
}
