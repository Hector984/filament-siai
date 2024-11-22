<?php

namespace App\Filament\Resources\Catalogos;

use App\Filament\Resources\Catalogos\DependenciaResource\Pages;
use App\Filament\Resources\Catalogos\DependenciaResource\RelationManagers;
use App\Models\Catalogos\Dependencia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DependenciaResource extends Resource
{
    protected static ?string $model = Dependencia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Catalogos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ln_dependencia')
                    ->required()
                    ->maxLength(150)
                    ->label('Sector'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_dependencia')
                    ->label('Clave Sector'),
                Tables\Columns\TextColumn::make('ln_dependencia')
                    ->searchable()
                    ->label('Sector'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListDependencias::route('/'),
            // 'create' => Pages\CreateDependencia::route('/create'),
            // 'edit' => Pages\EditDependencia::route('/{record}/edit'),
        ];
    }
}
