<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VillageProfileResource\Pages;
use App\Filament\Resources\VillageProfileResource\RelationManagers;
use App\Models\VillageProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VillageProfileResource extends Resource
{
    protected static ?string $model = VillageProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    
    protected static ?string $modelLabel = 'Profil';
    protected static ?string $pluralModelLabel = 'Profil Gampong';
    protected static ?string $navigationGroup = 'Konten Gampong';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('content')->label('Konten')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')->label('Gambar')
                    ->image(),
                Forms\Components\Select::make('type')->label('Tipe')
                    ->options([
                        'sejarah' => 'Sejarah',
                        'visi_misi' => 'Visi & Misi',
                        'struktur' => 'Struktur Pemerintahan',
                        'statistik' => 'Statistik',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Judul')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')->label('Gambar'),
                Tables\Columns\TextColumn::make('type')->label('Tipe'),
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
            'index' => Pages\ListVillageProfiles::route('/'),
            'create' => Pages\CreateVillageProfile::route('/create'),
            'edit' => Pages\EditVillageProfile::route('/{record}/edit'),
        ];
    }
}
