<?php

namespace App\Filament\Resources\Catalogos\DependenciaResource\Pages;

use App\Filament\Resources\Catalogos\DependenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDependencias extends ListRecords
{
    protected static string $resource = DependenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
