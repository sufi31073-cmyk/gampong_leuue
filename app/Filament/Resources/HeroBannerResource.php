<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroBannerResource\Pages;
use App\Models\HeroBanner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HeroBannerResource extends Resource
{
    protected static ?string $model = HeroBanner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $modelLabel = 'Banner Slide';
    protected static ?string $pluralModelLabel = 'Banner Carousel (Hero)';
    protected static ?string $navigationGroup = 'Konten Gampong';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul Slide Banner')
                        ->placeholder('Cth: Pelayanan E-Surat Mandiri 24 Jam')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('badge_text')
                        ->label('Label Badge Atas (Opsional)')
                        ->placeholder('Cth: ⚡ Layanan Mandiri 24 Jam Nonstop'),

                    Forms\Components\Textarea::make('subtitle')
                        ->label('Subjudul / Deskripsi Ringkas')
                        ->rows(3)
                        ->placeholder('Deskripsi singkat yang tampil di atas banner...'),

                    Forms\Components\TextInput::make('image')
                        ->label('URL Gambar Banner')
                        ->placeholder('https://images.unsplash.com/... atau upload gambar below')
                        ->columnSpanFull(),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('cta_text')
                            ->label('Teks Tombol CTA')
                            ->placeholder('Cth: Buat Surat Sekarang'),

                        Forms\Components\TextInput::make('cta_url')
                            ->label('URL Tujuan Tombol')
                            ->placeholder('Cth: /e-surat'),
                    ]),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('order')
                            ->label('Urutan Tampil (Order)')
                            ->numeric()
                            ->default(1)
                            ->required(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktifkan Banner Ini?')
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
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Banner')
                    ->weight('bold')
                    ->searchable(),

                Tables\Columns\TextColumn::make('badge_text')
                    ->label('Badge')
                    ->badge()
                    ->color('primary')
                    ->searchable(),

                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status Aktif'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListHeroBanners::route('/'),
            'create' => Pages\CreateHeroBanner::route('/create'),
            'edit' => Pages\EditHeroBanner::route('/{record}/edit'),
        ];
    }
}
