<?php

namespace App\Filament\Widgets;

use App\Models\LetterRequest;
use App\Models\Complaint;
use App\Models\Post;
use App\Models\Umkm;
use App\Models\Transparency;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected static ?int $sort = -5;

    protected function getStats(): array
    {
        $pendingLetters = LetterRequest::where('status', 'pending')->count();
        $totalLetters = LetterRequest::count();

        $pendingComplaints = Complaint::where('status', 'pending')->count();
        $totalComplaints = Complaint::count();

        $publishedPosts = Post::where('is_published', true)->count();
        $totalPosts = Post::count();

        $totalUmkm = Umkm::count();
        $totalTransparencies = Transparency::count();

        return [
            Stat::make('Pengajuan E-Surat Warga', $totalLetters)
                ->description($pendingLetters > 0 ? "⚠️ {$pendingLetters} permohonan butuh verifikasi" : "Semua permohonan telah diproses")
                ->descriptionIcon($pendingLetters > 0 ? 'heroicon-m-clock' : 'heroicon-m-check-circle')
                ->chart([3, 5, 2, 8, 4, 9, $totalLetters])
                ->color($pendingLetters > 0 ? 'warning' : 'success'),

            Stat::make('Kotak Aspirasi & Aduan', $totalComplaints)
                ->description($pendingComplaints > 0 ? "💬 {$pendingComplaints} aduan belum ditindaklanjuti" : "Semua aduan telah ditindaklanjuti")
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->chart([1, 4, 3, 6, 2, 5, $totalComplaints])
                ->color($pendingComplaints > 0 ? 'danger' : 'info'),

            Stat::make('Warta & Artikel Gampong', $publishedPosts)
                ->description("Diterbitkan dari total {$totalPosts} artikel")
                ->descriptionIcon('heroicon-m-newspaper')
                ->chart([2, 4, 6, 8, 10, 12, $publishedPosts])
                ->color('success'),

            Stat::make('Transparansi APBG 2026', 'Rp 1.450 M')
                ->description("Realisasi 88.5% | {$totalTransparencies} Qanun PDF")
                ->descriptionIcon('heroicon-m-banknotes')
                ->chart([10, 20, 45, 60, 75, 90, 96])
                ->color('primary'),

            Stat::make('Etalase UMKM Gampong', $totalUmkm)
                ->description('Produk & Komoditas Lokal Active')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->chart([2, 3, 5, 6, 8, 9, $totalUmkm])
                ->color('info'),
        ];
    }
}
