<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BukuResource\Pages;
use App\Filament\Resources\BukuResource\RelationManagers;
use App\Models\Buku;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BukuResource extends Resource
{
    protected static ?string $model = Buku::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Buku';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')->required(),
                Select::make('kategori_id')
                    ->relationship('kategori', 'nama')
                    ->required(),
                Select::make('penulis_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->options(function () {
                        return User::where('role', 'penulis')->pluck('name', 'id');
                    })
                    ->searchable(),
                
                Select::make('penerbit_id')
                    ->relationship('penerbit', 'nama')
                    ->required(),
                FileUpload::make('cover_image')->directory('covers')->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        $query = Buku::query();
    
        if (Auth::check() && Auth::user()->role === 'penulis') {
            $query->where('penulis_id', Auth::id());
        }
    
        return $table
            ->query($query)
            ->filters([
                SelectFilter::make('kategori_id')->relationship('kategori', 'nama'),
            ])
            ->columns([
                TextColumn::make('judul')->sortable()->searchable(),
                TextColumn::make('kategori.nama')->sortable()->searchable(),
                TextColumn::make('user.name')->sortable()->searchable(),
                TextColumn::make('penerbit.nama')->sortable()->searchable(),
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
            'index' => Pages\ListBukus::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
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
