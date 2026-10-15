@extends('layouts.app')

@section('title', 'Lapak UMKM & Potensi Wisata Alam')

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
            <span class="text-teal-200">Perekonomian</span>
            <span class="text-teal-300/70">/</span>
            <span class="text-white font-bold">Lapak UMKM & Wisata</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-start sm:items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-md text-white border border-white/30 flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md text-teal-100 border border-white/20 shadow-sm">
                            Ekonomi Kreatif & Wisata
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-heading tracking-tight drop-shadow-sm">
                        Lapak UMKM & Destinasi Wisata Alam
                    </h1>
                    <p class="text-xs sm:text-sm text-teal-100/90 mt-1 max-w-2xl leading-relaxed">
                        Dukung produk lokal unggulan warga gampong dan jelajahi pesona alam Glee Taron serta situs cagar budaya Makam Meurah.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-10 bg-slate-50 dark:bg-slate-950 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- 1. LAPAK PRODUK UMKM WARGA -->
        <div id="umkm" class="space-y-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-slate-200 dark:border-slate-800">
                <div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Etalase Digital BUMG</span>
                    <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white font-heading">
                        Produk & Komoditas Unggulan Gampong
                    </h2>
                </div>
                <span class="text-xs text-slate-500">Hubungi langsung via WhatsApp penjual</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($umkms as $p)
                <div class="bg-white dark:bg-slate-900 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl border border-slate-100 dark:border-slate-800 transition duration-300 flex flex-col group">
                    <div class="aspect-square bg-slate-100 dark:bg-slate-800 overflow-hidden relative">
                        <img src="{{ $p->image ?? 'https://images.unsplash.com/photo-1544816155-12df9643f363?w=500&auto=format&fit=crop&q=80' }}" alt="{{ $p->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-[#0d9488] text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow">
                            {{ $p->owner_name ?? 'UMKM Gampong' }}
                        </span>
                    </div>

                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-extrabold text-sm text-slate-900 dark:text-white line-clamp-1 font-heading">{{ $p->name }}</h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400 line-clamp-2 mt-1 mb-3 leading-relaxed">{{ $p->description }}</p>
                            <p class="font-extrabold text-base text-[#15803d] dark:text-emerald-400 font-mono">
                                Rp {{ number_format($p->price, 0, ',', '.') }}
                            </p>
                        </div>

                        <a href="https://api.whatsapp.com/send?phone={{ $p->contact_phone ?? '6281269082070' }}&text={{ urlencode('Halo, saya tertarik dengan produk ' . $p->name . ' dari Lapak Gampong Leu Ue.') }}" target="_blank" class="mt-4 w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded-xl text-xs flex items-center justify-center gap-1.5 shadow transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.993L2 22l5.233-1.237a9.994 9.994 0 004.779 1.217h.004c5.505 0 9.988-4.478 9.989-9.984 0-2.669-1.037-5.176-2.922-7.062A9.935 9.935 0 0012.012 2z"/></svg>
                            Pesan via WhatsApp
                        </a>
                    </div>
                </div>
                @empty
                <p class="col-span-4 text-center text-slate-400 py-10">Belum ada produk UMKM yang ditampilkan.</p>
                @endforelse
            </div>
        </div>

        <!-- 2. DESTINASI WISATA ALAM & BUDAYA -->
        <div id="wisata" class="space-y-8">
            <div class="flex items-center gap-2.5 pb-4 border-b border-slate-200 dark:border-slate-800">
                <span class="w-3.5 h-7 bg-[#0d9488] rounded"></span>
                <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white font-heading">
                    Destinasi Wisata Alam & Warisan Sejarah
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($wisata as $w)
                <div class="bg-white dark:bg-slate-900 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl border border-slate-100 dark:border-slate-800 transition duration-300 group">
                    <div class="aspect-video bg-slate-100 dark:bg-slate-800 overflow-hidden relative">
                        <img src="{{ $w->image ?? 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=700&auto=format&fit=crop&q=80' }}" alt="{{ $w->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @if($w->entry_fee == 0)
                        <span class="absolute top-4 right-4 bg-emerald-500 text-white text-xs font-extrabold px-3 py-1 rounded-full shadow">
                            GRATIS
                        </span>
                        @endif
                    </div>

                    <div class="p-6">
                        <h3 class="font-extrabold text-lg text-slate-900 dark:text-white font-heading mb-2">{{ $w->name }}</h3>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed mb-4">{{ $w->description }}</p>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-slate-100 dark:border-slate-800 text-xs text-slate-400">
                            <span>📍 Gampong Leu Ue, Aceh Besar</span>
                            <a href="{{ route('peta') }}" class="font-bold text-[#0d9488] hover:underline flex items-center gap-1">
                                Lihat Titik Peta &rarr;
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="col-span-2 text-center text-slate-400 py-10">Belum ada data destinasi wisata.</p>
                @endforelse
            </div>
        </div>

    </div>
</div>

@endsection
