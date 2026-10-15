<?php

namespace App\Filament\Widgets;

use App\Models\Complaint;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentComplaints extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Aspirasi & Laporan Aduan Warga Terbaru';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Complaint::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Warga')
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Aduan / Usulan')
                    ->limit(40),

                Tables\Columns\TextColumn::make('content')
                    ->label('Deskripsi Laporan')
                    ->limit(50)
                    ->color('gray'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y, H:i'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'danger',
                        'resolved' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Belum Diproses',
                        'resolved' => 'Ditindaklanjuti',
                        default => ucfirst($state),
                    }),
            ])
            ->actions([
                Tables\Actions\Action::make('tindaklanjuti')
                    ->label('Tanggapi & Selesaikan')
                    ->icon('heroicon-m-chat-bubble-left-right')
                    ->color('success')
                    ->form([
                        \Filament\Forms\Components\Textarea::make('reply')
                            ->label('Tanggapan Aparatur Gampong')
                            ->required()
                            ->rows(3)
                            ->placeholder('Tuliskan langkah tindak lanjut atau tanggapan resmi gampong...'),
                    ])
                    ->action(function (Complaint $record, array $data): void {
                        $record->update([
                            'reply' => $data['reply'],
                            'status' => 'resolved',
                        ]);
                    }),
            ]);
    }
}
