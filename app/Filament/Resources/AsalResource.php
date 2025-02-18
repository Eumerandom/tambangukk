<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AsalResource\Pages;
use App\Filament\Resources\AsalResource\RelationManagers;
use App\Models\Asal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AsalResource extends Resource
{
    protected static ?string $model = Asal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                //card
                Forms\Components\Card::make()
                 ->schema([

                    Forms\Components\TextInput::make('nama_asal') //menyesuiakan field yang dibuat
                        ->label('Nama Asal')
                        ->placeholder('Masukkan Nama Asal')
                        ->required(), //bintang merah, wajib

                    Forms\Components\TextInput::make('kode_asal') 
                        ->label('Kode Asal')
                        ->placeholder('Masukkan Kode Asal')
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
                ->getStateUsing(fn ($record) => Asal::orderBy('id')->pluck('id') 
                ->search($record->id) + 1), 
                Tables\Columns\TextColumn::make('nama_asal')->label('NAMA')->searchable(),
                Tables\Columns\TextColumn::make('kode_asal')->label('KODE')->searchable(),
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
            'index' => Pages\ListAsals::route('/'),
            'create' => Pages\CreateAsal::route('/create'),
            'edit' => Pages\EditAsal::route('/{record}/edit'),
        ];
    }
}
