<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VillageOfficialResource\Pages;
use App\Models\VillageOfficial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VillageOfficialResource extends Resource
{
    protected static ?string $model = VillageOfficial::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $modelLabel = 'Perangkat Gampong';
    protected static ?string $pluralModelLabel = 'Perangkat & Struktur Organisasi';
    protected static ?string $navigationGroup = 'Pemerintahan Gampong';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Lengkap & Gelar')
                            ->placeholder('Cth: Razali / Safriadi, S.Pd.')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('position')
                            ->label('Jabatan Struktur')
                            ->placeholder('Cth: Keuchik / Sekretaris / Imuem Meunasah / Kepala Dusun')
                            ->required()
                            ->maxLength(255),
                    ]),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('nip')
                            ->label('NIP / NIPD (Jika ada)')
                            ->placeholder('19750812 ...'),

                        Forms\Components\TextInput::make('phone')
                            ->label('Nomor WhatsApp / Telp')
                            ->placeholder('08126908207'),
                    ]),

                    Forms\Components\TextInput::make('photo')
                        ->label('URL Foto Perangkat')
                        ->placeholder('https://images.unsplash.com/... atau upload foto')
                        ->columnSpanFull(),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\Select::make('presence_status')
                            ->label('Status Kehadiran Hari Ini')
                            ->options([
                                'Hadir' => 'Hadir di Kantor',
                                'Dinas Luar' => 'Dinas Luar / Tugas',
                                'Izin' => 'Izin',
                                'Cuti' => 'Cuti Resmi',
                            ])
                            ->default('Hadir')
                            ->required(),

                        Forms\Components\TextInput::make('check_in_time')
                            ->label('Jam Masuk / Absen Hari Ini')
                            ->placeholder('Cth: 07:45 WIB')
                            ->default('07:45 WIB'),
                    ]),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('order')
                            ->label('Urutan Hirarki Struktur (Order)')
                            ->numeric()
                            ->default(1)
                            ->required(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Status Aktif di Struktur?')
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
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Foto')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Lengkap')
                    ->weight('bold')
                    ->searchable(),

                Tables\Columns\TextColumn::make('position')
                    ->label('Jabatan')
                    ->badge()
                    ->color('primary')
                    ->searchable(),

                Tables\Columns\TextColumn::make('presence_status')
                    ->label('Status Kehadiran')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Hadir' => 'success',
                        'Dinas Luar' => 'info',
                        'Izin' => 'warning',
                        'Cuti' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('check_in_time')
                    ->label('Jam Masuk')
                    ->fontFamily('mono'),

                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Aktif'),
            ])
            ->defaultSort('order', 'asc')
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
            'index' => Pages\ListVillageOfficials::route('/'),
            'create' => Pages\CreateVillageOfficial::route('/create'),
            'edit' => Pages\EditVillageOfficial::route('/{record}/edit'),
        ];
    }
}
