<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TouristSpotResource\Pages;
use App\Filament\Resources\TouristSpotResource\RelationManagers;
use App\Models\TouristSpot;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TouristSpotResource extends Resource
{
    protected static ?string $model = TouristSpot::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';
    
    protected static ?string $modelLabel = 'Wisata';
    protected static ?string $pluralModelLabel = 'Destinasi Wisata';
    protected static ?string $navigationGroup = 'Konten Gampong';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('location')->label('Lokasi')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\FileUpload::make('image')->label('Gambar')
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')->label('Lokasi')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')->label('Gambar'),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->label('Diperbarui Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListTouristSpots::route('/'),
            'create' => Pages\CreateTouristSpot::route('/create'),
            'edit' => Pages\EditTouristSpot::route('/{record}/edit'),
        ];
    }
}
