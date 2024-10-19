<?php

namespace App\Filament\Resources\LaporanPenerbitResource\Pages;

use App\Filament\Resources\LaporanPenerbitResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;

class CreateLaporanPenerbit extends CreateRecord
{
    protected static string $resource = LaporanPenerbitResource::class;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('nama')
                ->label('Nama Penerbit')
                ->required()
                ->maxLength(255),
        ];
    }
}
