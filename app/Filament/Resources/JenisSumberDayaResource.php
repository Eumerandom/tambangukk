<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisSumberDayaResource\Pages;
use App\Filament\Resources\JenisSumberDayaResource\RelationManagers;
use App\Models\JenisSumberDaya;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisSumberDayaResource extends Resource
{
    protected static ?string $model = JenisSumberDaya::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                //card
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama_jenis')
                        ->label('Jenis Sumber Daya')
                        ->placeholder('Jenis')
                        ->required(),

                        Forms\Components\TextInput::make('kode_jenis')
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
                Tables\Columns\TextColumn::make('id_jenis')->label('ID')->searchable(),
                Tables\Columns\TextColumn::make('nama_jenis')->label('JENIS')->searchable(),
                Tables\Columns\TextColumn::make('kode_jenis')->label('KODE')->searchable(),
            ])
            ->defaultSort('id_jenis', 'asc') 
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
            'index' => Pages\ListJenisSumberDayas::route('/'),
            'create' => Pages\CreateJenisSumberDaya::route('/create'),
            'edit' => Pages\EditJenisSumberDaya::route('/{record}/edit'),
        ];
    }
}
