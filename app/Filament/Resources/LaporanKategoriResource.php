<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanKategoriResource\Pages;
use App\Models\Kategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LaporanKategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Kategori';
    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()->role === 'admin';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Kategori')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Kategori')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('bukus_count')
                    ->label('Jumlah Buku')
                    ->counts('bukus'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListLaporanKategoris::route('/'),
            'create' => Pages\CreateLaporanKategori::route('/create'),
            'edit' => Pages\EditLaporanKategori::route('/{record}/edit')
        ];
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
