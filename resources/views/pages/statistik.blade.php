@extends('layouts.app')

@section('title', 'Data & Statistik Kependudukan Gampong')

@section('content')

<!-- Header Banner & Breadcrumb (Harmonious Theme & High Contrast) -->
<div class="relative bg-gradient-to-r from-[#15803d] via-[#0f766e] to-[#0d9488] text-white py-8 sm:py-10 px-4 overflow-hidden shadow-md">
    <!-- Subtle Background Glow Elements -->
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
            <span class="text-teal-200">Data & Statistik</span>
            <span class="text-teal-300/70">/</span>
            <span class="text-white font-bold">Kependudukan & Bansos</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-start sm:items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-md text-white border border-white/30 flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md text-teal-100 border border-white/20 shadow-sm">
                            Data Demografi Terbuka
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-heading tracking-tight drop-shadow-sm">
                        Statistik Kependudukan & Bansos
                    </h1>
                    <p class="text-xs sm:text-sm text-teal-100/90 mt-1 max-w-2xl leading-relaxed">
                        Visualisasi data kependudukan 4 dusun, kelompok umur, pendidikan, mata pencaharian, dan penerima manfaat bantuan sosial Gampong Leu Ue.
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-2 text-xs font-bold text-white bg-white/15 backdrop-blur-md px-4 py-2 rounded-2xl border border-white/25 shadow-sm self-start md:self-auto">
                <span class="w-2.5 h-2.5 rounded-full bg-amber-400 animate-pulse"></span>
                <span>Periode: <strong>Tahun 2026</strong></span>
            </div>
        </div>
    </div>
</div>

<div class="py-10 bg-slate-50 dark:bg-slate-950 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <!-- 1. STAT COUNTER RINGKAS -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-slate-900 p-6 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-800 text-center">
                <p class="text-xs text-slate-500 font-bold uppercase tracking-wider mb-1">Total Penduduk</p>
                <h3 class="text-3xl font-extrabold text-[#0d9488] font-heading">{{ number_format($statistik['total_penduduk'], 0, ',', '.') }}</h3>
                <p class="text-[11px] text-slate-400 mt-1">Jiwa Terdata</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-800 text-center">
                <p class="text-xs text-slate-500 font-bold uppercase tracking-wider mb-1">Kepala Keluarga</p>
                <h3 class="text-3xl font-extrabold text-[#15803d] dark:text-emerald-400 font-heading">{{ number_format($statistik['total_kk'], 0, ',', '.') }}</h3>
                <p class="text-[11px] text-slate-400 mt-1">Kartu Keluarga (KK)</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-800 text-center">
                <p class="text-xs text-slate-500 font-bold uppercase tracking-wider mb-1">Laki-Laki</p>
                <h3 class="text-3xl font-extrabold text-[#42b095] font-heading">{{ number_format($statistik['pria'], 0, ',', '.') }}</h3>
                <p class="text-[11px] text-slate-400 mt-1">{{ round(($statistik['pria'] / $statistik['total_penduduk']) * 100, 1) }}% dari total</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-800 text-center">
                <p class="text-xs text-slate-500 font-bold uppercase tracking-wider mb-1">Perempuan</p>
                <h3 class="text-3xl font-extrabold text-amber-500 font-heading">{{ number_format($statistik['wanita'], 0, ',', '.') }}</h3>
                <p class="text-[11px] text-slate-400 mt-1">{{ round(($statistik['wanita'] / $statistik['total_penduduk']) * 100, 1) }}% dari total</p>
            </div>
        </div>

        <!-- 2. CHARTS GRID (KELOMPOK USIA & TINGKAT PENDIDIKAN) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Kelompok Usia -->
            <div class="bg-white dark:bg-slate-900 p-8 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-800">
                <h3 class="text-base font-extrabold text-slate-900 dark:text-white mb-6 flex items-center gap-2 font-heading">
                    <span class="w-2.5 h-5 bg-[#0d9488] rounded"></span>
                    Distribusi Kelompok Usia Penduduk
                </h3>

                <div class="space-y-4 text-xs">
                    @foreach($statistik['usia'] as $usia)
                    <div>
                        <div class="flex justify-between items-center mb-1 font-semibold text-slate-700 dark:text-slate-200">
                            <span>{{ $usia['kelompok'] }}</span>
                            <span class="font-mono text-[#0d9488] font-bold">{{ $usia['jumlah'] }} Jiwa ({{ $usia['persen'] }}%)</span>
                        </div>
                        <div class="w-full h-3 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-teal-400 to-[#0d9488] rounded-full" style="width: {{ $usia['persen'] * 2 }}%;"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Tingkat Pendidikan -->
            <div class="bg-white dark:bg-slate-900 p-8 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-800">
                <h3 class="text-base font-extrabold text-slate-900 dark:text-white mb-6 flex items-center gap-2 font-heading">
                    <span class="w-2.5 h-5 bg-[#15803d] rounded"></span>
                    Tingkat Pendidikan Terakhir
                </h3>

                <div class="space-y-4 text-xs">
                    @foreach($statistik['pendidikan'] as $pend)
                    <div>
                        <div class="flex justify-between items-center mb-1 font-semibold text-slate-700 dark:text-slate-200">
                            <span>{{ $pend['tingkat'] }}</span>
                            <span class="font-mono text-[#15803d] dark:text-emerald-400 font-bold">{{ $pend['jumlah'] }} Orang ({{ $pend['persen'] }}%)</span>
                        </div>
                        <div class="w-full h-3 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-green-500 to-[#15803d] rounded-full" style="width: {{ $pend['persen'] * 2.5 }}%;"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- 3. CHARTS GRID (MATA PENCAHARIAN & AGAMA) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Mata Pencaharian -->
            <div class="bg-white dark:bg-slate-900 p-8 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-800">
                <h3 class="text-base font-extrabold text-slate-900 dark:text-white mb-6 flex items-center gap-2 font-heading">
                    <span class="w-2.5 h-5 bg-[#42b095] rounded"></span>
                    Mata Pencaharian & Profesi Utama
                </h3>

                <div class="space-y-4 text-xs">
                    @foreach($statistik['pekerjaan'] as $pek)
                    <div>
                        <div class="flex justify-between items-center mb-1 font-semibold text-slate-700 dark:text-slate-200">
                            <span>{{ $pek['pekerjaan'] }}</span>
                            <span class="font-mono text-emerald-600 dark:text-emerald-400 font-bold">{{ $pek['jumlah'] }} Orang ({{ $pek['persen'] }}%)</span>
                        </div>
                        <div class="w-full h-3 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-emerald-400 to-[#42b095] rounded-full" style="width: {{ $pek['persen'] * 2 }}%;"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Wilayah Dusun & Agama -->
            <div class="bg-white dark:bg-slate-900 p-8 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-800 flex flex-col justify-between">
                <div>
                    <h3 class="text-base font-extrabold text-slate-900 dark:text-white mb-6 flex items-center gap-2 font-heading">
                        <span class="w-2.5 h-5 bg-amber-500 rounded"></span>
                        Sebaran Penduduk per Dusun
                    </h3>

                    <div class="space-y-4 text-xs mb-8">
                        @foreach($statistik['dusun'] as $dusun)
                        <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700 flex justify-between items-center">
                            <div>
                                <h4 class="font-bold text-slate-900 dark:text-white text-sm">{{ $dusun['nama'] }}</h4>
                                <p class="text-slate-400 text-[11px] mt-0.5">{{ $dusun['kk'] }} Kepala Keluarga</p>
                            </div>
                            <div class="text-right">
                                <span class="font-mono font-bold text-base text-[#0d9488]">{{ $dusun['jiwa'] }}</span>
                                <span class="text-[10px] text-slate-400 block">Jiwa</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-xs text-slate-400 uppercase tracking-wider mb-2">Komposisi Agama</h4>
                    <div class="flex gap-2">
                        @foreach($statistik['agama'] as $ag)
                        <div class="flex-1 p-2.5 rounded-xl bg-slate-50 dark:bg-slate-800 text-center border border-slate-100 dark:border-slate-700">
                            <p class="text-[10px] text-slate-400 font-semibold">{{ $ag['agama'] }}</p>
                            <p class="font-mono font-bold text-xs text-slate-800 dark:text-white mt-0.5">{{ $ag['persen'] }}%</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

        <!-- 4. DATA BANTUAN SOSIAL (BANSOS) -->
        <div id="bansos" class="bg-white dark:bg-slate-900 rounded-3xl p-8 lg:p-10 shadow-sm border border-slate-100 dark:border-slate-800">
            <div class="flex items-center gap-2.5 pb-4 border-b border-slate-100 dark:border-slate-800 mb-6">
                <span class="w-3.5 h-7 bg-emerald-500 rounded"></span>
                <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white font-heading">
                    Data Bantuan Sosial & Perlindungan Warga 2026
                </h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($statistik['bansos'] as $b)
                <div class="p-6 rounded-2xl bg-emerald-50/50 dark:bg-slate-800 border border-emerald-100 dark:border-slate-700">
                    <span class="text-[10px] uppercase font-extrabold tracking-wider text-emerald-700 dark:text-emerald-400 bg-emerald-100 dark:bg-emerald-950 px-2.5 py-0.5 rounded-full">
                        Penerima Manfaat
                    </span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white mt-3 mb-1">{{ $b['program'] }}</h4>
                    <p class="text-2xl font-extrabold text-emerald-600 dark:text-emerald-400 font-mono my-2">{{ $b['kpm'] }} <span class="text-xs font-normal text-slate-400">KPM</span></p>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400">{{ $b['keterangan'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection
