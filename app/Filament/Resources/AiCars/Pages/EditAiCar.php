<?php

namespace App\Filament\Resources\AiCars\Pages;

use App\Filament\Resources\AiCars\AiCarResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAiCar extends EditRecord
{
    protected static string $resource = AiCarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
