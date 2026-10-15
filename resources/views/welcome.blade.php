@extends('layouts.app')

@section('title', 'Beranda Utama Portal Gampong Leu Ue')

@section('content')

<!-- 1. HERO BANNER CAROUSEL / IMAGE SLIDER (Rich Aesthetic Design) -->
<div class="relative bg-slate-950 text-white overflow-hidden select-none">
    
    <!-- ==================== HERO BANNER CAROUSEL (DYNAMIC FROM ADMIN) ==================== -->
    <div id="hero-banner-carousel" class="relative h-[480px] sm:h-[540px] lg:h-[620px] w-full overflow-hidden group">
        
        @forelse($heroBanners as $index => $banner)
        <div class="hero-slider-slide {{ $index === 0 ? 'active' : '' }}">
            <!-- Background Image with Ken Burns Effect -->
            <img src="{{ $banner->image ?? 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1600&auto=format&fit=crop&q=80' }}" alt="{{ $banner->title }}" class="hero-slide-bg absolute inset-0 w-full h-full object-cover opacity-50">
            
            <!-- Dark Gradients & Color Overlays -->
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/50 to-slate-900/30"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#15803d]/85 via-slate-950/40 to-[#0d9488]/60"></div>
            
            <!-- Slide Content -->
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center text-center lg:text-left z-10 hero-content-anim">
                <div class="max-w-3xl">


                    <!-- Title -->
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-tight font-heading mb-3 drop-shadow-lg">
                        {{ $banner->title }}
                    </h1>
                    
                    @if($banner->subtitle)
                    <p class="text-xs sm:text-sm text-slate-200 leading-relaxed mb-8 max-w-2xl mx-auto lg:mx-0">
                        {{ $banner->subtitle }}
                    </p>
                    @endif

                    <!-- CTAs -->
                    @if($banner->cta_text && $banner->cta_url)
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3.5">
                        <a href="{{ $banner->cta_url }}" class="bg-[#0d9488] hover:bg-[#0f766e] text-white px-7 py-3.5 rounded-2xl font-extrabold text-xs sm:text-sm shadow-xl hover:shadow-[#0d9488]/50 transition transform hover:-translate-y-0.5 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            {{ $banner->cta_text }}
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="hero-slider-slide active">
            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1600&auto=format&fit=crop&q=80" alt="Gampong Leu Ue" class="hero-slide-bg absolute inset-0 w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/50 to-slate-900/30"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center z-10">
                <h1 class="text-4xl font-extrabold text-white">Selamat Datang di Gampong Leu Ue</h1>
            </div>
        </div>
        @endforelse

        <!-- ==================== CONTROLS: PREV & NEXT BUTTONS ==================== -->
        <button id="hero-slider-prev" class="absolute left-4 sm:left-8 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-white/10 hover:bg-white/25 backdrop-blur-md border border-white/20 text-white flex items-center justify-center transition-all duration-300 transform hover:scale-110 active:scale-95 shadow-xl group-hover:opacity-100 opacity-80" aria-label="Slide Sebelumnya" title="Slide Sebelumnya">
            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
        </button>

        <button id="hero-slider-next" class="absolute right-4 sm:right-8 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-white/10 hover:bg-white/25 backdrop-blur-md border border-white/20 text-white flex items-center justify-center transition-all duration-300 transform hover:scale-110 active:scale-95 shadow-xl group-hover:opacity-100 opacity-80" aria-label="Slide Berikutnya" title="Slide Berikutnya">
            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
        </button>

        <!-- ==================== BOTTOM INDICATORS & SLIDE COUNTER ==================== -->
        <div class="absolute bottom-6 left-0 right-0 z-20 flex items-center justify-between max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pointer-events-none">
            <!-- Slide Counter -->
            <div id="hero-slide-counter" class="pointer-events-auto font-mono text-xs sm:text-sm font-bold bg-black/40 backdrop-blur-md px-3.5 py-1.5 rounded-full border border-white/20 text-slate-200">
                01 / {{ sprintf('%02d', max(1, count($heroBanners))) }}
            </div>

            <!-- Indicator Dots -->
            <div class="pointer-events-auto flex items-center gap-2.5 bg-black/30 backdrop-blur-md px-4 py-2 rounded-full border border-white/15">
                @foreach($heroBanners as $idx => $b)
                <button class="hero-slider-indicator relative h-2.5 rounded-full overflow-hidden transition-all duration-300 {{ $idx === 0 ? 'bg-white w-10' : 'bg-white/40 w-3 hover:bg-white/70' }}" aria-label="Lompat ke Slide {{ $idx + 1 }}">
                    <span class="indicator-bar absolute inset-0 bg-[#0d9488]"></span>
                </button>
                @endforeach
            </div>
            
            <!-- Hint Text on Desktop -->
            <div class="hidden md:flex items-center gap-1.5 text-[11px] text-slate-400 font-semibold">
                <kbd class="px-2 py-0.5 bg-white/10 rounded border border-white/20 font-mono text-[10px]">←</kbd>
                <kbd class="px-2 py-0.5 bg-white/10 rounded border border-white/20 font-mono text-[10px]">→</kbd>
                <span>Navigasi Panah</span>
            </div>
        </div>

    </div>

    <!-- 2. QUICK STAT COUNTERS BANNER -->
    <div class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 text-slate-800 dark:text-slate-100 py-4 shadow-sm relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 divide-y sm:divide-y-0 sm:divide-x divide-slate-100 dark:divide-slate-800 text-center">
                
                <div class="p-2 flex items-center justify-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-teal-50 dark:bg-slate-800 text-[#0d9488] flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
                    </div>
                    <div class="text-left">
                        <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Total Penduduk</p>
                        <p class="text-lg font-extrabold text-slate-900 dark:text-white">{{ number_format($statistik['total_penduduk'], 0, ',', '.') }} <span class="text-xs font-normal text-slate-400">Jiwa</span></p>
                    </div>
                </div>

                <div class="p-2 flex items-center justify-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-green-50 dark:bg-slate-800 text-[#15803d] flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    </div>
                    <div class="text-left">
                        <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Kepala Keluarga</p>
                        <p class="text-lg font-extrabold text-slate-900 dark:text-white">{{ number_format($statistik['total_kk'], 0, ',', '.') }} <span class="text-xs font-normal text-slate-400">KK</span></p>
                    </div>
                </div>

                <div class="p-2 flex items-center justify-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-slate-800 text-[#42b095] flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                    </div>
                    <div class="text-left">
                        <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Wilayah Dusun</p>
                        <p class="text-lg font-extrabold text-slate-900 dark:text-white">{{ $statistik['dusun_count'] }} <span class="text-xs font-normal text-slate-400">Dusun</span></p>
                    </div>
                </div>

                <div class="p-2 flex items-center justify-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-50 dark:bg-slate-800 text-amber-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                    <div class="text-left">
                        <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Lapak UMKM</p>
                        <p class="text-lg font-extrabold text-slate-900 dark:text-white">{{ $statistik['umkm_count'] }} <span class="text-xs font-normal text-slate-400">Unit</span></p>
                    </div>
                </div>

                <div class="p-2 flex items-center justify-center gap-3 col-span-2 sm:col-span-1">
                    <div class="w-10 h-10 rounded-xl bg-teal-50 dark:bg-slate-800 text-[#0d9488] flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="text-left">
                        <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">APBG 2026</p>
                        <p class="text-lg font-extrabold text-slate-900 dark:text-white">Rp 1.48 <span class="text-xs font-normal text-slate-400">M</span></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- 3. MAIN SECTION (2-COLUMNS: PORTAL BERITA & WIDGET SIDEBAR) -->
<div class="py-10 bg-slate-50 dark:bg-slate-950 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- ==================== KOLOM KIRI (KONTEN UTAMA: 8 KOLOM) ==================== -->
            <div class="lg:col-span-8 space-y-10">
                
                <!-- A. HEADLINE BERITA UTAMA (FEATURED POST) -->
                @if($featuredPost)
                <div class="bg-white dark:bg-slate-900 rounded-3xl overflow-hidden shadow-sm border border-slate-100 dark:border-slate-800 group hover:shadow-xl transition-all duration-300">
                    <div class="relative aspect-video sm:aspect-[21/9] overflow-hidden">
                        <img src="{{ $featuredPost->image ?? 'https://images.unsplash.com/photo-1577495508048-b635879837f1?w=1000&auto=format&fit=crop&q=80' }}" alt="{{ $featuredPost->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                        
                        <div class="absolute top-4 left-4 flex gap-2">
                            <span class="bg-[#0d9488] text-white text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow">
                                {{ $featuredPost->category->name ?? 'Warta Gampong' }}
                            </span>
                            <span class="bg-black/60 backdrop-blur-md text-white text-[11px] font-medium px-3 py-1 rounded-full">
                                {{ $featuredPost->created_at->format('d M Y') }}
                            </span>
                        </div>

                        <div class="absolute bottom-0 left-0 p-6 sm:p-8 w-full text-white">
                            <h2 class="text-xl sm:text-2xl lg:text-3xl font-extrabold leading-tight mb-2 group-hover:text-teal-200 transition font-heading">
                                <a href="{{ route('berita.detail', $featuredPost->slug) }}">{{ $featuredPost->title }}</a>
                            </h2>
                            <p class="text-xs sm:text-sm text-slate-200 line-clamp-2 leading-relaxed">
                                {{ Str::limit(strip_tags($featuredPost->content), 150) }}
                            </p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- B. TAB KATEGORI BERITA & ARTIKEL TERKINI -->
                <div>
                    <!-- Header Section Kategori -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b-2 border-[#15803d] mb-6">
                        <div class="flex items-center gap-2.5">
                            <span class="w-3.5 h-7 bg-[#0d9488] rounded-r"></span>
                            <h3 class="text-xl font-extrabold text-slate-900 dark:text-white font-heading">
                                Kabar & Berita Terkini Gampong
                            </h3>
                        </div>
                        <a href="{{ route('informasi') }}" class="text-xs font-bold text-[#0d9488] hover:underline flex items-center gap-1">
                            Lihat Semua Artikel &rarr;
                        </a>
                    </div>

                    <!-- Grid Berita -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @forelse($posts->skip(1) as $post)
                        <article class="bg-white dark:bg-slate-900 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg border border-slate-100 dark:border-slate-800 transition-all duration-300 flex flex-col group">
                            <!-- Thumbnail -->
                            <a href="{{ route('berita.detail', $post->slug) }}" class="relative aspect-video overflow-hidden bg-slate-100 dark:bg-slate-800 block">
                                <img src="{{ $post->image ?? 'https://images.unsplash.com/photo-1593113598332-cd288d649433?w=600&auto=format&fit=crop&q=80' }}" alt="{{ $post->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                <span class="absolute top-3 left-3 bg-[#15803d] text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow">
                                    {{ $post->category->name ?? 'Berita' }}
                                </span>
                            </a>

                            <!-- Body -->
                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-2 text-[11px] text-slate-400 mb-2">
                                        <svg class="w-3.5 h-3.5 text-[#0d9488]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <span>{{ $post->created_at->format('d M Y') }}</span>
                                        <span>&bull;</span>
                                        <span>Oleh Admin</span>
                                    </div>
                                    <h4 class="font-bold text-base text-slate-800 dark:text-white group-hover:text-[#0d9488] transition line-clamp-2 leading-snug mb-2 font-heading">
                                        <a href="{{ route('berita.detail', $post->slug) }}">{{ $post->title }}</a>
                                    </h4>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 line-clamp-2 leading-relaxed mb-4">
                                        {{ Str::limit(strip_tags($post->content), 100) }}
                                    </p>
                                </div>

                                <a href="{{ route('berita.detail', $post->slug) }}" class="text-xs font-bold text-[#0d9488] hover:text-[#0f766e] inline-flex items-center gap-1 transition">
                                    Baca Selengkapnya
                                    <svg class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </div>
                        </article>
                        @empty
                        <p class="col-span-2 text-center text-slate-400 py-10">Belum ada berita yang diterbitkan.</p>
                        @endforelse
                    </div>
                </div>

                <!-- C. PETA WILAYAH DESA INTERAKTIF (LEAFLET GIS) -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
                    <div class="flex items-center justify-between pb-4 border-b border-slate-100 dark:border-slate-800 mb-4">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-6 bg-[#42b095] rounded"></span>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white font-heading">Peta Geografis & Fasilitas Gampong (GIS)</h3>
                        </div>
                        <a href="{{ route('peta') }}" class="text-xs font-bold text-[#42b095] hover:underline">Buka Peta Penuh &rarr;</a>
                    </div>
                    
                    <div id="leaflet-home-map" class="h-72 w-full rounded-2xl border border-slate-200 dark:border-slate-700 z-10 shadow-inner"></div>
                    <div class="mt-3 flex flex-wrap items-center gap-4 text-xs text-slate-500">
                        <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-red-500"></span> Kantor Keuchik</span>
                        <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span> Meunasah Gampong</span>
                        <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span> Posyandu / Polindes</span>
                        <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span> Wisata Glee Taron</span>
                    </div>
                </div>

                <!-- D. LAPAK UMKM WARGA & POTENSI DESA -->
                <div>
                    <div class="flex items-center justify-between pb-4 border-b-2 border-[#eab308] mb-6">
                        <div class="flex items-center gap-2.5">
                            <span class="w-3.5 h-7 bg-[#eab308] rounded-r"></span>
                            <h3 class="text-xl font-extrabold text-slate-900 dark:text-white font-heading">
                                Lapak UMKM & Produk Lokal Warga
                            </h3>
                        </div>
                        <a href="{{ route('lapak') }}" class="text-xs font-bold text-[#eab308] hover:underline">
                            Lihat Semua Produk &rarr;
                        </a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($umkm->take(3) as $u)
                        <div class="bg-white dark:bg-slate-900 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg border border-slate-100 dark:border-slate-800 transition flex flex-col justify-between">
                            <div class="relative aspect-square overflow-hidden bg-slate-100">
                                <img src="{{ $u->image ?? 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=400&auto=format&fit=crop&q=80' }}" alt="{{ $u->name }}" class="w-full h-full object-cover">
                                <div class="absolute top-2 right-2 bg-emerald-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-md shadow">
                                    Tersedia
                                </div>
                            </div>
                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h4 class="font-bold text-sm text-slate-800 dark:text-white line-clamp-1 mb-1">{{ $u->name }}</h4>
                                    <p class="text-[11px] text-[#0d9488] font-semibold mb-2">Penjual: {{ $u->owner_name }}</p>
                                    <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed mb-4">{{ $u->description }}</p>
                                </div>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $u->contact ?? '6281269082070') }}?text=Halo%20{{ urlencode($u->owner_name) }},%20saya%20tertarik%20dengan%20produk%20{{ urlencode($u->name) }}%20di%20Website%20Gampong%20Leu%20Ue" target="_blank" class="w-full bg-[#10c379] hover:bg-[#0ea566] text-white text-xs font-bold py-2 rounded-xl text-center flex items-center justify-center gap-1.5 shadow transition">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.993L2 22l5.233-1.237a9.994 9.994 0 004.779 1.217h.004c5.505 0 9.988-4.478 9.989-9.984 0-2.669-1.037-5.176-2.922-7.062A9.935 9.935 0 0012.012 2z"/></svg>
                                    Pesan via WhatsApp
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- ==================== KOLOM KANAN (SIDEBAR WIDGETS LENGKAP: 4 KOLOM) ==================== -->
            <aside class="lg:col-span-4 space-y-8">
                
                <!-- 1. WIDGET SAMBUTAN KEUCHIK -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 text-center relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-[#0d9488] to-[#15803d]"></div>
                    
                    <div class="relative w-28 h-28 mx-auto mt-2 mb-4 rounded-full p-1.5 bg-gradient-to-tr from-[#0d9488] to-[#15803d] shadow-lg">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&auto=format&fit=crop&q=80" alt="Keuchik Gampong Leu Ue" class="w-full h-full object-cover rounded-full border-2 border-white">
                    </div>

                    <h4 class="font-extrabold text-base text-slate-900 dark:text-white font-heading">
                        Razali
                    </h4>
                    <p class="text-xs text-[#0d9488] font-bold tracking-wider uppercase mb-4">
                        Keuchik Gampong Leu Ue
                    </p>

                    <div class="bg-slate-50 dark:bg-slate-800/60 p-4 rounded-2xl text-xs text-slate-600 dark:text-slate-300 italic leading-relaxed text-left border border-slate-100 dark:border-slate-700 relative">
                        <span class="text-2xl text-teal-400 font-serif font-bold leading-none">&ldquo;</span>
                        Selamat datang di portal resmi Gampong Leu Ue. Melalui keterbukaan informasi publik dan layanan mandiri digital, mari kita bersama-sama mewujudkan gampong yang mandiri, islami, transparan, dan sejahtera.
                    </div>
                </div>

                <!-- 2. WIDGET APARATUR GAMPONG CAROUSEL -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800 mb-4">
                        <h4 class="font-bold text-sm text-slate-900 dark:text-white flex items-center gap-2">
                            <span class="w-2 h-4 bg-[#0d9488] rounded"></span>
                            Perangkat Gampong
                        </h4>
                        <a href="{{ route('kehadiran') }}" class="text-[11px] font-bold text-emerald-600 dark:text-emerald-400 hover:underline">Presensi Live</a>
                    </div>

                    <div class="space-y-3">
                        @foreach($kehadiranHariIni->take(4) as $staff)
                        @php
                            $sNama = is_array($staff) ? $staff['nama'] : $staff->name;
                            $sFoto = is_array($staff) ? $staff['foto'] : ($staff->photo ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&auto=format&fit=crop&q=80');
                            $sJabatan = is_array($staff) ? $staff['jabatan'] : $staff->position;
                            $sStatus = is_array($staff) ? $staff['status'] : $staff->presence_status;
                        @endphp
                        <div class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800/60 transition border border-transparent hover:border-slate-100 dark:hover:border-slate-700">
                            <img src="{{ $sFoto }}" alt="{{ $sNama }}" class="w-11 h-11 rounded-full object-cover border border-slate-200">
                            <div class="flex-1 min-w-0">
                                <h5 class="text-xs font-bold text-slate-900 dark:text-white truncate">{{ $sNama }}</h5>
                                <p class="text-[11px] text-slate-500 dark:text-slate-400 truncate">{{ $sJabatan }}</p>
                            </div>
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full {{ $sStatus == 'Hadir' ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-950 dark:text-emerald-300' : 'bg-blue-100 text-blue-800' }}">
                                {{ $sStatus }}
                            </span>
                        </div>
                        @endforeach
                    </div>

                    <a href="{{ route('pemerintahan') }}" class="mt-4 block text-center bg-slate-100 dark:bg-slate-800 hover:bg-teal-50 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 text-xs font-bold py-2 rounded-xl transition">
                        Lihat Struktur Lengkap &rarr;
                    </a>
                </div>

                <!-- 3. WIDGET TRANSPARANSI APBGAMPONG 2026 -->
                <div class="bg-gradient-to-br from-[#15803d] to-[#166534] text-white rounded-3xl p-6 shadow-xl relative overflow-hidden">
                    <div class="flex items-center justify-between pb-3 border-b border-green-800 mb-4">
                        <h4 class="font-bold text-sm text-white flex items-center gap-2">
                            <svg class="w-4 h-4 text-teal-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            Transparansi APBG 2026
                        </h4>
                        <span class="text-[10px] bg-teal-500/30 text-teal-200 font-bold px-2 py-0.5 rounded border border-teal-400/30">REALISASI</span>
                    </div>

                    <!-- Progress Bars -->
                    <div class="space-y-4 text-xs">
                        <!-- Pendapatan -->
                        <div>
                            <div class="flex justify-between font-bold mb-1">
                                <span>Pendapatan Gampong:</span>
                                <span class="text-teal-300">Rp {{ number_format($apbdes['pendapatan'], 0, ',', '.') }}</span>
                            </div>
                            <div class="w-full h-2.5 bg-green-950 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-teal-400 to-emerald-400 rounded-full" style="width: {{ $apbdes['pendapatan_persen'] }}%;"></div>
                            </div>
                            <p class="text-[10px] text-slate-300 text-right mt-0.5">Tercapai {{ $apbdes['pendapatan_persen'] }}%</p>
                        </div>

                        <!-- Belanja -->
                        <div>
                            <div class="flex justify-between font-bold mb-1">
                                <span>Belanja Gampong:</span>
                                <span class="text-amber-300">Rp {{ number_format($apbdes['belanja'], 0, ',', '.') }}</span>
                            </div>
                            <div class="w-full h-2.5 bg-green-950 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-amber-400 to-yellow-300 rounded-full" style="width: {{ $apbdes['belanja_persen'] }}%;"></div>
                            </div>
                            <p class="text-[10px] text-slate-300 text-right mt-0.5">Serapan {{ $apbdes['belanja_persen'] }}%</p>
                        </div>
                    </div>

                    <a href="{{ route('transparansi') }}" class="mt-5 block text-center bg-white/10 hover:bg-white/20 text-white text-xs font-bold py-2 rounded-xl border border-white/20 transition">
                        Rincian Detail Anggaran &rarr;
                    </a>
                </div>

                <!-- 4. WIDGET JADWAL SHALAT DIGITAL -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800 mb-4">
                        <h4 class="font-bold text-sm text-slate-900 dark:text-white flex items-center gap-2">
                            <span class="w-2 h-4 bg-[#38c255] rounded"></span>
                            Jadwal Shalat Darul Imarah
                        </h4>
                        <span class="text-[10px] text-slate-400">WIB</span>
                    </div>

                    <div class="grid grid-cols-3 gap-2 text-center text-xs">
                        <div class="bg-slate-50 dark:bg-slate-800 p-2.5 rounded-xl border border-slate-100 dark:border-slate-700">
                            <p class="text-slate-400 text-[10px] font-semibold">Subuh</p>
                            <p class="font-mono font-bold text-slate-800 dark:text-white text-sm mt-0.5">05:12</p>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-800 p-2.5 rounded-xl border border-slate-100 dark:border-slate-700">
                            <p class="text-slate-400 text-[10px] font-semibold">Terbit</p>
                            <p class="font-mono font-bold text-slate-800 dark:text-white text-sm mt-0.5">06:30</p>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-800 p-2.5 rounded-xl border border-slate-100 dark:border-slate-700">
                            <p class="text-slate-400 text-[10px] font-semibold">Dzuhur</p>
                            <p class="font-mono font-bold text-slate-800 dark:text-white text-sm mt-0.5">12:44</p>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-800 p-2.5 rounded-xl border border-slate-100 dark:border-slate-700">
                            <p class="text-slate-400 text-[10px] font-semibold">Ashar</p>
                            <p class="font-mono font-bold text-slate-800 dark:text-white text-sm mt-0.5">16:04</p>
                        </div>
                        <div class="bg-emerald-50 dark:bg-emerald-950/60 p-2.5 rounded-xl border border-emerald-200 dark:border-emerald-800">
                            <p class="text-emerald-600 dark:text-emerald-400 text-[10px] font-bold">Maghrib</p>
                            <p class="font-mono font-bold text-emerald-700 dark:text-emerald-300 text-sm mt-0.5">18:50</p>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-800 p-2.5 rounded-xl border border-slate-100 dark:border-slate-700">
                            <p class="text-slate-400 text-[10px] font-semibold">Isya</p>
                            <p class="font-mono font-bold text-slate-800 dark:text-white text-sm mt-0.5">20:01</p>
                        </div>
                    </div>
                </div>

                <!-- 5. WIDGET AGENDA DESA MENDATANG -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800 mb-4">
                        <h4 class="font-bold text-sm text-slate-900 dark:text-white flex items-center gap-2">
                            <span class="w-2 h-4 bg-amber-500 rounded"></span>
                            Agenda Kegiatan Gampong
                        </h4>
                    </div>

                    <div class="space-y-3.5">
                        @foreach($agenda as $ag)
                        @php
                            $title = is_array($ag) ? $ag['judul'] : $ag->title;
                            $dateStr = is_array($ag) ? $ag['tanggal'] : $ag->event_date;
                            $timeStr = is_array($ag) ? $ag['waktu'] : $ag->event_time;
                            $locStr = is_array($ag) ? $ag['lokasi'] : $ag->location;
                            $parts = explode(' ', $dateStr);
                            $day = $parts[0] ?? '15';
                            $month = $parts[1] ?? 'Agu';
                        @endphp
                        <div class="flex items-start gap-3 p-2 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                            <div class="w-12 h-12 rounded-xl bg-teal-100 dark:bg-slate-800 text-[#0d9488] flex flex-col items-center justify-center flex-shrink-0 text-center font-bold">
                                <span class="text-xs leading-none">{{ $day }}</span>
                                <span class="text-[9px] uppercase leading-none mt-1">{{ $month }}</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h5 class="text-xs font-bold text-slate-800 dark:text-white line-clamp-1">{{ $title }}</h5>
                                <p class="text-[11px] text-slate-500 dark:text-slate-400 flex items-center gap-1 mt-0.5">
                                    <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ $timeStr }}
                                </p>
                                <p class="text-[10px] text-[#0d9488] truncate">{{ $locStr }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- 6. WIDGET STATISTIK PENGUNJUNG WEBSITE -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white pb-3 border-b border-slate-100 dark:border-slate-800 mb-4 flex items-center gap-2">
                        <span class="w-2 h-4 bg-[#15803d] rounded"></span>
                        Statistik Pengunjung
                    </h4>
                    
                    <div class="space-y-2.5 text-xs">
                        <div class="flex justify-between items-center text-slate-600 dark:text-slate-400">
                            <span>Hari Ini:</span>
                            <span class="font-mono font-bold text-slate-900 dark:text-white bg-slate-100 dark:bg-slate-800 px-2 py-0.5 rounded">124</span>
                        </div>
                        <div class="flex justify-between items-center text-slate-600 dark:text-slate-400">
                            <span>Kemarin:</span>
                            <span class="font-mono font-bold text-slate-900 dark:text-white bg-slate-100 dark:bg-slate-800 px-2 py-0.5 rounded">289</span>
                        </div>
                        <div class="flex justify-between items-center text-slate-600 dark:text-slate-400">
                            <span>Minggu Ini:</span>
                            <span class="font-mono font-bold text-slate-900 dark:text-white bg-slate-100 dark:bg-slate-800 px-2 py-0.5 rounded">1.842</span>
                        </div>
                        <div class="flex justify-between items-center text-slate-600 dark:text-slate-400 pt-2 border-t border-slate-100 dark:border-slate-800 font-bold">
                            <span class="text-slate-800 dark:text-white">Total Kunjungan:</span>
                            <span class="font-mono text-[#0d9488] bg-teal-50 dark:bg-slate-800 px-2.5 py-0.5 rounded">48.910</span>
                        </div>
                        <div class="flex justify-between items-center text-emerald-600 dark:text-emerald-400 text-[11px] font-semibold pt-1">
                            <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span> Pengunjung Online:</span>
                            <span class="font-mono font-bold">8 Orang</span>
                        </div>
                    </div>
                </div>

            </aside>

        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Inisialisasi Peta Leaflet untuk Gampong Leu Ue (Aceh Besar)
    const mapContainer = document.getElementById('leaflet-home-map');
    if (mapContainer && typeof L !== 'undefined') {
        // Koordinat Gampong Leu Ue, Darul Imarah (4.7893957, 95.9271281)
        const lat = 4.7893957;
        const lng = 95.9271281;
        
        const map = L.map('leaflet-home-map', {
            scrollWheelZoom: false
        }).setView([lat, lng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        // Marker 1: Kantor Keuchik Gampong Leu Ue
        L.marker([lat, lng]).addTo(map)
            .bindPopup('<b>Kantor Keuchik Gampong Leu Ue</b><br>Jl. Jenderal Sudirman - Mata Ie, Kode Pos 23352.')
            .openPopup();

        // Marker 2: Meunasah Gampong
        L.marker([lat + 0.002, lng - 0.001]).addTo(map)
            .bindPopup('<b>Meunasah Gampong Leu Ue</b><br>Pusat Ibadah & Musyawarah Adat.');

        // Marker 3: Makam Meurah (Cagar Budaya)
        L.marker([lat - 0.002, lng + 0.002]).addTo(map)
            .bindPopup('<b>Situs Makam Meurah</b><br>Cagar Budaya Sejarah Kesultanan Aceh (1999).');

        // Marker 4: Wisata Alam Glee Taron
        L.marker([lat + 0.003, lng + 0.003]).addTo(map)
            .bindPopup('<b>Wisata Alam Glee Taron</b><br>Panorama Sunrise & Sunset Pegunungan.');
    }
});
</script>
@endpush
