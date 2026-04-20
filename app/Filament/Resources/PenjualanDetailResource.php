<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenjualanDetailResource\Pages;
use App\Filament\Resources\PenjualanDetailResource\RelationManagers;
use App\Models\Penjualan_detail;
use App\Models\PenjualanDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenjualanDetailResource extends Resource
{
    protected static ?string $model = Penjualan_detail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('penjualan_id')->relationship('penjualan', 'penjualan_kode')->required(),
                Forms\Components\Select::make('barang_id')->relationship('barang', 'barang_nama')->required(),
                Forms\Components\TextInput::make('harga')->numeric()->required(),
                Forms\Components\TextInput::make('jumlah')->numeric()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListPenjualanDetails::route('/'),
            'create' => Pages\CreatePenjualanDetail::route('/create'),
            'edit' => Pages\EditPenjualanDetail::route('/{record}/edit'),
        ];
    }
}
