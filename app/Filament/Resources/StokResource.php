<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StokResource\Pages;
use App\Filament\Resources\StokResource\RelationManagers;
use App\Models\Stok;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StokResource extends Resource
{
    protected static ?string $model = Stok::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('supplier_id')->relationship('supplier', 'supplier_nama')->required(),
                Forms\Components\Select::make('barang_id')->relationship('barang', 'barang_nama')->required(),
                Forms\Components\Select::make('user_id')->relationship('user', 'nama')->required(),
                Forms\Components\DateTimePicker::make('stok_tanggal')->default(now())->required(),
                Forms\Components\TextInput::make('stok_jumlah')->numeric()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('barang.barang_nama'),
                Tables\Columns\TextColumn::make('supplier.supplier_nama'),
                Tables\Columns\TextColumn::make('stok_jumlah'),
                Tables\Columns\TextColumn::make('stok_tanggal')->dateTime(),
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
            'index' => Pages\ListStoks::route('/'),
            'create' => Pages\CreateStok::route('/create'),
            'edit' => Pages\EditStok::route('/{record}/edit'),
        ];
    }
}
