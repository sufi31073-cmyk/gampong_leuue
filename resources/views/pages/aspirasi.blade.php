@extends('layouts.app')

@section('title', 'Kotak Aspirasi & Pengaduan Warga')

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
            <span class="text-teal-200">Layanan Warga</span>
            <span class="text-teal-300/70">/</span>
            <span class="text-white font-bold">Aspirasi & Pengaduan</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-start sm:items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-md text-white border border-white/30 flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md text-teal-100 border border-white/20 shadow-sm">
                            Partisipasi Publik
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-heading tracking-tight drop-shadow-sm">
                        Kotak Aspirasi & Pengaduan Warga
                    </h1>
                    <p class="text-xs sm:text-sm text-teal-100/90 mt-1 max-w-2xl leading-relaxed">
                        Sampaikan masukan, saran pembangunan persawahan & fasilitas umum Gampong Leu Ue secara aman, transparan, dan terpercaya.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-10 bg-slate-50 dark:bg-slate-950 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Alerts -->
        @if(session('success'))
            <div class="bg-emerald-50 dark:bg-emerald-950/80 border-2 border-emerald-300 dark:border-emerald-700 text-emerald-900 dark:text-emerald-200 rounded-3xl p-6 shadow-md flex items-start gap-4">
                <div class="w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center flex-shrink-0 shadow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-extrabold text-base mb-1 font-heading">Laporan Diterima!</h3>
                    <p class="text-xs sm:text-sm leading-relaxed">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- 1. FORM ASPIRASI (6 KOLOM) -->
            <div class="lg:col-span-6 bg-white dark:bg-slate-900 rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-slate-800">
                <div class="flex items-center gap-2.5 pb-4 border-b border-slate-100 dark:border-slate-800 mb-6">
                    <span class="w-3.5 h-7 bg-[#0d9488] rounded"></span>
                    <h2 class="text-xl font-extrabold text-slate-900 dark:text-white font-heading">
                        Tulis Aspirasi / Pengaduan
                    </h2>
                </div>

                <form action="{{ route('aspirasi.submit') }}" method="POST" class="space-y-4 text-xs sm:text-sm">
                    @csrf
                    
                    <div>
                        <label class="block font-bold text-slate-700 dark:text-slate-200 mb-1">Nomor Induk Kependudukan (NIK):</label>
                        <input type="text" name="nik" required maxlength="16" pattern="[0-9]{16}" placeholder="16 Digit NIK e-KTP" class="w-full px-4 py-2.5 rounded-2xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-[#0d9488] focus:outline-none font-mono">
                        @error('nik') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 dark:text-slate-200 mb-1">Nama Lengkap:</label>
                        <input type="text" name="name" required placeholder="Nama Anda" class="w-full px-4 py-2.5 rounded-2xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-[#0d9488] focus:outline-none">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 dark:text-slate-200 mb-1">Judul Laporan / Usulan:</label>
                        <input type="text" name="title" required placeholder="Cth: Usulan Perbaikan Lampu Jalan Dusun Mata Ie" class="w-full px-4 py-2.5 rounded-2xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-[#0d9488] focus:outline-none">
                        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 dark:text-slate-200 mb-1">Deskripsi Lengkap:</label>
                        <textarea name="content" required rows="4" placeholder="Jelaskan secara detail usulan atau aduan Anda..." class="w-full px-4 py-2.5 rounded-2xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-[#0d9488] focus:outline-none"></textarea>
                        @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="w-full bg-[#0d9488] hover:bg-[#0f766e] text-white font-extrabold py-3.5 px-6 rounded-2xl shadow-lg transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        Kirimkan Aspirasi
                    </button>
                </form>
            </div>

            <!-- 2. DAFTAR TANGGAPAN PUBLIK (6 KOLOM) -->
            <div class="lg:col-span-6 space-y-4">
                <div class="flex items-center gap-2.5 pb-4 border-b border-slate-100 dark:border-slate-800 mb-4">
                    <span class="w-3.5 h-7 bg-[#15803d] rounded"></span>
                    <h2 class="text-xl font-extrabold text-slate-900 dark:text-white font-heading">
                        Aspirasi & Tindak Lanjut Terbuka
                    </h2>
                </div>

                @forelse($complaints as $c)
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 space-y-3">
                    <div class="flex items-center justify-between text-xs">
                        <span class="font-bold text-slate-900 dark:text-white">{{ $c->name }}</span>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full font-bold {{ $c->status == 'resolved' ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-950 dark:text-emerald-300' : 'bg-blue-100 text-blue-800' }}">
                            {{ $c->status == 'resolved' ? 'Ditindaklanjuti' : 'Diverifikasi' }}
                        </span>
                    </div>

                    <h3 class="font-bold text-sm text-slate-800 dark:text-slate-100">{{ $c->title }}</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">{{ $c->content }}</p>

                    @if($c->reply)
                    <div class="p-3 bg-teal-50 dark:bg-slate-800/80 rounded-2xl border border-teal-100 dark:border-slate-700 text-xs">
                        <p class="font-bold text-[#0d9488] dark:text-teal-300 mb-0.5">Tanggapan Perangkat Gampong:</p>
                        <p class="text-slate-700 dark:text-slate-300">{{ $c->reply }}</p>
                    </div>
                    @endif
                </div>
                @empty
                <p class="text-center text-slate-400 py-10 bg-white dark:bg-slate-900 rounded-3xl">Belum ada aspirasi publik.</p>
                @endforelse
            </div>

        </div>

    </div>
</div>

@endsection
