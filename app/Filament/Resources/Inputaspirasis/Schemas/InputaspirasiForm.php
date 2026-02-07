<?php

namespace App\Filament\Resources\Inputaspirasis\Schemas;

use Dom\Text;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InputaspirasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nis')
                    ->label('NIS')
                    ->required(),
                Select::make('id_kategori')
                    ->label('Kategori')
                    ->relationship('kategori', 'nama_kategori')
                    ->required()
                    ->placeholder('Masukkan Kategori'),
                TextInput::make('lokasi')   
                    ->label('Lokasi')
                    ->required(),
                TextInput::make('keterangan')   
                    ->label('Keterangan')
                    ->required(),
            ]);
    }
}
