<?php

namespace App\Filament\Resources\Catalogos\DependenciaResource\Pages;

use App\Filament\Resources\Catalogos\DependenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDependencia extends CreateRecord
{
    protected static string $resource = DependenciaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['estatus'] = 2;

        return $data;
    }
}
