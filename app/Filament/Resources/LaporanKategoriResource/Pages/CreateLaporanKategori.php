<?php

namespace App\Filament\Resources\LaporanKategoriResource\Pages;

use App\Filament\Resources\LaporanKategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;

class CreateLaporanKategori extends CreateRecord
{
    protected static string $resource = LaporanKategoriResource::class;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('nama')
                ->label('Nama Kategori')
                ->required()
                ->maxLength(255),
        ];
    }
}
