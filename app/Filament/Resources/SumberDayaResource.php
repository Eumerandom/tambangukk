<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\SumberDaya;
use Filament\Tables\Table;
use App\Models\JenisSumberDaya; // tambahkan class
use App\Models\AsalSumberDaya; // tambahkan class
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SumberDayaResource\Pages;
use App\Filament\Resources\SumberDayaResource\RelationManagers;

class SumberDayaResource extends Resource
{
    protected static ?string $model = SumberDaya::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                //card
                Forms\Components\Card::make()
                    ->schema([

                        // karena auto increment jadi tidak perlu ditampilkan di create
                        // Forms\Components\TextInput::make('id_sda'),
                        
                        Forms\Components\Select::make('id_jenis') // komponen dropdown (select box), nilai yang dipilih oleh pengguna akan disimpan dalam database dengan kolom id_jenis
                        ->label('Jenis Sumber Daya')
                        ->options(JenisSumberDaya::pluck('nama_jenis', 'id_jenis')) // mengambil data dari model JenisSumberDaya untuk dijadikan opsi dalam dropdown 
                        // 'nama' sebagai teks yang ditampilkan dalam dropdown.
                        // 'id' sebagai nilai (value) yang akan disimpan dalam database.
                        ->searchable()
                        ->required(), //bintang merah, wajib

                        Forms\Components\TextInput::make('volume_sda') //menyesuiakan field yang dibuat
                        ->label('Volume Sumber Daya')
                        ->placeholder('Volume')
                        ->numeric() //karena bertipe float di database
                        ->required(),

                        Forms\Components\TextInput::make('berat_kotor')
                        ->label('Berat Kotor (ton)')
                        ->placeholder('Berat Kotor')
                        ->numeric() //karena bertipe float di database
                        ->required(),

                        Forms\Components\Select::make('id_asal')
                        ->label('Asal Sumber Daya')
                        ->options(AsalSumberDaya::pluck('nama_asal', 'id_asal'))
                        ->searchable()
                        ->required(),
                    ])
            ]);
    }

    // ini untuk menampilkannya
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_sda')->label('ID')->searchable(),
                Tables\Columns\TextColumn::make('kode_sda')->label('Kode SDA')->searchable(),
                Tables\Columns\TextColumn::make('jenis.nama_jenis')->label('Jenis')->searchable(),
                Tables\Columns\TextColumn::make('volume_sda')
                    ->label('Volume')
                    ->searchable()
                    ->formatStateUsing(fn ($state) => $state . '²'),
                Tables\Columns\TextColumn::make('berat_kotor')
                    ->label('Berat Kotor')
                    ->searchable()
                    ->formatStateUsing(fn ($state) => $state . ' ton'), //mengambil nilai asli dari database ($state) dan menambahkan string ' ton'
                Tables\Columns\TextColumn::make('asal.nama_asal')->label('Asal')->searchable(),
            ])
            ->defaultSort('id_sda', 'asc') // Urutkan berdasarkan id_sda
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
            'index' => Pages\ListSumberDayas::route('/'),
            'create' => Pages\CreateSumberDaya::route('/create'),
            'edit' => Pages\EditSumberDaya::route('/{record}/edit'),
        ];
    }
}
