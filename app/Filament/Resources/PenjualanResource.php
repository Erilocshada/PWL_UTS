<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenjualanResource\Pages;
use App\Filament\Resources\PenjualanResource\RelationManagers;
use App\Models\Penjualan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenjualanResource extends Resource
{
    protected static ?string $model = Penjualan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                    Forms\Components\Section::make('Data Penjualan')->schema([
                    Forms\Components\TextInput::make('penjualan_kode')->default('PJN-'.time())->required(),
                    Forms\Components\TextInput::make('pembeli')->required(),
                    Forms\Components\DateTimePicker::make('penjualan_tanggal')->default(now()),
                    Forms\Components\Select::make('user_id')->relationship('user', 'nama')->required(),
                ])->columns(2),

                Forms\Components\Section::make('Detail Barang')->schema([
                    Forms\Components\Repeater::make('details') // Relasi hasMany di model Penjualan
                        ->relationship()
                        ->schema([
                            Forms\Components\Select::make('barang_id')
                                ->relationship('barang', 'barang_nama')
                                ->reactive()
                                ->afterStateUpdated(fn ($state, callable $set) => 
                                    $set('harga', \App\Models\Barang::find($state)?->harga_jual ?? 0))
                                ->required(),
                            Forms\Components\TextInput::make('harga')->numeric()->prefix('Rp')->readOnly(),
                            Forms\Components\TextInput::make('jumlah')->numeric()->default(1)->required(),
                        ])->columns(3)
                ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('penjualan_kode'),
                Tables\Columns\TextColumn::make('pembeli'),
                Tables\Columns\TextColumn::make('penjualan_tanggal')->dateTime(),
                Tables\Columns\TextColumn::make('user.nama')->label('Kasir'),
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
            'index' => Pages\ListPenjualans::route('/'),
            'create' => Pages\CreatePenjualan::route('/create'),
            'edit' => Pages\EditPenjualan::route('/{record}/edit'),
        ];
    }
}
