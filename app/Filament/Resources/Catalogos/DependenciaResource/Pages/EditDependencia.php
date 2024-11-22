<?php

namespace App\Filament\Resources\Catalogos\DependenciaResource\Pages;

use App\Filament\Resources\Catalogos\DependenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDependencia extends EditRecord
{
    protected static string $resource = DependenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }

}
