<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;

// 1. Beranda Utama (Konsep Blang Merang / DeNava OpenSID)
Route::get('/', [FrontEndController::class, 'index'])->name('home');

// 2. Profil Desa & Wilayah
Route::get('/profil', [FrontEndController::class, 'profil'])->name('profil');

// 3. Pemerintahan Desa (Struktur Aparatur, BPD, Lembaga)
Route::get('/pemerintahan', [FrontEndController::class, 'pemerintahan'])->name('pemerintahan');

// 4. Halaman Kehadiran Aparatur (Fitur Khas Blang Merang)
Route::get('/kehadiran', [FrontEndController::class, 'kehadiran'])->name('kehadiran');

// 5. Data & Statistik Kependudukan & Demografi
Route::get('/statistik', [FrontEndController::class, 'statistik'])->name('statistik');

// 6. Portal Berita, Artikel & Informasi Publik
Route::get('/informasi', [FrontEndController::class, 'informasi'])->name('informasi');
Route::get('/berita/{slug}', [FrontEndController::class, 'beritaDetail'])->name('berita.detail');

// 7. Lapak UMKM Warga & Potensi Wisata Desa
Route::get('/lapak', [FrontEndController::class, 'lapak'])->name('lapak');

// 8. Peta Wilayah Interaktif Leaflet GIS
Route::get('/peta', [FrontEndController::class, 'peta'])->name('peta');

// 9. Layanan Mandiri (E-Surat & Tracking Resi)
Route::get('/e-surat', [FrontEndController::class, 'esurat'])->name('esurat');
Route::post('/e-surat', [FrontEndController::class, 'submitEsurat'])->name('esurat.submit')->middleware('throttle:6,1');
Route::post('/e-surat/track', [FrontEndController::class, 'trackEsurat'])->name('esurat.track')->middleware('throttle:15,1');

// 10. Kotak Aspirasi & Laporan Pengaduan Warga
Route::get('/aspirasi', [FrontEndController::class, 'aspirasi'])->name('aspirasi');
Route::post('/aspirasi', [FrontEndController::class, 'submitAspirasi'])->name('aspirasi.submit')->middleware('throttle:6,1');

// 11. Transparansi APBDes & Dokumen LPJ
Route::get('/transparansi', [FrontEndController::class, 'transparansi'])->name('transparansi');

// 12. Cetak PDF Surat (Admin)
Route::get('/admin/cetak-surat/{id}', function ($id) {
    $surat = \App\Models\LetterRequest::with('template')->findOrFail($id);
    return \Spatie\LaravelPdf\Support\pdf()
        ->view('print.surat', compact('surat'))
        ->format('a4')
        ->name('Surat-'.$surat->resi_number.'.pdf')
        ->download();
})->name('admin.cetak-surat')->middleware('auth');
