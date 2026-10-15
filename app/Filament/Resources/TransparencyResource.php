<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransparencyResource\Pages;
use App\Filament\Resources\TransparencyResource\RelationManagers;
use App\Models\Transparency;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransparencyResource extends Resource
{
    protected static ?string $model = Transparency::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';
    
    protected static ?string $modelLabel = 'Dokumen Transparansi';
    protected static ?string $pluralModelLabel = 'Publikasi APBG / LPJ';
    protected static ?string $navigationGroup = 'Sistem & Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('file_path')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')->label('Tipe')
                    ->required(),
                Forms\Components\TextInput::make('thumbnail')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')->label('Tipe'),
                Tables\Columns\TextColumn::make('thumbnail')
                    ->searchable(),
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
            'index' => Pages\ListTransparencies::route('/'),
            'create' => Pages\CreateTransparency::route('/create'),
            'edit' => Pages\EditTransparency::route('/{record}/edit'),
        ];
    }
}
