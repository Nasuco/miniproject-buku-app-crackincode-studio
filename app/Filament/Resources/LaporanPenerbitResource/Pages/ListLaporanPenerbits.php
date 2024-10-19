<?php

namespace App\Filament\Resources\LaporanPenerbitResource\Pages;

use App\Filament\Resources\LaporanPenerbitResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaporanPenerbits extends ListRecords
{
    protected static string $resource = LaporanPenerbitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
