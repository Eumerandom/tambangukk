<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SumberDayaResource\Pages;
use App\Filament\Resources\SumberDayaResource\RelationManagers;
use App\Models\SumberDaya;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SumberDayaResource extends Resource
{
    protected static ?string $model = SumberDaya::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form;
            // ->schema([
            //     //
            // ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('data.kode_sda')->label('KODE')->searchable(),
                // Tables\Columns\TextColumn::make('tgl_masuk')->label('TANGGAL')->searchable(),
                Tables\Columns\TextColumn::make('data.jenis.nama_jenis')->label('JENIS')->searchable(),
                Tables\Columns\TextColumn::make('data.asals.nama_asal')->label('ASAL')->searchable(),
                Tables\Columns\TextColumn::make('data.volume_sda')->label('VOLUME')->searchable(),
                Tables\Columns\TextColumn::make('data.berat_kotor')->label('BERAT')->searchable(),
                Tables\Columns\TextColumn::make('tgl_masuk')->label('TANGGAL')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
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
            'index' => Pages\ListSumberDayas::route('/'),
        ];
    }
}
