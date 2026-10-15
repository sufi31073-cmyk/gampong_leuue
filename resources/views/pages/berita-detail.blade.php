@extends('layouts.app')

@section('title', $post->title)

@section('content')

<!-- Header Banner & Breadcrumb (Harmonious Theme & High Contrast) -->
<div class="relative bg-gradient-to-r from-[#15803d] via-[#0f766e] to-[#0d9488] text-white py-8 sm:py-10 px-4 overflow-hidden shadow-md">
    <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 relative z-10">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs font-semibold text-teal-100/90 mb-3" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-white hover:underline transition flex items-center gap-1">
                <svg class="w-3.5 h-3.5 text-teal-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Beranda
            </a>
            <span class="text-teal-300/70">/</span>
            <a href="{{ route('informasi') }}" class="hover:text-white hover:underline transition text-teal-100">Warta Gampong</a>
            <span class="text-teal-300/70">/</span>
            <span class="text-white font-bold truncate max-w-xs">{{ $post->category->name ?? 'Berita' }}</span>
        </nav>

        <div class="space-y-3">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md text-teal-100 border border-white/20 shadow-sm">
                    {{ $post->category->name ?? 'Warta Gampong' }}
                </span>
                <span class="text-xs text-teal-200">&bull;</span>
                <span class="text-xs text-teal-100 font-medium">{{ $post->created_at->format('d F Y') }}</span>
            </div>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white font-heading leading-tight tracking-tight drop-shadow-sm">
                {{ $post->title }}
            </h1>
            <p class="text-xs text-teal-100/90">
                Dipublikasikan oleh: <strong class="text-white">Pemerintah Gampong Leu Ue</strong>
            </p>
        </div>
    </div>
</div>

<div class="py-10 bg-slate-50 dark:bg-slate-950 transition-colors">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Main Article Container -->
        <article class="bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-10 shadow-sm border border-slate-100 dark:border-slate-800">
            <!-- Article Image -->
            @if($post->image)
            <div class="rounded-2xl overflow-hidden mb-8 shadow-md aspect-video">
                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            </div>
            @endif

            <!-- Article Body -->
            <div class="prose prose-slate dark:prose-invert max-w-none text-slate-700 dark:text-slate-200 text-sm sm:text-base leading-relaxed space-y-4">
                {!! nl2br(e($post->content)) !!}
            </div>

            <!-- Social Share Bar -->
            <div class="mt-10 pt-6 border-t border-slate-100 dark:border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Bagikan Kabar Ini:</span>
                <div class="flex items-center gap-2">
                    <!-- Share WhatsApp -->
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' - ' . url()->current()) }}" target="_blank" class="bg-[#10c379] hover:bg-[#0ea566] text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-1.5 shadow">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.993L2 22l5.233-1.237a9.994 9.994 0 004.779 1.217h.004c5.505 0 9.988-4.478 9.989-9.984 0-2.669-1.037-5.176-2.922-7.062A9.935 9.935 0 0012.012 2z"/></svg>
                        WhatsApp
                    </a>
                    <!-- Share Facebook -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="bg-[#1877f2] hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-1.5 shadow">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        Facebook
                    </a>
                </div>
            </div>
        </article>

        <!-- Related News Section -->
        <div class="pt-6">
            <h3 class="text-xl font-extrabold text-slate-900 dark:text-white mb-6 flex items-center gap-2 font-heading">
                <span class="w-2.5 h-6 bg-[#0d9488] rounded"></span>
                Berita Terkait Lainnya
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach($relatedPosts as $rel)
                <a href="{{ route('berita.detail', $rel->slug) }}" class="bg-white dark:bg-slate-900 rounded-2xl p-4 shadow-sm hover:shadow-md border border-slate-100 dark:border-slate-800 transition flex gap-4 group">
                    <img src="{{ $rel->image ?? 'https://images.unsplash.com/photo-1577495508048-b635879837f1?w=300&auto=format&fit=crop&q=80' }}" alt="{{ $rel->title }}" class="w-24 h-24 rounded-xl object-cover flex-shrink-0">
                    <div class="flex-1 min-w-0">
                        <span class="text-[10px] font-bold text-[#0d9488] uppercase">{{ $rel->category->name ?? 'Berita' }}</span>
                        <h4 class="font-bold text-xs sm:text-sm text-slate-800 dark:text-white group-hover:text-[#0d9488] transition line-clamp-2 mt-1">{{ $rel->title }}</h4>
                        <p class="text-[11px] text-slate-400 mt-2">{{ $rel->created_at->format('d M Y') }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection
