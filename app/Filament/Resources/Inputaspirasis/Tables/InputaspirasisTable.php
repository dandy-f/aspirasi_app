<?php

namespace App\Filament\Resources\Inputaspirasis\Tables;

use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InputaspirasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),

                TextColumn::make('nis'),

                TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori'),

                TextColumn::make('lokasi'),

                TextColumn::make('keterangan')
                    ->limit(30),

                TextColumn::make('status')
                    ->badge()
                    ->sortable(),

                TextColumn::make('feedback')
                    ->label('Respon Admin')
                    ->placeholder('Belum ada tanggapan')
                    ->wrap(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
