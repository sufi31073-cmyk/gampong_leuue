<?php

namespace App\Filament\Resources\TransparencyResource\Pages;

use App\Filament\Resources\TransparencyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransparency extends EditRecord
{
    protected static string $resource = TransparencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
