<?php

namespace App\Filament\Resources\Jadwals\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;

class JadwalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('hari')
                ->label('Hari')
                ->options([
                    'Senin' => 'Senin',
                    'Selasa' => 'Selasa',
                    'Rabu' => 'Rabu',
                    'Kamis' => 'Kamis',
                    'Jumat' => 'Jumat',
                ])
                ->required(),

            TimePicker::make('jam_mulai')
                ->label('Jam Mulai')
                ->seconds(false)
                ->required(),

            TimePicker::make('jam_selesai')
                ->label('Jam Selesai')
                ->seconds(false)
                ->required(),

            Select::make('guru_id')
                ->label('Guru')
                ->relationship('guru', 'nama')
                ->required(),

            Select::make('kelas_id')
                ->label('Kelas')
                ->relationship('kelas', 'nama_kelas')
                ->required(),
        ]);
    }
}
