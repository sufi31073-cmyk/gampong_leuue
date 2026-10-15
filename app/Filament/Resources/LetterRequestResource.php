<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LetterRequestResource\Pages;
use App\Filament\Resources\LetterRequestResource\RelationManagers;
use App\Models\LetterRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LetterRequestResource extends Resource
{
    protected static ?string $model = LetterRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    
    protected static ?string $modelLabel = 'Pengajuan Surat';
    protected static ?string $pluralModelLabel = 'Data Pengajuan Surat';
    protected static ?string $navigationGroup = 'Layanan Publik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('letter_template_id')->label('Jenis Surat')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nik')->label('NIK')
                    ->required()
                    ->maxLength(16),
                Forms\Components\TextInput::make('name')->label('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('purpose')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('attachment')->label('Lampiran')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('resi_number')->label('Nomor Resi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'ready' => 'Ready',
                        'rejected' => 'Rejected',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('letter_template_id')->label('Jenis Surat')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nik')->label('NIK')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('attachment')->label('Lampiran')
                    ->searchable(),
                Tables\Columns\TextColumn::make('resi_number')->label('Nomor Resi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'info',
                        'ready' => 'success',
                        'rejected' => 'danger',
                    }),
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
                Tables\Actions\Action::make('cetak')
                    ->label('Cetak')
                    ->icon('heroicon-o-printer')
                    ->color('success')
                    ->url(fn (\App\Models\LetterRequest $record): string => route('admin.cetak-surat', $record->id))
                    ->openUrlInNewTab()
                    ->visible(fn (\App\Models\LetterRequest $record): bool => in_array($record->status, ['processing', 'ready'])),
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
            'index' => Pages\ListLetterRequests::route('/'),
            'create' => Pages\CreateLetterRequest::route('/create'),
            'edit' => Pages\EditLetterRequest::route('/{record}/edit'),
        ];
    }
}
