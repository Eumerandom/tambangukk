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
        return $form
            ->schema([

                //card
                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\TextInput::make('id')
                        ->label('ID')
                        ->placeholder('ID')
                        ->required(),

                        Forms\Components\Textarea::make('kode')
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
            'index' => Pages\ListSumberDayas::route('/'),
            'create' => Pages\CreateSumberDaya::route('/create'),
            'edit' => Pages\EditSumberDaya::route('/{record}/edit'),
        ];
    }
}
