<?php

namespace App\Filament\Resources\AiCars\Pages;

use App\Filament\Resources\AiCars\AiCarResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAiCars extends ListRecords
{
    protected static string $resource = AiCarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
