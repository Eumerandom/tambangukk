<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AsalSumberDayaResource\Pages;
use App\Filament\Resources\AsalSumberDayaResource\RelationManagers;
use App\Models\AsalSumberDaya;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AsalSumberDayaResource extends Resource
{
    protected static ?string $model = AsalSumberDaya::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                //card
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama_asal')
                        ->label('Asal Sumber Daya')
                        ->placeholder('Asal')
                        ->required(),

                        Forms\Components\TextInput::make('kode_asal')
                        ->label('Kode')
                        ->placeholder('Kode')
                        ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_asal')->label('ID')->searchable(),
                Tables\Columns\TextColumn::make('nama_asal')->label('ASAL')->searchable(),
                Tables\Columns\TextColumn::make('kode_asal')->label('KODE')->searchable(),
            ])
            ->defaultSort('id_asal', 'asc') 
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
            'index' => Pages\ListAsalSumberDayas::route('/'),
            'create' => Pages\CreateAsalSumberDaya::route('/create'),
            'edit' => Pages\EditAsalSumberDaya::route('/{record}/edit'),
        ];
    }
}
