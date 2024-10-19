<?php

namespace App\Filament\Resources\LaporanPenulisResource\Pages;

use App\Filament\Resources\LaporanPenulisResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporanPenulis extends EditRecord
{
    protected static string $resource = LaporanPenulisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
