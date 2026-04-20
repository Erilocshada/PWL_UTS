<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Card::make()->schema([
                    Forms\Components\Select::make('kategori_id')
                        ->relationship('kategori', 'kategori_nama')
                        ->required(),
                    Forms\Components\TextInput::make('barang_kode')->required()->unique(ignoreRecord: true),
                    Forms\Components\TextInput::make('barang_nama')->required(),
                    Forms\Components\TextInput::make('harga_beli')->numeric()->prefix('Rp')->required(),
                    Forms\Components\TextInput::make('harga_jual')->numeric()->prefix('Rp')->required(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('barang_kode')->searchable(),
                Tables\Columns\TextColumn::make('barang_nama')->searchable(),
                Tables\Columns\TextColumn::make('kategori.kategori_nama')->label('Kategori'),
                Tables\Columns\TextColumn::make('harga_jual')->money('IDR'),
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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }
}
