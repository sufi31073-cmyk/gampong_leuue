@extends('layouts.app')

@section('title', 'Portal Berita & Informasi Publik')

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
            <span class="text-teal-200">Informasi</span>
            <span class="text-teal-300/70">/</span>
            <span class="text-white font-bold">Warta Gampong</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-start sm:items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-md text-white border border-white/30 flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md text-teal-100 border border-white/20 shadow-sm">
                            Warta & Kabar Terkini
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-heading tracking-tight drop-shadow-sm">
                        Portal Berita & Informasi Gampong
                    </h1>
                    <p class="text-xs sm:text-sm text-teal-100/90 mt-1 max-w-2xl leading-relaxed">
                        Kabar pembangunan, kegiatan sosial keagamaan, pengumuman resmi, dan potensi ekonomi Gampong Leu Ue.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-10 bg-slate-50 dark:bg-slate-950 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <!-- Filter & Search Bar -->
        <div class="bg-white dark:bg-slate-900 p-6 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-800 flex flex-col md:flex-row items-center justify-between gap-4">
            <!-- Filter Kategori Buttons -->
            <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 text-xs">
                <a href="{{ route('informasi') }}" class="px-4 py-2 rounded-full font-bold transition flex-shrink-0 {{ !request('kategori') ? 'bg-[#0d9488] text-white shadow' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-200' }}">
                    Semua Kategori
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('informasi', ['kategori' => $cat->slug]) }}" class="px-4 py-2 rounded-full font-bold transition flex-shrink-0 {{ request('kategori') == $cat->slug ? 'bg-[#0d9488] text-white shadow' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-200' }}">
                    {{ $cat->name }}
                </a>
                @endforeach
            </div>

            <!-- Search Form -->
            <form action="{{ route('informasi') }}" method="GET" class="relative w-full md:w-72">
                @if(request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                @endif
                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari judul / artikel..." class="w-full pl-10 pr-4 py-2 rounded-full text-xs bg-slate-50 dark:bg-slate-800 text-slate-800 dark:text-slate-100 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d9488]">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </form>
        </div>

        <!-- Grid Berita -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <article class="bg-white dark:bg-slate-900 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl border border-slate-100 dark:border-slate-800 transition-all duration-300 flex flex-col group">
                <!-- Thumbnail -->
                <a href="{{ route('berita.detail', $post->slug) }}" class="relative aspect-video overflow-hidden bg-slate-100 dark:bg-slate-800 block">
                    <img src="{{ $post->image ?? 'https://images.unsplash.com/photo-1577495508048-b635879837f1?w=600&auto=format&fit=crop&q=80' }}" alt="{{ $post->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#0d9488] text-white text-[10px] font-bold px-3 py-1 rounded-full shadow">
                        {{ $post->category->name ?? 'Warta Gampong' }}
                    </span>
                </a>

                <!-- Body -->
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-slate-400 mb-2.5">
                            <svg class="w-3.5 h-3.5 text-[#0d9488]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>{{ $post->created_at->format('d M Y') }}</span>
                            <span>&bull;</span>
                            <span>Admin Gampong</span>
                        </div>
                        <h3 class="font-extrabold text-base text-slate-900 dark:text-white group-hover:text-[#0d9488] transition line-clamp-2 leading-snug mb-3 font-heading">
                            <a href="{{ route('berita.detail', $post->slug) }}">{{ $post->title }}</a>
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 line-clamp-3 leading-relaxed mb-6">
                            {{ Str::limit(strip_tags($post->content), 130) }}
                        </p>
                    </div>

                    <a href="{{ route('berita.detail', $post->slug) }}" class="text-xs font-bold text-[#0d9488] hover:text-[#0f766e] inline-flex items-center gap-1.5 transition">
                        Baca Selengkapnya
                        <svg class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </article>
            @empty
            <div class="col-span-3 text-center py-16 bg-white dark:bg-slate-900 rounded-3xl border border-dashed border-slate-200 dark:border-slate-800">
                <p class="text-slate-400 text-sm font-semibold">Tidak ada berita yang sesuai dengan kriteria pencarian.</p>
                <a href="{{ route('informasi') }}" class="mt-3 inline-block text-xs font-bold text-[#0d9488] hover:underline">Reset Pencarian &rarr;</a>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $posts->links() }}
        </div>

    </div>
</div>

@endsection
