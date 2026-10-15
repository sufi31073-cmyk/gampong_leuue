@extends('layouts.app')

@section('title', 'Kehadiran Aparatur Gampong Hari Ini')

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
            <span class="text-white font-bold">Kehadiran Aparatur</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-start sm:items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-md text-white border border-white/30 flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md text-teal-100 border border-white/20 shadow-sm">
                            Presensi Real-Time
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-heading tracking-tight drop-shadow-sm">
                        Kehadiran Perangkat Gampong Hari Ini
                    </h1>
                    <p class="text-xs sm:text-sm text-teal-100/90 mt-1 max-w-2xl leading-relaxed">
                        Pantau kehadiran dan aktivitas kerja perangkat Gampong Leu Ue secara langsung, transparan, dan akuntabel.
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-2 text-xs font-bold text-white bg-white/15 backdrop-blur-md px-4 py-2 rounded-2xl border border-white/25 shadow-sm self-start md:self-auto">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>Status: <strong>Kantor Buka</strong></span>
            </div>
        </div>
    </div>
</div>

<div class="py-10 bg-slate-50 dark:bg-slate-950 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Info Box Status Hari Ini -->
        <div class="bg-white dark:bg-slate-900 p-6 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-4 text-xs sm:text-sm">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 dark:bg-emerald-950 text-emerald-600 flex items-center justify-center font-bold text-xl flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <p class="text-slate-500 dark:text-slate-400">Tanggal Hari Ini:</p>
                    <p class="font-bold text-slate-900 dark:text-white text-base">{{ date('d F Y') }}</p>
                </div>
            </div>

            <div class="flex items-center gap-3 text-xs">
                <span class="inline-flex items-center gap-1.5 bg-emerald-100 text-emerald-800 dark:bg-emerald-950 dark:text-emerald-300 px-3 py-1 rounded-full font-bold">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Hadir di Kantor: 8
                </span>
                <span class="inline-flex items-center gap-1.5 bg-blue-100 text-blue-800 dark:bg-blue-950 dark:text-blue-300 px-3 py-1 rounded-full font-bold">
                    <span class="w-2 h-2 rounded-full bg-blue-500"></span> Dinas Luar: 1
                </span>
            </div>
        </div>

        <!-- Tabel Kehadiran Lengkap -->
        <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden">
            <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <span class="w-3 h-6 bg-[#15803d] rounded"></span>
                    <h2 class="text-lg font-bold text-slate-900 dark:text-white font-heading">
                        Daftar Presensi Aparatur Pemerintah Gampong
                    </h2>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs sm:text-sm text-slate-600 dark:text-slate-300">
                    <thead class="bg-slate-50 dark:bg-slate-800/60 text-slate-500 dark:text-slate-400 font-bold uppercase tracking-wider text-[11px] border-b border-slate-100 dark:border-slate-700">
                        <tr>
                            <th class="py-3.5 px-6">No</th>
                            <th class="py-3.5 px-6">Nama Aparatur</th>
                            <th class="py-3.5 px-6">Jabatan</th>
                            <th class="py-3.5 px-6">Status</th>
                            <th class="py-3.5 px-6">Jam Masuk</th>
                            <th class="py-3.5 px-6">Keterangan Aktivitas</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        @foreach($kehadiranList as $index => $item)
                        @php
                            $nama = is_array($item) ? $item['nama'] : $item->name;
                            $jabatan = is_array($item) ? $item['jabatan'] : $item->position;
                            $status = is_array($item) ? $item['status'] : $item->presence_status;
                            $jamMasuk = is_array($item) ? ($item['jam_masuk'] ?? '07:45 WIB') : ($item->check_in_time ?? '07:45 WIB');
                        @endphp
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/40 transition">
                            <td class="py-4 px-6 font-mono font-bold text-slate-400">{{ $index + 1 }}</td>
                            <td class="py-4 px-6 font-bold text-slate-900 dark:text-white">{{ $nama }}</td>
                            <td class="py-4 px-6 text-slate-600 dark:text-slate-300 font-medium">{{ $jabatan }}</td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold {{ $status == 'Hadir' ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-950 dark:text-emerald-300' : 'bg-blue-100 text-blue-800 dark:bg-blue-950 dark:text-blue-300' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $status == 'Hadir' ? 'bg-emerald-500' : 'bg-blue-500' }}"></span>
                                    {{ $status }}
                                </span>
                            </td>
                            <td class="py-4 px-6 font-mono text-xs">{{ $jamMasuk }}</td>
                            <td class="py-4 px-6 text-slate-500 text-xs">Pelayanan Administrasi & Tugas Pokok</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
