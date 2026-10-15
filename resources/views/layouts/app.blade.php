<!DOCTYPE html>
<html lang="id" data-theme="sawah" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Website Resmi') - Gampong Leu Ue</title>
    <meta name="description" content="Website Resmi Gampong Leu Ue, Kecamatan Darul Imarah, Kabupaten Aceh Besar, Provinsi Aceh. Pusat informasi, transparansi APBDes, dan layanan mandiri E-Surat warga.">
    <meta name="keywords" content="Gampong Leu Ue, Darul Imarah, Aceh Besar, Aceh, Website Gampong, Layanan Mandiri, SIGAP, Transparansi APBDes, UMKM Gampong">
    
    <!-- Open Graph / Meta Social -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Website Resmi') - Gampong Leu Ue">
    <meta property="og:description" content="Portal Resmi Gampong Leu Ue - Pelayanan E-Surat Mandiri, Berita Terkini, dan Transparansi Publik.">
    <meta property="og:image" content="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1200&auto=format&fit=crop&q=80">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=Outfit:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Leaflet CSS for GIS Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 flex flex-col min-h-screen selection:bg-[#0d9488] selection:text-white transition-colors duration-300">

    <!-- 1. TOP BAR RUNNING TEXT & QUICK ACTIONS (Khas Blang Merang DeNava) -->
    <div class="bg-[#15803d] dark:bg-slate-900 text-white text-xs py-2 px-4 border-b border-green-900/50 relative z-50">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-between gap-2">
            
            <!-- Left: Teks Berjalan Pengumuman (Marquee) -->
            <div class="flex items-center gap-2 overflow-hidden w-full lg:w-3/5">
                <span class="inline-flex items-center gap-1.5 bg-[#0d9488] text-white font-extrabold px-2.5 py-0.5 rounded text-[11px] uppercase tracking-wider flex-shrink-0 shadow-sm animate-pulse">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                    Warta Desa
                </span>
                <div class="overflow-hidden relative w-full text-slate-200 font-medium">
                    <div class="animate-marquee inline-block whitespace-nowrap">
                        Selamat Datang di Website Resmi Gampong Leu Ue, Kec. Darul Imarah, Kab. Aceh Besar, Provinsi Aceh &bull; 
                        Layanan Mandiri E-Surat Warga aktif 24 Jam &bull; 
                        Realisasi APBDes 2026 Transparan & Akuntabel &bull; 
                        Mari wujudkan Gampong Mandiri, Cerdas, dan Berdaya Saing!
                    </div>
                </div>
            </div>

            <!-- Right: Realtime Clock, Theme Selector, Dark Mode & Quick Links -->
            <div class="flex items-center justify-between lg:justify-end gap-4 w-full lg:w-auto flex-wrap">
                <!-- Live Clock -->
                <div class="hidden sm:flex items-center gap-1.5 text-blue-200 font-mono">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span id="live-digital-clock">{{ date('H:i:s') }} WIB</span>
                </div>



                <!-- Dark Mode Switcher -->
                <button class="dark-mode-toggle p-1 rounded-md bg-white/10 hover:bg-white/20 text-yellow-300 transition" title="Ganti Mode Gelap / Terang" aria-label="Mode Gelap">
                    <svg class="w-3.5 h-3.5 dark:hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg class="w-3.5 h-3.5 hidden dark:inline text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>
                </button>

                <!-- Quick Portal Link -->
                <a href="{{ route('kehadiran') }}" class="text-blue-100 hover:text-white transition flex items-center gap-1 font-semibold">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span> Kehadiran
                </a>
            </div>

        </div>
    </div>

    <!-- 2. BRAND HEADER HERO BANNER -->
    <header class="bg-gradient-to-r from-[#0d9488] via-[#15803d] to-[#166534] text-white py-6 px-4 shadow-md relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-white/15 via-transparent to-black/30 pointer-events-none"></div>
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-6 relative z-10">
            
            <!-- Left: Logo & Nama Desa -->
            <div class="flex items-center gap-4 text-center md:text-left">
                <a href="{{ route('home') }}" class="group block relative">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-white p-2 shadow-xl border-2 border-white/60 flex items-center justify-center transform group-hover:scale-105 transition duration-300">
                        <img src="{{ asset('image/logo_aceh_besar.png') }}" alt="Logo Gampong Leu Ue" class="w-full h-full object-contain">
                    </div>
                </a>
                <div>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-white drop-shadow-sm font-heading">
                        Gampong Leu Ue
                    </h1>
                    <p class="text-sm sm:text-base text-teal-100 font-medium tracking-wide">
                        Kec. Darul Imarah &bull; Kab. Aceh Besar &bull; Prov. Aceh
                    </p>
                    <p class="text-xs text-emerald-100/90 italic mt-0.5">
                        "Terwujudnya Gampong Mandiri, Sejahtera, Islami & Berbudaya"
                    </p>
                </div>
            </div>

            <!-- Right: Search Bar & Layanan Mandiri CTA -->
            <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto">
                <form action="{{ route('informasi') }}" method="GET" class="relative w-full sm:w-64">
                    <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari berita / info desa..." class="w-full pl-10 pr-4 py-2.5 rounded-full text-xs bg-white/95 text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#0d9488] placeholder-slate-400 shadow-inner">
                    <svg class="w-4 h-4 text-slate-500 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </form>
                
                <a href="{{ route('esurat') }}" class="w-full sm:w-auto bg-amber-400 hover:bg-amber-300 text-slate-900 font-extrabold px-5 py-2.5 rounded-full text-xs shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Layanan Mandiri
                </a>
            </div>

        </div>
    </header>

    <!-- 3. MAIN NAVIGATION BAR (Sticky Navbar) -->
    <nav class="sticky top-0 z-40 bg-white/95 dark:bg-slate-900/95 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 shadow-sm transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-14 items-center">
                
                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex items-center space-x-1 font-semibold text-xs text-slate-700 dark:text-slate-200">
                    
                    <!-- Beranda -->
                    <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-[#0d9488] transition {{ request()->routeIs('home') ? 'text-[#0d9488] bg-teal-50 dark:bg-slate-800/80 font-bold' : '' }}">
                        Beranda
                    </a>

                    <!-- Dropdown: Profil Desa -->
                    <div class="relative group">
                        <button class="px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-[#0d9488] transition flex items-center gap-1 {{ request()->routeIs('profil*') ? 'text-[#0d9488] font-bold' : '' }}">
                            Profil Desa
                            <svg class="w-3 h-3 text-slate-400 group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute left-0 mt-1 w-56 bg-white dark:bg-slate-900 rounded-xl shadow-xl border border-slate-100 dark:border-slate-800 py-2 hidden group-hover:block animate-fade-in-up z-50">
                            <a href="{{ route('profil') }}#sejarah" class="block px-4 py-2 hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Sejarah Desa</a>
                            <a href="{{ route('profil') }}#visi-misi" class="block px-4 py-2 hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Visi & Misi</a>
                            <a href="{{ route('profil') }}#struktur" class="block px-4 py-2 hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Bagan Struktur Aparatur</a>
                            <a href="{{ route('peta') }}" class="block px-4 py-2 hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Peta Wilayah & Batas (GIS)</a>
                        </div>
                    </div>

                    <!-- Dropdown: Pemerintahan -->
                    <div class="relative group">
                        <button class="px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-[#0d9488] transition flex items-center gap-1 {{ request()->routeIs('pemerintahan*') || request()->routeIs('kehadiran') ? 'text-[#0d9488] font-bold' : '' }}">
                            Pemerintahan
                            <svg class="w-3 h-3 text-slate-400 group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute left-0 mt-1 w-60 bg-white dark:bg-slate-900 rounded-xl shadow-xl border border-slate-100 dark:border-slate-800 py-2 hidden group-hover:block animate-fade-in-up z-50">
                            <a href="{{ route('pemerintahan') }}" class="block px-4 py-2 hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Pemerintah Desa (Kades & Kasi)</a>
                            <a href="{{ route('kehadiran') }}" class="block px-4 py-2 hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition flex items-center justify-between">
                                Kehadiran Aparatur Hari Ini
                                <span class="bg-emerald-100 text-emerald-700 text-[10px] px-2 py-0.5 rounded-full font-extrabold">LIVE</span>
                            </a>
                            <a href="{{ route('pemerintahan') }}#bpd" class="block px-4 py-2 hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Badan Permusyawaratan Desa (BPD)</a>
                            <a href="{{ route('pemerintahan') }}#lembaga" class="block px-4 py-2 hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Lembaga Kemasyarakatan (PKK/LPM)</a>
                        </div>
                    </div>

                    <!-- Dropdown: Data & Statistik -->
                    <div class="relative group">
                        <button class="px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-[#0d9488] transition flex items-center gap-1 {{ request()->routeIs('statistik*') ? 'text-[#0d9488] font-bold' : '' }}">
                            Data & Statistik
                            <svg class="w-3 h-3 text-slate-400 group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute left-0 mt-1 w-64 bg-white dark:bg-slate-900 rounded-xl shadow-xl border border-slate-100 dark:border-slate-800 py-2 hidden group-hover:block animate-fade-in-up z-50">
                            <a href="{{ route('statistik') }}" class="block px-4 py-2 hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Dashboard Statistik Kependudukan</a>
                            <a href="{{ route('statistik') }}#bansos" class="block px-4 py-2 hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Data Bantuan Sosial (PKH/BLT-DD)</a>
                            <a href="{{ route('transparansi') }}" class="block px-4 py-2 hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Transparansi Anggaran (APBDes)</a>
                        </div>
                    </div>

                    <!-- Dropdown: Layanan Mandiri -->
                    <div class="relative group">
                        <button class="px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-[#0d9488] transition flex items-center gap-1 {{ request()->routeIs('esurat*') || request()->routeIs('aspirasi*') ? 'text-[#0d9488] font-bold' : '' }}">
                            Layanan Warga
                            <svg class="w-3 h-3 text-slate-400 group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute left-0 mt-1 w-60 bg-white dark:bg-slate-900 rounded-xl shadow-xl border border-slate-100 dark:border-slate-800 py-2 hidden group-hover:block animate-fade-in-up z-50">
                            <a href="{{ route('esurat') }}" class="block px-4 py-2 hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Pengajuan E-Surat Mandiri</a>
                            <a href="{{ route('esurat') }}#lacak-surat" class="block px-4 py-2 hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Cek Status & Lacak Resi Surat</a>
                            <a href="{{ route('aspirasi') }}" class="block px-4 py-2 hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Kotak Aspirasi & Laporan Pengaduan</a>
                        </div>
                    </div>

                    <!-- Informasi & Berita -->
                    <a href="{{ route('informasi') }}" class="px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-[#0d9488] transition {{ request()->routeIs('informasi*') || request()->routeIs('berita*') ? 'text-[#0d9488] bg-teal-50 dark:bg-slate-800/80 font-bold' : '' }}">
                        Berita & Informasi
                    </a>

                    <!-- Potensi & Lapak UMKM -->
                    <a href="{{ route('lapak') }}" class="px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-[#0d9488] transition {{ request()->routeIs('lapak*') ? 'text-[#0d9488] bg-teal-50 dark:bg-slate-800/80 font-bold' : '' }}">
                        Lapak UMKM & Wisata
                    </a>

                    <!-- Transparansi APBDes -->
                    <a href="{{ route('transparansi') }}" class="px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-[#0d9488] transition {{ request()->routeIs('transparansi*') ? 'text-[#0d9488] bg-teal-50 dark:bg-slate-800/80 font-bold' : '' }}">
                        Transparansi
                    </a>

                    <!-- Peta GIS -->
                    <a href="{{ route('peta') }}" class="px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-[#0d9488] transition {{ request()->routeIs('peta*') ? 'text-[#0d9488] bg-teal-50 dark:bg-slate-800/80 font-bold' : '' }}">
                        Peta Desa
                    </a>
                </div>



                <!-- Mobile Menu Hamburger Button -->
                <div class="lg:hidden flex items-center gap-2">
                    <button id="mobile-menu-toggle" class="p-2 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200" aria-label="Buka Menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>

            </div>
        </div>
    </nav>

    <!-- 4. MOBILE DRAWER NAVIGATION -->
    <div id="mobile-drawer-overlay" class="fixed inset-0 bg-black/60 z-50 hidden backdrop-blur-sm transition-opacity"></div>
    <div id="mobile-drawer" class="fixed top-0 left-0 bottom-0 w-80 max-w-[85vw] bg-white dark:bg-slate-900 z-50 shadow-2xl transform -translate-x-full transition-transform duration-300 flex flex-col justify-between overflow-y-auto">
        <div>
            <!-- Drawer Header -->
            <div class="p-5 bg-gradient-to-r from-[#0d9488] to-[#15803d] text-white flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white p-1 shadow flex items-center justify-center">
                        <img src="{{ asset('image/logo_aceh_besar.png') }}" alt="Logo Gampong Leu Ue" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h2 class="font-bold text-base leading-tight">Gampong Leu Ue</h2>
                        <p class="text-xs text-teal-200">Kec. Darul Imarah, Aceh Besar</p>
                    </div>
                </div>
                <button id="mobile-drawer-close" class="text-white hover:text-teal-200 p-1" aria-label="Tutup Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Drawer Links -->
            <div class="p-4 space-y-1 text-sm font-semibold text-slate-700 dark:text-slate-200">
                <a href="{{ route('home') }}" class="block px-4 py-2.5 rounded-xl hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Beranda</a>
                <a href="{{ route('profil') }}" class="block px-4 py-2.5 rounded-xl hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Profil & Sejarah Desa</a>
                <a href="{{ route('pemerintahan') }}" class="block px-4 py-2.5 rounded-xl hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Pemerintahan & BPD</a>
                <a href="{{ route('kehadiran') }}" class="block px-4 py-2.5 rounded-xl hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition flex items-center justify-between">
                    Kehadiran Aparatur
                    <span class="bg-emerald-100 text-emerald-700 text-[10px] px-2 py-0.5 rounded-full font-bold">LIVE</span>
                </a>
                <a href="{{ route('statistik') }}" class="block px-4 py-2.5 rounded-xl hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Data & Statistik Penduduk</a>
                <a href="{{ route('informasi') }}" class="block px-4 py-2.5 rounded-xl hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Portal Berita & Informasi</a>
                <a href="{{ route('lapak') }}" class="block px-4 py-2.5 rounded-xl hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Lapak UMKM & Wisata</a>
                <a href="{{ route('transparansi') }}" class="block px-4 py-2.5 rounded-xl hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Transparansi APBDes</a>
                <a href="{{ route('peta') }}" class="block px-4 py-2.5 rounded-xl hover:bg-teal-50 dark:hover:bg-slate-800 hover:text-[#0d9488] transition">Peta Desa GIS</a>
                
                <div class="pt-4 border-t border-slate-200 dark:border-slate-800 space-y-2">
                    <a href="{{ route('esurat') }}" class="block text-center bg-[#0d9488] text-white font-bold py-2.5 px-4 rounded-xl shadow">Layanan E-Surat Mandiri</a>
                    <a href="{{ route('aspirasi') }}" class="block text-center bg-slate-100 dark:bg-slate-800 text-slate-800 dark:text-white font-bold py-2.5 px-4 rounded-xl">Kotak Aspirasi & Aduan</a>
                </div>
            </div>
        </div>

        <!-- Drawer Footer -->
        <div class="p-4 bg-slate-50 dark:bg-slate-950 border-t border-slate-200 dark:border-slate-800 text-xs text-slate-500">
            <p>&copy; {{ date('Y') }} Gampong Leu Ue</p>
            <p class="text-[11px] text-slate-400">SIGAP Aceh Edition</p>
        </div>
    </div>

    <!-- 5. MAIN CONTENT -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- 6. FLOATING CZM WHATSAPP CHAT SUPPORT (Khas Blang Merang DeNava) -->
    <div class="fixed bottom-6 left-6 z-50">
        <!-- Floating Action Button -->
        <button id="chat-support-button" class="group flex items-center gap-3 bg-[#10c379] hover:bg-[#0ea566] text-white px-4 py-3 rounded-full shadow-2xl hover:shadow-[#10c379]/50 transition-all transform hover:scale-105" aria-label="Bantuan WhatsApp">
            <span class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
            </span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.993L2 22l5.233-1.237a9.994 9.994 0 004.779 1.217h.004c5.505 0 9.988-4.478 9.989-9.984 0-2.669-1.037-5.176-2.922-7.062A9.935 9.935 0 0012.012 2zM12.012 20.443h-.003a8.47 8.47 0 01-4.321-1.182l-.31-.184-3.215.758.854-3.13-.2-.318a8.453 8.453 0 01-1.3-4.544c.002-4.673 3.805-8.476 8.483-8.476 2.266 0 4.394.883 5.996 2.486 1.602 1.603 2.485 3.734 2.485 6.001-.001 4.673-3.804 8.476-8.48 8.476zm4.654-6.36c-.255-.128-1.513-.746-1.748-.832-.234-.085-.405-.128-.575.128-.17.256-.66.832-.809 1.002-.15.171-.299.192-.554.064-1.378-.686-2.48-1.597-3.447-3.238-.15-.255.15-.234.656-1.243.085-.171.042-.32-.021-.448-.064-.128-.575-1.386-.788-1.897-.208-.5-.417-.432-.575-.439-.15-.008-.32-.008-.491-.008-.17 0-.448.064-.683.32-.234.256-.895.875-.895 2.133s.916 2.474 1.044 2.645c.128.17 1.805 2.756 4.373 3.864 1.743.754 2.417.842 3.256.71.932-.147 2.871-1.173 3.275-2.304.404-1.13.404-2.1.285-2.304-.119-.204-.457-.332-.712-.46z"/></svg>
            <span class="font-bold text-xs tracking-wide">Bantuan WhatsApp</span>
        </button>

        <!-- Popup Chat Box -->
        <div id="chat-support-popup" class="hidden absolute bottom-16 left-0 w-80 sm:w-96 bg-white dark:bg-slate-900 rounded-3xl shadow-2xl border border-slate-200 dark:border-slate-800 overflow-hidden flex-col animate-fade-in-up">
            <!-- Header -->
            <div class="bg-[#10c379] p-4 text-white flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-white p-1 relative flex-shrink-0">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=100&auto=format&fit=crop&q=80" alt="Petugas Desa" class="w-full h-full object-cover rounded-full">
                        <span class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-400 border-2 border-white rounded-full"></span>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm leading-tight">Pelayanan Gampong Leu Ue</h4>
                        <p class="text-[11px] text-emerald-100">Online &bull; Tanggap 08.00 - 16.00 WIB</p>
                    </div>
                </div>
                <button id="chat-support-close" class="text-white hover:text-emerald-100 p-1" aria-label="Tutup Chat">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Chat Content Body -->
            <div class="p-4 bg-slate-50 dark:bg-slate-950 space-y-3 text-xs">
                <div class="bg-white dark:bg-slate-800 p-3 rounded-2xl rounded-tl-none shadow-sm border border-slate-100 dark:border-slate-700 text-slate-700 dark:text-slate-200">
                    <p class="font-semibold text-emerald-600 dark:text-emerald-400 mb-1">Halo Warga Gampong Leu Ue! 👋</p>
                    <p class="leading-relaxed">Ada yang bisa kami bantu seputar pelayanan administrasi kependudukan, pengajuan surat, atau informasi desa?</p>
                </div>
            </div>

            <!-- Direct WA Action -->
            <div class="p-4 bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800">
                <a href="https://wa.me/6281269082070?text=Halo%20Admin%20Gampong%20Leu%20Ue,%20saya%20ingin%20bertanya%20seputar%20pelayanan%20desa." target="_blank" class="w-full bg-[#10c379] hover:bg-[#0ea566] text-white font-extrabold py-3 px-4 rounded-xl text-center flex items-center justify-center gap-2 shadow-lg transition">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.993L2 22l5.233-1.237a9.994 9.994 0 004.779 1.217h.004c5.505 0 9.988-4.478 9.989-9.984 0-2.669-1.037-5.176-2.922-7.062A9.935 9.935 0 0012.012 2z"/></svg>
                    Mulai Chat di WhatsApp
                </a>
            </div>
        </div>
    </div>

    <!-- 7. SCROLL TO TOP BUTTON -->
    <button id="scroll-to-top" class="fixed bottom-6 right-6 z-40 bg-[#0d9488] hover:bg-[#0f766e] text-white p-3.5 rounded-full shadow-2xl opacity-0 pointer-events-none transition-all transform hover:scale-110" title="Kembali ke Atas" aria-label="Kembali ke Atas">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"></path></svg>
    </button>

    <!-- 8. MODERN FOOTER (Sinergi Lembaga & Identitas Desa) -->
    <footer class="bg-[#166534] dark:bg-slate-950 text-slate-300 pt-16 pb-10 border-t border-green-900/60 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                
                <!-- Kolom 1: Profil & Kontak Kantor -->
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-xl bg-white p-1.5 shadow flex items-center justify-center flex-shrink-0">
                            <img src="{{ asset('image/logo_aceh_besar.png') }}" alt="Logo Gampong Leu Ue" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h3 class="text-white text-lg font-extrabold font-heading">Gampong Leu Ue</h3>
                            <p class="text-xs text-teal-300">Darul Imarah, Aceh Besar</p>
                        </div>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed mb-6">
                        Pemerintahan desa yang berkomitmen mewujudkan kemandirian, transparansi publik, dan adopsi digital untuk kesejahteraan seluruh warga.
                    </p>
                    <div class="space-y-2 text-xs text-slate-300">
                        <div class="flex items-start gap-2.5">
                            <svg class="w-4 h-4 text-[#0d9488] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            <span>Jl. Jenderal Sudirman - Mata Ie, Gampong Leu Ue, Kec. Darul Imarah, Kab. Aceh Besar, Aceh 23352</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-[#0d9488] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <a href="mailto:kontak@leuue.sigapaceh.id" class="hover:text-white transition">kontak@leuue.sigapaceh.id</a>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-[#0d9488] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>+62 812-6908-2070 (WhatsApp)</span>
                        </div>
                    </div>
                </div>

                <!-- Kolom 2: Layanan & Fitur Utama -->
                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-4 bg-[#0d9488] rounded-full"></span> Layanan Warga
                    </h4>
                    <ul class="space-y-2.5 text-xs text-slate-400">
                        <li><a href="{{ route('esurat') }}" class="hover:text-white transition flex items-center gap-2">&bull; Pengajuan E-Surat Mandiri</a></li>
                        <li><a href="{{ route('esurat') }}#lacak-surat" class="hover:text-white transition flex items-center gap-2">&bull; Cek Status Resi Surat</a></li>
                        <li><a href="{{ route('aspirasi') }}" class="hover:text-white transition flex items-center gap-2">&bull; Kotak Aspirasi & Laporan</a></li>
                        <li><a href="{{ route('kehadiran') }}" class="hover:text-white transition flex items-center gap-2">&bull; Halaman Kehadiran Aparatur</a></li>
                        <li><a href="{{ route('statistik') }}" class="hover:text-white transition flex items-center gap-2">&bull; Statistik Kependudukan</a></li>
                        <li><a href="{{ route('transparansi') }}" class="hover:text-white transition flex items-center gap-2">&bull; Realisasi APBDes 2026</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Jam Layanan & Jadwal Sholat -->
                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-4 bg-[#42b095] rounded-full"></span> Jam Operasional
                    </h4>
                    <div class="bg-black/30 p-3.5 rounded-2xl border border-white/5 space-y-2 text-xs">
                        <div class="flex justify-between pb-2 border-b border-white/5">
                            <span class="text-slate-400">Senin - Kamis:</span>
                            <span class="font-bold text-white">08:00 - 15:30 WIB</span>
                        </div>
                        <div class="flex justify-between pb-2 border-b border-white/5">
                            <span class="text-slate-400">Jumat:</span>
                            <span class="font-bold text-white">08:00 - 11:30 WIB</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Sabtu - Minggu:</span>
                            <span class="font-bold text-amber-400">Libur / E-Surat Online</span>
                        </div>
                    </div>
                </div>

                <!-- Kolom 4: Sinergi Program Nasional -->
                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-4 bg-amber-400 rounded-full"></span> Sinergi Lembaga
                    </h4>
                    <div class="grid grid-cols-2 gap-2 text-[11px]">
                        <a href="https://kemendesa.go.id" target="_blank" class="bg-white/5 hover:bg-white/10 p-2 rounded-xl text-center text-slate-300 hover:text-white transition border border-white/5">
                            Kemendesa PDTT
                        </a>
                        <a href="https://kemendagri.go.id" target="_blank" class="bg-white/5 hover:bg-white/10 p-2 rounded-xl text-center text-slate-300 hover:text-white transition border border-white/5">
                            Kemendagri RI
                        </a>
                        <a href="https://acehbesarkab.go.id" target="_blank" class="bg-white/5 hover:bg-white/10 p-2 rounded-xl text-center text-slate-300 hover:text-white transition border border-white/5">
                            Pemkab Aceh Besar
                        </a>
                        <a href="https://opendesa.id" target="_blank" class="bg-white/5 hover:bg-white/10 p-2 rounded-xl text-center text-slate-300 hover:text-white transition border border-white/5">
                            SIGAP Aceh
                        </a>
                    </div>
                </div>

            </div>

            <!-- Bottom Copyright & Disclaimer -->
            <div class="border-t border-green-900/80 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>
                    &copy; {{ date('Y') }} <strong>Gampong Leu Ue</strong>. Hak Cipta Dilindungi Undang-Undang.
                </p>
                <div class="flex items-center gap-4 text-[11px]">
                    <span>Tema: SIGAP Aceh Edition</span>
                    <span>&bull;</span>
                    <a href="{{ route('transparansi') }}" class="hover:text-slate-300">Kebijakan Privasi</a>
                </div>
            </div>

        </div>
    </footer>

    <!-- Leaflet JS for Maps -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    @stack('scripts')
</body>
</html>
