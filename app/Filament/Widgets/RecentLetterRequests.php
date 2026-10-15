<?php

namespace App\Filament\Widgets;

use App\Models\LetterRequest;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentLetterRequests extends BaseWidget
{
    protected static ?int $sort = 1;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Permohonan E-Surat Terbaru Warga';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                LetterRequest::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('resi_number')
                    ->label('Nomor Resi')
                    ->badge()
                    ->color('primary')
                    ->searchable()
                    ->fontFamily('mono'),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pemohon')
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('nik')
                    ->label('NIK')
                    ->fontFamily('mono')
                    ->copyable(),

                Tables\Columns\TextColumn::make('template.name')
                    ->label('Jenis Surat')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'info',
                        'ready' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Menunggu Verifikasi',
                        'processing' => 'Sedang Diproses',
                        'ready' => 'Selesai & Ditandatangani',
                        'rejected' => 'Ditolak',
                        default => ucfirst($state),
                    }),
            ])
            ->actions([
                Tables\Actions\Action::make('proses')
                    ->label('Tandai Diproses')
                    ->icon('heroicon-m-arrow-path')
                    ->color('info')
                    ->visible(fn (LetterRequest $record) => $record->status === 'pending')
                    ->action(fn (LetterRequest $record) => $record->update(['status' => 'processing'])),

                Tables\Actions\Action::make('selesai')
                    ->label('Tandai Selesai')
                    ->icon('heroicon-m-check-circle')
                    ->color('success')
                    ->visible(fn (LetterRequest $record) => in_array($record->status, ['pending', 'processing']))
                    ->action(fn (LetterRequest $record) => $record->update(['status' => 'ready'])),
            ]);
    }
}
