<?php

namespace App\Filament\Resources\Catalogos;

use App\Filament\Resources\Catalogos\RmAlmacenResource\Pages;
use App\Filament\Resources\Catalogos\RmAlmacenResource\RelationManagers;
use App\Models\Catalogos\RmAlmacen;
use App\Models\Catalogos\SsUnidadEjecut;
use App\Models\Catalogos\SsUnidadRespons;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class RmAlmacenResource extends Resource
{
    protected static ?string $model = RmAlmacen::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Catalogos';

    protected static ?string $navigationLabel = 'Almacenes';

    protected static ?string $slug = 'catalogos/almacenes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('Ur')
                    ->label('Unidad Responsable')
                    ->relationship(name: 'ur', titleAttribute: 'Descripcion', ignoreRecord: true)
                    ->getOptionLabelFromRecordUsing(fn (SsUnidadRespons $record) => "{$record->Clave} - {$record->Descripcion}")
                    ->searchable(['Clave', 'Descripcion'])
                    ->required(),
                Forms\Components\Select::make('Ue')
                    ->label('Unidad Ejecutora')
                    ->relationship('ue', 'Descripcion')
                    // ->getSearchResultsUsing(fn (string $search): array => SsUnidadEjecut::where('Ur', )->limit(50)->pluck('name', 'id')->toArray())
                    ->getOptionLabelFromRecordUsing(fn (SsUnidadEjecut $record) => "{$record->Clave} - {$record->Descripcion}")
                    ->searchable(['Clave', 'Descripcion'])
                    ->required(),
                Forms\Components\TextInput::make('Cuenta')
                    ->required()
                    ->maxLength(8),
                Forms\Components\TextInput::make('Descripcion')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('Almacenista')
                    ->maxLength(50),
                Forms\Components\TextInput::make('Puesto_Alm')
                    ->maxLength(50),
                Forms\Components\TextInput::make('Direccion')
                    ->maxLength(200),
                Forms\Components\TextInput::make('Telefono')
                    ->maxLength(25),
                Forms\Components\TextInput::make('Email')
                    ->maxLength(80),
                Forms\Components\TextInput::make('Responsable_C')
                    ->maxLength(50),
                Forms\Components\TextInput::make('Puesto_Resp_C')
                    ->maxLength(50),
                Forms\Components\TextInput::make('Responsable_I')
                    ->maxLength(50),
                Forms\Components\TextInput::make('Puesto_Resp_I')
                    ->maxLength(50),
                Forms\Components\TextInput::make('Dependencia')
                    ->numeric(),
                Forms\Components\TextInput::make('Accesoif')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Almacen')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Cuenta'),
                Tables\Columns\TextColumn::make('Descripcion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Almacenista')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Puesto_Alm')
                    ->label('Puesto Almacen')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Accesoif')
                    ->label('Acceso')
                    ->getStateUsing(function (RmAlmacen $record): string {
                        return $record->Accesoif == 1 ? 'Sí' : 'No';
                    })
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
                    ExportBulkAction::make()
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
            'index' => Pages\ListRmAlmacens::route('/'),
            'create' => Pages\CreateRmAlmacen::route('/create'),
            'edit' => Pages\EditRmAlmacen::route('/{record}/edit'),
        ];
    }
}
