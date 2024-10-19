<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanPenulisResource\Pages;
use App\Filament\Resources\LaporanPenulisResource\RelationManagers;
use App\Models\LaporanPenulis;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class LaporanPenulisResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';
    protected static ?string $navigationLabel = 'Penulis';
    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()->role === 'admin';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(User::where('role', 'penulis'))
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Penulis')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('bukus_count')
                    ->label('Jumlah Buku')
                    ->counts('bukus'),
            ])
            ->defaultSort('bukus_count', 'asc') 
            ->actions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporanPenulis::route('/')        ];
    }

    public static function canCreate(): bool
    {
        return Auth::user()->role === 'admin'; 
    }

    public static function canEdit(Model $record): bool
    {
        return Auth::user()->role === 'admin'; 
    }

    public static function canDelete(Model $record): bool
    {
        return Auth::user()->role === 'admin'; 
    }

    public static function canDeleteAny(): bool
    {
        return Auth::user()->role === 'admin'; 
    }
}
