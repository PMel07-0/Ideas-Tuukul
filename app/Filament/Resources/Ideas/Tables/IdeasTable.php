<?php

namespace App\Filament\Resources\Ideas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class IdeasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->label('ID')
                ->sortable()
                ->searchable(),
                TextColumn::make('titulo')
                    ->label('Titulo:')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('estado')
                    ->label('Estado:')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('autor')
                    ->label('Autor:')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('categoria.nombre')
                    ->label('Categoria')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Creado el:')
                    ->dateTime()
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Actualizado el:')
                    ->dateTime()
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('estado')
                ->options([
                    'Registrada' => 'Registrada',
                    'En revisión' => 'En revisión',
                    'Aprobada' => 'Aprobada',
                    'Rechazada' => 'Rechazada',
        ]),
])
            
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
