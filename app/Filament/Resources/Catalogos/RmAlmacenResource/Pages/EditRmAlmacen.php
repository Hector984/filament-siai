<?php

namespace App\Filament\Resources\Catalogos\RmAlmacenResource\Pages;

use App\Filament\Resources\Catalogos\RmAlmacenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRmAlmacen extends EditRecord
{
    protected static string $resource = RmAlmacenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
