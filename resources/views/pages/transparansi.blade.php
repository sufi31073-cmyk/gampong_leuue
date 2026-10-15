@extends('layouts.app')

@section('title', 'Transparansi APBGampong & Realisasi Anggaran')

@section('content')

<!-- Header Banner & Breadcrumb (Harmonious Theme & High Contrast) -->
<div class="relative bg-gradient-to-r from-[#15803d] via-[#0f766e] to-[#0d9488] text-white py-8 sm:py-10 px-4 overflow-hidden shadow-md">
    <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute left-1/3 -top-10 w-48 h-48 bg-emerald-400/15 rounded-full blur-2xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs font-semibold text-teal-100/90 mb-3" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-white hover:underline transition flex items-center gap-1">
                <svg class="w-3.5 h-3.5 text-teal-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Beranda
            </a>
            <span class="text-teal-300/70">/</span>
            <span class="text-teal-200">Keuangan</span>
            <span class="text-teal-300/70">/</span>
            <span class="text-white font-bold">Transparansi APBGampong</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-start sm:items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-md text-white border border-white/30 flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md text-teal-100 border border-white/20 shadow-sm">
                            Keterbukaan Informasi Keuangan
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-heading tracking-tight drop-shadow-sm">
                        Transparansi APBGampong & Dana Desa 2026
                    </h1>
                    <p class="text-xs sm:text-sm text-teal-100/90 mt-1 max-w-2xl leading-relaxed">
                        Akses terbuka rincian Anggaran Pendapatan dan Belanja Gampong (APBGampong) Leu Ue, serapan bidang pembangunan, dan Laporan Pertanggungjawaban (LPJ).
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-10 bg-slate-50 dark:bg-slate-950 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- 1. SUMMARY CARDS APBGAMPONG -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
            <!-- Pendapatan -->
            <div class="bg-white dark:bg-slate-900 p-8 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-800">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-2">Total Pendapatan Gampong</span>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-[#0d9488] font-heading">
                    Rp {{ number_format($apbdesDetail['pendapatan']['total'], 0, ',', '.') }}
                </h3>
                <p class="text-xs text-emerald-600 dark:text-emerald-400 font-bold mt-2">Tercapai 96.4% dari Target</p>
            </div>

            <!-- Belanja -->
            <div class="bg-white dark:bg-slate-900 p-8 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-800">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-2">Total Belanja Gampong</span>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-[#15803d] dark:text-emerald-400 font-heading">
                    Rp {{ number_format($apbdesDetail['belanja']['total'], 0, ',', '.') }}
                </h3>
                <p class="text-xs text-emerald-600 dark:text-emerald-400 font-bold mt-2">Serapan Anggaran 88.5%</p>
            </div>

            <!-- Pembiayaan -->
            <div class="bg-white dark:bg-slate-900 p-8 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-800">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-2">Sisa Lebih Pembiayaan (SiLPA)</span>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-emerald-600 dark:text-emerald-400 font-heading">
                    Rp {{ number_format($apbdesDetail['pembiayaan']['sisa'], 0, ',', '.') }}
                </h3>
                <p class="text-xs text-slate-400 font-medium mt-2">Kas Gampong Terkelola Baik</p>
            </div>
        </div>

        <!-- 2. RINCIAN PENDAPATAN & BELANJA PER BIDANG -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Sumber Pendapatan -->
            <div class="bg-white dark:bg-slate-900 rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-slate-800">
                <div class="flex items-center gap-2.5 pb-4 border-b border-slate-100 dark:border-slate-800 mb-6">
                    <span class="w-3.5 h-7 bg-[#0d9488] rounded"></span>
                    <h3 class="text-lg font-extrabold text-slate-900 dark:text-white font-heading">
                        Rincian Sumber Pendapatan Gampong
                    </h3>
                </div>

                <div class="space-y-4 text-xs">
                    @foreach($apbdesDetail['pendapatan']['items'] as $item)
                    <div>
                        <div class="flex justify-between items-center mb-1 font-semibold text-slate-700 dark:text-slate-200">
                            <span>{{ $item['sumber'] }}</span>
                            <span class="font-mono text-[#0d9488] font-bold">Rp {{ number_format($item['nominal'], 0, ',', '.') }}</span>
                        </div>
                        <div class="w-full h-2.5 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-teal-400 to-[#0d9488] rounded-full" style="width: {{ $item['persen'] }}%;"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Rincian Belanja per Bidang -->
            <div class="bg-white dark:bg-slate-900 rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-slate-800">
                <div class="flex items-center gap-2.5 pb-4 border-b border-slate-100 dark:border-slate-800 mb-6">
                    <span class="w-3.5 h-7 bg-[#15803d] rounded"></span>
                    <h3 class="text-lg font-extrabold text-slate-900 dark:text-white font-heading">
                        Realisasi Belanja per Bidang
                    </h3>
                </div>

                <div class="space-y-4 text-xs">
                    @foreach($apbdesDetail['belanja']['items'] as $belanja)
                    <div>
                        <div class="flex justify-between items-center mb-1 font-semibold text-slate-700 dark:text-slate-200">
                            <span class="truncate pr-2">{{ $belanja['bidang'] }}</span>
                            <span class="font-mono text-[#15803d] dark:text-emerald-400 font-bold flex-shrink-0">{{ $belanja['persen'] }}%</span>
                        </div>
                        <div class="w-full h-2.5 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-green-500 to-[#15803d] rounded-full" style="width: {{ $belanja['persen'] }}%;"></div>
                        </div>
                        <div class="flex justify-between text-[10px] text-slate-400 mt-1 font-mono">
                            <span>Anggaran: Rp {{ number_format($belanja['nominal'], 0, ',', '.') }}</span>
                            <span>Realisasi: Rp {{ number_format($belanja['realisasi'], 0, ',', '.') }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- 3. UNDUH DOKUMEN QANUN & LPJ PUBLIK -->
        <div class="bg-white dark:bg-slate-900 rounded-3xl p-8 lg:p-10 shadow-sm border border-slate-100 dark:border-slate-800">
            <div class="flex items-center gap-2.5 pb-4 border-b border-slate-100 dark:border-slate-800 mb-6">
                <span class="w-3.5 h-7 bg-emerald-500 rounded"></span>
                <h3 class="text-xl font-extrabold text-slate-900 dark:text-white font-heading">
                    Unduh Dokumen Publik & Laporan Pertanggungjawaban (LPJ)
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($transparansi as $t)
                <div class="p-5 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700 flex flex-col justify-between">
                    <div>
                        <span class="text-[10px] uppercase font-bold text-teal-600 bg-teal-50 dark:bg-slate-900 px-2.5 py-0.5 rounded-full">
                            {{ $t->type == 'apbg' ? 'Laporan APBGampong' : 'Dokumen Qanun Gampong' }}
                        </span>
                        <h4 class="font-bold text-sm text-slate-900 dark:text-white mt-2 mb-4 leading-snug">{{ $t->title }}</h4>
                    </div>

                    <div class="flex items-center justify-between pt-3 border-t border-slate-200 dark:border-slate-700 text-xs">
                        <span class="text-slate-400">{{ $t->created_at->format('d M Y') }}</span>
                        <a href="{{ asset('storage/' . $t->file_path) }}" target="_blank" class="inline-flex items-center gap-1.5 bg-[#0d9488] hover:bg-[#0f766e] text-white font-bold px-4 py-1.5 rounded-xl shadow transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Unduh PDF
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection
