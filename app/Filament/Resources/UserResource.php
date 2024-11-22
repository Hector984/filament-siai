<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Catalogos\RmAlmacen;
use App\Models\Catalogos\SsUnidadEjecut;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    // protected static ?string $navigationLabel = 'User';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Personal Info')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        // Forms\Components\DateTimePicker::make('email_verified_at'),
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->required()
                            ->hiddenOn('edit')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('login')
                            ->label('Username')
                            ->required()
                            ->maxLength(100),
                    ]),

                Section::make('Additional Info')
                    ->columns(3)
                    ->schema([
                        Forms\Components\Select::make('roles')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable(),
                        Forms\Components\Select::make('idur')
                            ->relationship(name: 'UnidadResponsable', modifyQueryUsing: fn(Builder $query) => $query->orderBy('Clave')->orderBy('Descripcion'),)
                            ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->Clave} {$record->Descripcion} ")
                            ->preload()
                            ->searchable(['clave', 'descripcion'])
                            ->live()
                            ->afterStateUpdated(function (Set $set) {
                                $set('idue', null);
                                $set('cve_almacen', null);
                            }),
                        Forms\Components\Select::make('idue')
                            ->options(fn(Get $get): Collection => SsUnidadEjecut::query()
                                ->where('ur', $get('idur'))
                                ->orderBy('Ue')->orderBy('Clave')->orderBy('Descripcion')
                                ->pluck('Descripcion', 'Ue'))
                            ->preload()
                            ->searchable(['clave', 'descripcion'])
                            ->live()
                            ->afterStateUpdated(function (Set $set) {
                                $set('cve_almacen', null);
                            }),
                        Forms\Components\Select::make('cve_almacen')
                            ->options(fn(Get $get): Collection => RmAlmacen::query()
                                ->where('Ue', $get('idue'))
                                ->orderBy('Almacen')->orderBy('Descripcion')
                                ->pluck('Descripcion', 'Almacen'))
                            ->preload()
                            ->searchable(['almacen', 'descripcion'])
                            ->live(),
                        Forms\Components\TextInput::make('nempleado')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('current_team_id')
                            ->numeric(),
                        Forms\Components\TextInput::make('profile_photo_path')
                            ->maxLength(2048),
                    ]),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('roles.name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('login')
                    ->searchable(),
                TextColumn::make('idur')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('idue')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nempleado')
                    ->searchable(),
                TextColumn::make('estatus')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('almacen.Descripcion')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('profile_photo_path')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
