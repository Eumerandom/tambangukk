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

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Sumber Daya';
    protected static ?string $modelLabel = 'Sumber Daya';
    protected static ?string $pluralModelLabel = 'Sumber Daya';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                //card
                Forms\Components\Section::make('Data Sumber Daya')
                    ->description('Masukkan informasi detail sumber daya')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([

                            Forms\Components\TextInput::make('kode_sda')
                            ->label('Kode Sumber Daya')
                            ->placeholder('Masukkan kode sumber daya')
                            ->required()
                            ->maxLength(255),

                            Forms\Components\Select::make('jenis_sda')
                            ->label('Jenis Sumber Daya')
                            ->options([
                                'batubara' => 'Batubara',
                                'emas' => 'Emas',
                                'nikel' => 'Nikel',
                                'tembaga' => 'Tembaga',
                                'bauksit' => 'Bauksit'
                            ])
                            ->required(),

                            ])
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Section::make('Informasi Ukuran')
                    ->description('Detail volume dan berat sumber daya')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('volume_sda')
                            ->label('Volume')
                            ->numeric()
                            ->suffix('m³')
                            ->required(),

                                Forms\Components\TextInput::make('berat_kotor')
                            ->label('Berat Kotor')
                            ->numeric()
                            ->suffix('ton')
                            ->required(),

                            ])
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Section::make('Lokasi')
                    ->description('Informasi lokasi asal sumber daya')
                    ->schema([
                        Forms\Components\TextInput::make('asal_sda')
                            ->label('Asal Sumber Daya')
                            ->placeholder('Masukkan lokasi asal')
                            ->required()
                            ->maxLength(255)
                    ])
                    ->columnSpan(['lg' => 2])
            ])
            ->columns(['lg' => 2]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_sda')
                    ->label('Kode')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('jenis_sda')
                    ->label('Jenis')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('volume_sda')
                    ->label('Volume')
                    ->suffix(' m³')
                    ->numeric()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('berat_kotor')
                    ->label('Berat Kotor')
                    ->suffix(' ton')
                    ->numeric()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('asal_sda')
                    ->label('Asal')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jenis_sda')
                    ->label('Jenis Sumber Daya')
                    ->options([
                        'batubara' => 'Batubara',
                        'emas' => 'Emas',
                        'nikel' => 'Nikel',
                        'tembaga' => 'Tembaga',
                        'bauksit' => 'Bauksit'
                    ]),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
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
