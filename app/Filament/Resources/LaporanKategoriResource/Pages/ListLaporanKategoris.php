<?php

namespace App\Filament\Resources\LaporanKategoriResource\Pages;

use App\Filament\Resources\LaporanKategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListLaporanKategoris extends ListRecords
{
    protected static string $resource = LaporanKategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

}
