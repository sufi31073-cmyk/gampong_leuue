@extends('layouts.app')

@section('title', 'Profil & Sejarah Gampong Leu Ue')

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
            <span class="text-teal-200">Profil Gampong</span>
            <span class="text-teal-300/70">/</span>
            <span class="text-white font-bold">Sejarah & Visi Misi</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-start sm:items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-md text-white border border-white/30 flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md text-teal-100 border border-white/20 shadow-sm">
                            Identitas Gampong
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-heading tracking-tight drop-shadow-sm">
                        Profil & Sejarah Gampong Leu Ue
                    </h1>
                    <p class="text-xs sm:text-sm text-teal-100/90 mt-1 max-w-2xl leading-relaxed">
                        Mengenal lebih dekat perjalanan sejarah, visi strategis pembangunan, batas wilayah, dan struktur kepengurusan Gampong Leu Ue.
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-2 text-xs font-bold text-white bg-white/15 backdrop-blur-md px-4 py-2 rounded-2xl border border-white/25 shadow-sm self-start md:self-auto">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>Luas: <strong>1.27 km²</strong></span>
            </div>
        </div>
    </div>
</div>

<div class="py-10 bg-slate-50 dark:bg-slate-950 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- 1. VISI & MISI GAMPONG -->
        <div id="visi-misi" class="bg-white dark:bg-slate-900 rounded-3xl p-8 lg:p-10 shadow-sm border border-slate-100 dark:border-slate-800 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-48 h-48 bg-teal-100 dark:bg-teal-950/30 rounded-full blur-3xl -z-0"></div>
            
            <div class="relative z-10">
                <div class="flex items-center gap-2.5 pb-4 border-b border-slate-100 dark:border-slate-800 mb-6">
                    <span class="w-3.5 h-7 bg-[#0d9488] rounded"></span>
                    <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white font-heading">
                        Visi & Misi Gampong Leu Ue
                    </h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <!-- Left: Visi Card -->
                    <div class="lg:col-span-5 bg-gradient-to-br from-[#0d9488] to-[#15803d] text-white p-8 rounded-2xl shadow-lg relative overflow-hidden">
                        <span class="text-xs uppercase font-extrabold tracking-widest text-teal-200 bg-white/20 px-3 py-1 rounded-full">
                            VISI UTAMA
                        </span>
                        <blockquote class="text-base sm:text-lg font-bold italic leading-relaxed mt-4">
                            &ldquo;Terwujudnya Gampong Leu Ue yang Mandiri, Islami, Sejahtera, dan Berdaya Saing melalui Pemanfaatan Potensi Pertanian, Pelestarian Budaya Aceh, dan Teknologi Informasi Inklusif.&rdquo;
                        </blockquote>
                    </div>

                    <!-- Right: Misi List -->
                    <div class="lg:col-span-7 space-y-3.5 text-xs sm:text-sm text-slate-600 dark:text-slate-300">
                        <h3 class="font-extrabold text-slate-900 dark:text-white text-base font-heading">
                            5 Misi Pembangunan Strategis:
                        </h3>
                        <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-100 dark:border-slate-700">
                            <span class="w-6 h-6 rounded-full bg-[#0d9488] text-white flex items-center justify-center font-bold text-xs flex-shrink-0">1</span>
                            <p>Menyelenggarakan tata kelola pemerintahan gampong yang bersih, transparan, akuntabel, dan berbasis digital (Smart Village) di bawah kepemimpinan Keuchik bersama Tuha Peut.</p>
                        </div>
                        <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-100 dark:border-slate-700">
                            <span class="w-6 h-6 rounded-full bg-[#15803d] text-white flex items-center justify-center font-bold text-xs flex-shrink-0">2</span>
                            <p>Meningkatkan kualitas infrastruktur dasar, sarana pertanian persawahan, dan fasilitas perekonomian warga seluas 1.27 km².</p>
                        </div>
                        <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-100 dark:border-slate-700">
                            <span class="w-6 h-6 rounded-full bg-[#42b095] text-white flex items-center justify-center font-bold text-xs flex-shrink-0">3</span>
                            <p>Mengembangkan perekonomian warga melalui pemberdayaan UMKM, BUMG, dan wisata berbasis kearifan lokal Aceh.</p>
                        </div>
                        <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-100 dark:border-slate-700">
                            <span class="w-6 h-6 rounded-full bg-amber-500 text-white flex items-center justify-center font-bold text-xs flex-shrink-0">4</span>
                            <p>Meningkatkan pelayanan kesehatan masyarakat, penurunan angka stunting, dan peningkatan mutu pendidikan generasi muda.</p>
                        </div>
                        <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-100 dark:border-slate-700">
                            <span class="w-6 h-6 rounded-full bg-[#eab308] text-slate-900 flex items-center justify-center font-bold text-xs flex-shrink-0">5</span>
                            <p>Memperkokoh kerukunan sosial, pelestarian adat istiadat Aceh, syariat Islam, serta perlindungan lingkungan hidup yang berkelanjutan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. SEJARAH GAMPONG -->
        <div id="sejarah" class="bg-white dark:bg-slate-900 rounded-3xl p-8 lg:p-10 shadow-sm border border-slate-100 dark:border-slate-800">
            <div class="flex items-center gap-2.5 pb-4 border-b border-slate-100 dark:border-slate-800 mb-6">
                <span class="w-3.5 h-7 bg-[#15803d] rounded"></span>
                <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white font-heading">
                    Sejarah & Asal-Usul Gampong Leu Ue
                </h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-7 prose prose-slate dark:prose-invert max-w-none text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed space-y-4">
                    <p>
                        <strong>Gampong Leu Ue</strong> merupakan salah satu gampong bersejarah di wilayah Kecamatan Darul Imarah, Kabupaten Aceh Besar, Provinsi Aceh. Terletak di kawasan dataran subur seluas 1.27 km², gampong ini dikelilingi oleh persawahan hijau dan memiliki situs cagar budaya bersejarah Makam Meurah yang telah diresmikan sejak 12 Januari 1999.
                    </p>
                    <p>
                        Gampong Leu Ue terdiri dari empat dusun resmi: <strong>Dusun Cot Kuta, Dusun Meurah, Dusun Japakeh, dan Dusun Mata Ie</strong>. Masyarakatnya dikenal memiliki tradisi gotong royong meunasah yang kental, nilai-nilai syariat Islam yang kuat, serta semangat persaudaraan yang tinggi.
                    </p>
                    <p>
                        Kini Gampong Leu Ue terus bertransformasi menuju gampong digital mandiri (Smart Village) dengan meluncurkan pelayanan E-Surat mandiri, transparansi anggaran APBGampong secara terbuka, serta pemberdayaan UMKM lokal dan potensi wisata alam Glee Taron.
                    </p>
                </div>

                <div class="lg:col-span-5">
                    <div class="rounded-2xl overflow-hidden shadow-lg border border-slate-200 dark:border-slate-700 aspect-video lg:aspect-square">
                        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&auto=format&fit=crop&q=80" alt="Persawahan Gampong Leu Ue" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. BAGAN STRUKTUR ORGANISASI APARATUR GAMPONG -->
        <div id="struktur" class="bg-white dark:bg-slate-900 rounded-3xl p-8 lg:p-10 shadow-sm border border-slate-100 dark:border-slate-800">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100 dark:border-slate-800 mb-8">
                <div class="flex items-center gap-2.5">
                    <span class="w-3.5 h-7 bg-[#eab308] rounded"></span>
                    <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white font-heading">
                        Struktur Organisasi Pemerintahan Gampong
                    </h2>
                </div>
                <a href="{{ route('kehadiran') }}" class="text-xs font-bold text-[#0d9488] hover:underline flex items-center gap-1">
                    Cek Presensi Aparatur &rarr;
                </a>
            </div>

            <!-- Hierarchy Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($struktur as $item)
                <div class="bg-slate-50 dark:bg-slate-800/60 p-6 rounded-2xl border border-slate-100 dark:border-slate-700 hover:shadow-md transition">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-[#0d9488] to-[#15803d] text-white flex items-center justify-center font-bold text-lg mb-4 shadow">
                        {{ substr($item->title, 0, 1) }}
                    </div>
                    <h3 class="text-base font-bold text-slate-900 dark:text-white mb-2 font-heading">
                        {{ $item->title }}
                    </h3>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        {{ $item->content }}
                    </p>
                </div>
                @empty
                <p class="col-span-3 text-center text-slate-400 py-6">Data struktur belum diinput.</p>
                @endforelse
            </div>
        </div>

        <!-- 4. DATA WILAYAH & GEOGRAFIS -->
        <div class="bg-white dark:bg-slate-900 rounded-3xl p-8 lg:p-10 shadow-sm border border-slate-100 dark:border-slate-800">
            <div class="flex items-center gap-2.5 pb-4 border-b border-slate-100 dark:border-slate-800 mb-6">
                <span class="w-3.5 h-7 bg-[#42b095] rounded"></span>
                <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white font-heading">
                    Letak Geografis & Batas Wilayah
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-xs">
                <div class="bg-slate-50 dark:bg-slate-800 p-4 rounded-xl border border-slate-100 dark:border-slate-700">
                    <p class="text-slate-400 font-semibold mb-1">Sebelah Utara:</p>
                    <p class="font-bold text-slate-900 dark:text-white text-sm">Gampong Gue Gajah</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800 p-4 rounded-xl border border-slate-100 dark:border-slate-700">
                    <p class="text-slate-400 font-semibold mb-1">Sebelah Selatan:</p>
                    <p class="font-bold text-slate-900 dark:text-white text-sm">Gampong Lhang & Lambaro Kueh</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800 p-4 rounded-xl border border-slate-100 dark:border-slate-700">
                    <p class="text-slate-400 font-semibold mb-1">Sebelah Timur:</p>
                    <p class="font-bold text-slate-900 dark:text-white text-sm">Gampong Punie</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800 p-4 rounded-xl border border-slate-100 dark:border-slate-700">
                    <p class="text-slate-400 font-semibold mb-1">Sebelah Barat:</p>
                    <p class="font-bold text-slate-900 dark:text-white text-sm">Gampong Geundrieng</p>
                </div>
            </div>
            
            <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800 flex flex-wrap items-center justify-between text-xs text-slate-500 gap-4">
                <span><strong>Luas Wilayah:</strong> 1.27 km²</span>
                <span><strong>Koordinat GPS:</strong> 4.7893957, 95.9271281</span>
                <span><strong>Jumlah Dusun:</strong> 4 Dusun (Cot Kuta, Meurah, Japakeh, Mata Ie)</span>
            </div>
        </div>

    </div>
</div>

@endsection
