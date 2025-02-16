<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisResource\Pages;
use App\Filament\Resources\JenisResource\RelationManagers;
use App\Models\Jenis;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisResource extends Resource
{
    protected static ?string $model = Jenis::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
    
                //card
                Forms\Components\Card::make()
                    ->schema([
    
                        Forms\Components\TextInput::make('nama_jenis') //menyesuiakan field yang dibuat
                            ->label('Nama Jenis')
                            ->placeholder('Masukkan Nama Jenis')
                            ->required(), //bintang merah, wajib
    
                        Forms\Components\TextInput::make('kode_jenis') 
                            ->label('Kode Jenis')
                            ->placeholder('Masukkan Kode Jenis')
                            ->required(), 

                        Forms\Components\Select::make('kategori')
                            ->label('Kategori')
                            ->options([
                                'sumber daya' => 'Sumber Daya',
                                'bahan galian' => 'Bahan Galian',
                                'limbah pengotor' => 'Limbah Pengotor',
                            ])
                            ->multiple() // Mengaktifkan multiple select
                            ->reactive() // Agar berubah sesuai pilihan user
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                // Jika user memilih "limbah pengotor", maka reset ke single pilihan saja
                                if (in_array('limbah pengotor', $state)) {
                                    $set('kategori', ['limbah pengotor']);
                                }
                                
                                // Jika memilih "sumber daya" atau "bahan galian", maka hanya bisa memilih salah satu dari keduanya
                                if (in_array('sumber daya', $state) && in_array('bahan galian', $state)) {
                                    return;
                                }
                            })
                            ->default([]) // Default sebagai array kosong
                            ->required(),
                    ])
            ]);
    }

    // tampilannya
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->getStateUsing(fn ($record) => Jenis::orderBy('id')->pluck('id') //mengambil daftar ID yang sudah diurutkan berdasarkan ID
                    ->search($record->id) + 1), //mencari posisi ID saat ini dalam daftar tersebut, + 1 agar nomor dimulai dari 1, bukan dari index 0
                Tables\Columns\TextColumn::make('nama_jenis')->label('NAMA')->searchable(),
                Tables\Columns\TextColumn::make('kode_jenis')->label('KODE')->searchable(),
                Tables\Columns\TextColumn::make('kategori')->label('KATEGORI')->searchable(),
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
            'index' => Pages\ListJenis::route('/'),
            'create' => Pages\CreateJenis::route('/create'),
            'edit' => Pages\EditJenis::route('/{record}/edit'),
        ];
    }
}
