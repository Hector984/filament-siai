<?php

namespace App\Filament\Resources\Catalogos;

use App\Filament\Resources\Catalogos\RmAlmacenResource\Pages;
use App\Filament\Resources\Catalogos\RmAlmacenResource\RelationManagers;
use App\Models\Catalogos\RmAlmacen;
use App\Models\Catalogos\SsUnidadEjecut;
use App\Models\Catalogos\SsUnidadRespons;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Illuminate\Support\Collection;

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
                    ->relationship(name: 'ur', titleAttribute: 'Descripcion')
                    ->getOptionLabelFromRecordUsing(fn(SsUnidadRespons $record) => "{$record->Clave} - {$record->Descripcion}")
                    ->searchable(['Clave', 'Descripcion'])
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('Ue', null);
                    })
                    ->required(),
                Forms\Components\Select::make('Ue')
                    ->label('Unidad Ejecutora')
                    // ->options(fn(Get $get): Collection => SsUnidadEjecut::query()
                    //     ->select('Ue', 'Descripcion', 'Clave')
                    //     ->where('Ur', $get('Ur'))
                    //     ->orderBy('Ue')->orderBy('Clave')
                    //     // ->get()
                    //     ->pluck('Descripcion', 'Ue')
                    // )
                    // Este sobreescribe el options
                    ->relationship(
                        'ue',
                        'Descripcion',
                        modifyQueryUsing: fn(Builder $query, Get $get) => $query->where('Ur', $get('Ur'))->orderBy('Clave')->orderBy('Descripcion')
                    )
                    // ->getSearchResultsUsing(fn (string $search): array => SsUnidadEjecut::where('Ur', )->limit(50)->pluck('name', 'id')->toArray())
                    ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->Clave} - {$record->Descripcion}")
                    ->searchable(['Clave', 'Descripcion'])
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function (Set $set, Get $get) {
                        $almacen = RmAlmacen::where('Ur', $get('Ur'))->where('Ue', $get('Ue'))->first();
                        $set('Account', $almacen->Cuenta);
                        $set('Warehouse', $almacen->Almacen);
                        $set('Descripcion', $almacen->Descripcion);
                        $set('Almacenista', $almacen->Almacenista);
                        $set('Puesto_Alm', $almacen->Puesto_Alm);
                        $set('Direccion', $almacen->Direccion);
                        $set('Telefono', $almacen->Telefono);
                        $set('Email', $almacen->Email);
                        $set('Responsable_C', $almacen->Responsable_C);
                        $set('Puesto_Resp_C', $almacen->Puesto_Resp_C);
                        $set('Responsable_I', $almacen->Responsable_I);
                        $set('Puesto_Resp_I', $almacen->Puesto_Resp_I);
                        $set('Dependencia', $almacen->Dependencia);
                    })
                    ->required(),
                Forms\Components\TextInput::make('Account')
                    ->label(__('Account'))
                    ->required()
                    ->maxLength(8),
                Forms\Components\TextInput::make('Warehouse')
                    ->label(__('Warehouse No'))
                    ->disabled(),
                Forms\Components\TextInput::make('Warehouseman')
                    ->label(__('Warehouseman'))
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('Warehouse Position')
                    ->label(__('Warehouse Position'))
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('Email')
                    ->required()
                    ->maxLength(80),
                Forms\Components\TextInput::make('Tel')
                    ->label(__('Tel'))
                    ->required()
                    ->maxLength(25),
                Forms\Components\TextInput::make('Goods Responsbale')
                    ->label(__('Goods Responsbale'))
                    ->maxLength(50),
                Forms\Components\TextInput::make('Position')
                    ->label(__('Position'))
                    ->maxLength(50),
                Forms\Components\TextInput::make('Instrumental Responsbale')
                    ->label(__('Instrumental Responsbale'))
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('Position')
                    ->label(__('Position'))
                    ->maxLength(50),
                Forms\Components\TextInput::make('Address')
                    ->label(__('Address'))
                    ->required()
                    ->maxLength(200),
                Forms\Components\TextInput::make('Warehouse Desc')
                    ->label(__('Warehouse Desc'))
                    ->required()
                    ->maxLength(50),
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

    public static function getModelLabel(): string
    {
        return (__('Warehouse'));
    }

    public static function getPluralModelLabel(): string
    {
        return (__('Warehouses'));
    }
}
