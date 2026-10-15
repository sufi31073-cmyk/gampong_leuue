<?php

namespace App\Filament\Resources\VillageOfficialResource\Pages;

use App\Filament\Resources\VillageOfficialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVillageOfficial extends EditRecord
{
    protected static string $resource = VillageOfficialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
