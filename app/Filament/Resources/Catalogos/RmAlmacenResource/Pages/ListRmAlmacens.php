<?php

namespace App\Filament\Resources\Catalogos\RmAlmacenResource\Pages;

use App\Filament\Resources\Catalogos\RmAlmacenResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRmAlmacens extends ListRecords
{
    protected static string $resource = RmAlmacenResource::class;

    protected static ?string $title = 'Almacenes';

    

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
