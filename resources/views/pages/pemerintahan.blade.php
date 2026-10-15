@extends('layouts.app')

@section('title', 'Pemerintahan Gampong & Tuha Peut')

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
            <span class="text-teal-200">Pemerintahan</span>
            <span class="text-teal-300/70">/</span>
            <span class="text-white font-bold">Keuchik & Lembaga Gampong</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-start sm:items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-md text-white border border-white/30 flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md text-teal-100 border border-white/20 shadow-sm">
                            Tata Kelola Pemerintahan
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-heading tracking-tight drop-shadow-sm">
                        Pemerintahan Gampong & Lembaga Adat
                    </h1>
                    <p class="text-xs sm:text-sm text-teal-100/90 mt-1 max-w-2xl leading-relaxed">
                        Struktur Keuchik, Perangkat Gampong, Tuha Peut, Imuem Meunasah, dan Lembaga Kemasyarakatan Gampong Leu Ue.
                    </p>
                </div>
            </div>

            <a href="{{ route('kehadiran') }}" class="inline-flex items-center gap-2 text-xs font-bold text-white bg-white/15 backdrop-blur-md px-4 py-2 rounded-2xl border border-white/25 shadow-sm self-start md:self-auto hover:bg-white/25 transition">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>Presensi Hari Ini &rarr;</span>
            </a>
        </div>
    </div>
</div>

<div class="py-10 bg-slate-50 dark:bg-slate-950 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- 1. APARATUR PEMERINTAH GAMPONG -->
        <div class="bg-white dark:bg-slate-900 rounded-3xl p-8 lg:p-10 shadow-sm border border-slate-100 dark:border-slate-800">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100 dark:border-slate-800 mb-8">
                <div class="flex items-center gap-2.5">
                    <span class="w-3.5 h-7 bg-[#0d9488] rounded"></span>
                    <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white font-heading">
                        Keuchik & Perangkat Gampong
                    </h2>
                </div>
                <a href="{{ route('kehadiran') }}" class="text-xs font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950 px-3 py-1.5 rounded-full border border-emerald-200 dark:border-emerald-800 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Presensi Hari Ini
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($aparatur as $ap)
                <div class="bg-slate-50 dark:bg-slate-800/60 p-6 rounded-2xl border border-slate-100 dark:border-slate-700 hover:shadow-lg transition">
                    <div class="flex items-center gap-4 mb-4">
                        <img src="{{ $ap->photo ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&auto=format&fit=crop&q=80' }}" alt="{{ $ap->name }}" class="w-14 h-14 rounded-full object-cover border-2 border-[#0d9488]">
                        <div>
                            <h3 class="font-bold text-sm text-slate-900 dark:text-white">{{ $ap->name }}</h3>
                            <p class="text-xs text-[#0d9488] font-bold">{{ $ap->position }}</p>
                            @if($ap->nip && $ap->nip !== '-')
                            <p class="text-[10px] text-slate-400 font-mono">NIP: {{ $ap->nip }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs pt-3 border-t border-slate-200 dark:border-slate-700">
                        <span class="text-slate-500 dark:text-slate-400">Presensi Hari Ini:</span>
                        <span class="font-bold px-2.5 py-0.5 rounded-full text-[10px] {{ $ap->presence_status === 'Hadir' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                            {{ $ap->presence_status }} ({{ $ap->check_in_time ?? '08:00 WIB' }})
                        </span>
                    </div>
                </div>
                @empty
                <p class="text-slate-500 text-sm col-span-full">Belum ada data perangkat gampong.</p>
                @endforelse
            </div>

                <!-- Kasi Kesejahteraan -->
                <div class="bg-slate-50 dark:bg-slate-800/60 p-6 rounded-2xl border border-slate-100 dark:border-slate-700 hover:shadow-lg transition">
                    <div class="flex items-center gap-4 mb-4">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=200&auto=format&fit=crop&q=80" alt="Kasi Kesra" class="w-14 h-14 rounded-full object-cover border-2 border-purple-500">
                        <div>
                            <h3 class="font-bold text-sm text-slate-900 dark:text-white">Cut Nurul Hidayah, S.Kep.</h3>
                            <p class="text-xs text-purple-600 dark:text-purple-400 font-bold">Kasi Kesejahteraan</p>
                        </div>
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                        Mengoordinasikan program bansos BLT, posyandu pencegahan stunting balita, dan sarana ibadah meunasah.
                    </p>
                </div>
            </div>
        </div>

        <!-- 2. TUHA PEUT GAMPONG (LEMBAGA PERMUSYAWARATAN) -->
        <div id="bpd" class="bg-white dark:bg-slate-900 rounded-3xl p-8 lg:p-10 shadow-sm border border-slate-100 dark:border-slate-800">
            <div class="flex items-center gap-2.5 pb-4 border-b border-slate-100 dark:border-slate-800 mb-6">
                <span class="w-3.5 h-7 bg-[#15803d] rounded"></span>
                <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white font-heading">
                    Tuha Peut Gampong (Lembaga Musyawarah & Pengawasan)
                </h2>
            </div>
            <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed mb-6">
                Tuha Peut merupakan lembaga perwujudan demokrasi dan kearifan adat Aceh dalam penyelenggaraan pemerintahan gampong. Berfungsi membahas dan menyepakati rancangan Qanun Gampong bersama Keuchik, menampung aspirasi masyarakat, serta melakukan pengawasan kinerja Keuchik.
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                <div class="bg-slate-50 dark:bg-slate-800 p-4 rounded-xl border border-slate-100 dark:border-slate-700">
                    <p class="font-bold text-slate-900 dark:text-white">Tgk. Hasan Basri</p>
                    <p class="text-[#0d9488] font-semibold">Ketua Tuha Peut</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800 p-4 rounded-xl border border-slate-100 dark:border-slate-700">
                    <p class="font-bold text-slate-900 dark:text-white">Drs. Teuku Mansyur</p>
                    <p class="text-[#0d9488] font-semibold">Wakil Ketua Tuha Peut</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800 p-4 rounded-xl border border-slate-100 dark:border-slate-700">
                    <p class="font-bold text-slate-900 dark:text-white">Cut Zubaidah</p>
                    <p class="text-[#0d9488] font-semibold">Sekretaris Tuha Peut</p>
                </div>
            </div>
        </div>

        <!-- 3. LEMBAGA KEMASYARAKATAN (PKK, PEMUDA, BUMG) -->
        <div id="lembaga" class="bg-white dark:bg-slate-900 rounded-3xl p-8 lg:p-10 shadow-sm border border-slate-100 dark:border-slate-800">
            <div class="flex items-center gap-2.5 pb-4 border-b border-slate-100 dark:border-slate-800 mb-6">
                <span class="w-3.5 h-7 bg-[#eab308] rounded"></span>
                <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white font-heading">
                    Lembaga Kemasyarakatan Gampong
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-xs">
                <div class="p-6 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700">
                    <h3 class="font-bold text-sm text-slate-900 dark:text-white mb-2 text-[#0d9488]">Tim Penggerak PKK Gampong</h3>
                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed mb-3">Mengoordinasikan 10 Program Pokok PKK, pembinaan keluarga sakinah, dan posyandu balita.</p>
                    <p class="font-semibold text-slate-700 dark:text-slate-300">Ketua: Ny. Cut Maryam Razali</p>
                </div>

                <div class="p-6 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700">
                    <h3 class="font-bold text-sm text-slate-900 dark:text-white mb-2 text-[#15803d] dark:text-emerald-400">Pemuda & Karang Taruna Gampong</h3>
                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed mb-3">Wadah kepemudaan dalam kegiatan olahraga, maulid nabi, gotong royong meunasah, dan kepedulian sosial.</p>
                    <p class="font-semibold text-slate-700 dark:text-slate-300">Ketua: Muhammad Ilham</p>
                </div>

                <div class="p-6 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700">
                    <h3 class="font-bold text-sm text-slate-900 dark:text-white mb-2 text-[#eab308]">Badan Usaha Milik Gampong (BUMG)</h3>
                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed mb-3">Pilar ekonomi gampong dalam pengelolaan pupuk pertanian, pemasaran produk UMKM, dan aset gampong.</p>
                    <p class="font-semibold text-slate-700 dark:text-slate-300">Direktur: Teuku Faisal</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
