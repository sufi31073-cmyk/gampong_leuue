<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Models\Agenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $modelLabel = 'Agenda Gampong';
    protected static ?string $pluralModelLabel = 'Agenda & Kegiatan Gampong';
    protected static ?string $navigationGroup = 'Pemerintahan Gampong';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul Agenda / Kegiatan')
                        ->placeholder('Cth: Musrenbang Gampong 2026')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('event_date')
                            ->label('Tanggal Pelaksanaan')
                            ->placeholder('Cth: 25 Agu 2026')
                            ->required(),

                        Forms\Components\TextInput::make('event_time')
                            ->label('Waktu / Jam')
                            ->placeholder('Cth: 08:30 WIB - 12:00 WIB')
                            ->default('08:00 WIB - Selesai')
                            ->required(),
                    ]),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('location')
                            ->label('Lokasi Kegiatan')
                            ->placeholder('Cth: Meunasah Gampong Leu Ue')
                            ->required(),

                        Forms\Components\TextInput::make('organizer')
                            ->label('Penanggung Jawab / Penyelenggara')
                            ->placeholder('Cth: Keuchik & Tuha Peut'),
                    ]),

                    Forms\Components\Textarea::make('description')
                        ->label('Deskripsi Ringkas Kegiatan')
                        ->rows(3)
                        ->placeholder('Uraian singkat mengenai agenda kegiatan desa...'),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status Kegiatan')
                            ->options([
                                'Akan Datang' => 'Akan Datang',
                                'Sedang Berlangsung' => 'Sedang Berlangsung',
                                'Selesai' => 'Selesai',
                            ])
                            ->default('Akan Datang')
                            ->required(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Tampilkan di Website?')
                            ->default(true)
                            ->required(),
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Agenda')
                    ->weight('bold')
                    ->searchable(),

                Tables\Columns\TextColumn::make('event_date')
                    ->label('Tanggal')
                    ->badge()
                    ->color('primary'),

                Tables\Columns\TextColumn::make('event_time')
                    ->label('Waktu')
                    ->fontFamily('mono'),

                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Akan Datang' => 'warning',
                        'Sedang Berlangsung' => 'info',
                        'Selesai' => 'success',
                        default => 'gray',
                    }),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Aktif'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAgendas::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit' => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }
}
