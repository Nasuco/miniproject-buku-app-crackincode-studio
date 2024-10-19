<?php

namespace App\Filament\Resources\LaporanPenerbitResource\Pages;

use App\Filament\Resources\LaporanPenerbitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporanPenerbit extends EditRecord
{
    protected static string $resource = LaporanPenerbitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
