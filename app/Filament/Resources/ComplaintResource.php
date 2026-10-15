<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComplaintResource\Pages;
use App\Filament\Resources\ComplaintResource\RelationManagers;
use App\Models\Complaint;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComplaintResource extends Resource
{
    protected static ?string $model = Complaint::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    
    protected static ?string $modelLabel = 'Laporan Aspirasi';
    protected static ?string $pluralModelLabel = 'Kotak Aspirasi Warga';
    protected static ?string $navigationGroup = 'Layanan Publik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nik')->label('NIK')
                    ->required()
                    ->maxLength(16),
                Forms\Components\TextInput::make('name')->label('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title')->label('Judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('content')->label('Konten')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('attachment')->label('Lampiran')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('status')->label('Status')
                    ->required(),
                Forms\Components\Textarea::make('reply')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nik')->label('NIK')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('attachment')->label('Lampiran')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')->label('Status'),
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
            'index' => Pages\ListComplaints::route('/'),
            'create' => Pages\CreateComplaint::route('/create'),
            'edit' => Pages\EditComplaint::route('/{record}/edit'),
        ];
    }
}
