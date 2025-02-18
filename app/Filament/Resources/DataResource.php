<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Asal;
use App\Models\Jenis;
use App\Models\Data;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DataResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DataResource\RelationManagers;

class DataResource extends Resource
{
    protected static ?string $model = Data::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                //card
                Forms\Components\Card::make()
                ->schema([

                    Forms\Components\Select::make('jenis_id') // Menampilkan dropdown pilihan berdasarkan data dari tabel lain
                        ->label('Jenis Sumber Daya')
                        ->options(function () {
                            return \App\Models\Jenis::whereJsonContains('kategori', 'sumber daya') // Mengambil semua data dari tabel jenis, dengan kondisi di mana kategori = sumber daya
                                ->pluck('nama_jenis', 'id');
                        })
                        ->required(),
                    Forms\Components\Select::make('asals_id')
                        ->label('Asal Sumber Daya')
                        ->options(Asal::pluck('nama_asal', 'id'))
                        ->required(),
                    Forms\Components\TextInput::make('volume_sda')
                        ->label('Volume')
                        ->numeric()
                        ->required(),
                    Forms\Components\TextInput::make('berat_kotor')
                        ->label('Berat Kotor (ton)')
                        ->numeric()
                        ->required(),
                    
                ])  

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->getStateUsing(fn ($record) => Data::orderBy('id')->pluck('id') 
                    ->search($record->id) + 1), 
                Tables\Columns\TextColumn::make('kode_sda')->label('KODE')->searchable(),
                Tables\Columns\TextColumn::make('jenis.nama_jenis')->label('JENIS')->searchable(),
                Tables\Columns\TextColumn::make('asal.nama_asal')->label('ASAL')->searchable(),
                Tables\Columns\TextColumn::make('volume_sda')
                    ->label('VOLUME')
                    ->searchable()
                    ->formatStateUsing(fn ($state) => $state . '²'),
                Tables\Columns\TextColumn::make('berat_kotor')
                    ->label('BERAT')
                    ->searchable()
                    ->formatStateUsing(fn ($state) => $state . ' ton'), //mengambil nilai asli dari database ($state) dan menambahkan string ' ton'
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
            'index' => Pages\ListData::route('/'),
            'create' => Pages\CreateData::route('/create'),
            'edit' => Pages\EditData::route('/{record}/edit'),
        ];
    }
}
