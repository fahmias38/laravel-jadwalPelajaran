<?php

namespace App\Filament\Resources\Jadwals\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;

class JadwalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hari')
                    ->label('Hari')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('jam_mulai')
                    ->label('Mulai')
                    ->time(),

                TextColumn::make('jam_selesai')
                    ->label('Selesai')
                    ->time(),

                TextColumn::make('guru.nama')
                    ->label('Guru')
                    ->searchable(),

                TextColumn::make('kelas.nama_kelas')
                    ->label('Kelas')
                    ->searchable(),
            ])
            ->filters([])
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
