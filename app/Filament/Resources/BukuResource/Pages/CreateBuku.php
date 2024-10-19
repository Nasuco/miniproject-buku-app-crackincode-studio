<?php

namespace App\Filament\Resources\BukuResource\Pages;

use App\Filament\Resources\BukuResource;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateBuku extends CreateRecord
{
    protected static string $resource = BukuResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('judul')
                ->required()
                ->label('Judul Buku'),
    
            Textarea::make('deskripsi')
                ->label('Deskripsi Buku')
                ->rows(3),
    
            Select::make('kategori_id')
                ->relationship('kategori', 'nama')
                ->required()
                ->label('Kategori'),
    
            Select::make('penulis_id')
                ->relationship('user', 'name')
                ->required()
                ->label('Penulis')
                ->options(function () {
                    return User::where('role', 'penulis')->pluck('name', 'id');
                })
                ->searchable(),
    
            Select::make('penerbit_id')
                ->relationship('penerbit', 'nama')
                ->required()
                ->label('Penerbit'),
    
            FileUpload::make('cover')
                ->required()
                ->label('Cover Buku')
                ->image()
                ->disk('public')
                ->directory('covers')
                ->preserveFilenames()
                ->maxSize(1024)
                ->enableReordering(),
        ];
    }
}
