@extends('layouts.app')

@section('title', 'Layanan E-Surat Mandiri Warga Gampong')

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
            <span class="text-white font-bold">E-Surat Mandiri</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-start sm:items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-md text-white border border-white/30 flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md text-teal-100 border border-white/20 shadow-sm">
                            Pelayanan Mandiri 24 Jam
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-heading tracking-tight drop-shadow-sm">
                        Layanan E-Surat Mandiri & Lacak Resi
                    </h1>
                    <p class="text-xs sm:text-sm text-teal-100/90 mt-1 max-w-2xl leading-relaxed">
                        Ajukan surat keterangan resmi secara online tanpa harus antre di kantor gampong. Dapatkan Nomor Resi dan pantau status surat secara transparan.
                    </p>
                </div>
            </div>

            <a href="#lacak-surat" class="inline-flex items-center gap-2 text-xs font-bold text-white bg-white/15 backdrop-blur-md px-4 py-2 rounded-2xl border border-white/25 shadow-sm self-start md:self-auto hover:bg-white/25 transition">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>Lacak Nomor Resi &rarr;</span>
            </a>
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
                    <h3 class="font-extrabold text-base mb-1 font-heading">Pengajuan Berhasil Dikirim!</h3>
                    <p class="text-xs sm:text-sm leading-relaxed">{!! session('success') !!}</p>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 dark:bg-red-950/80 border-2 border-red-300 dark:border-red-700 text-red-900 dark:text-red-200 rounded-3xl p-6 shadow-md flex items-start gap-4">
                <div class="w-10 h-10 bg-red-500 text-white rounded-full flex items-center justify-center flex-shrink-0 shadow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-extrabold text-base mb-1 font-heading">Pemberitahuan</h3>
                    <p class="text-xs sm:text-sm leading-relaxed">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- 1. FORM PENGAJUAN SURAT BARU (7 KOLOM) -->
            <div class="lg:col-span-7 bg-white dark:bg-slate-900 rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-slate-800 relative overflow-hidden">
                <div class="flex items-center gap-2.5 pb-4 border-b border-slate-100 dark:border-slate-800 mb-6">
                    <span class="w-3.5 h-7 bg-[#0d9488] rounded"></span>
                    <h2 class="text-xl font-extrabold text-slate-900 dark:text-white font-heading">
                        Formulir Pengajuan Surat Mandiri
                    </h2>
                </div>

                <form action="{{ route('esurat.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-5 text-xs sm:text-sm">
                    @csrf
                    
                    <!-- Pilihan Template Surat -->
                    <div>
                        <label class="block font-bold text-slate-700 dark:text-slate-200 mb-1.5">Pilih Jenis Surat:</label>
                        <select name="letter_template_id" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-[#0d9488] focus:outline-none">
                            <option value="">-- Pilih Jenis Surat yang Dibutuhkan --</option>
                            @foreach($templates as $tpl)
                            <option value="{{ $tpl->id }}">{{ $tpl->name }}</option>
                            @endforeach
                        </select>
                        @error('letter_template_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- NIK & Nama Lengkap -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-bold text-slate-700 dark:text-slate-200 mb-1.5">Nomor Induk Kependudukan (NIK):</label>
                            <input type="text" name="nik" required maxlength="16" pattern="[0-9]{16}" placeholder="16 digit sesuai e-KTP / KK" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-[#0d9488] focus:outline-none font-mono">
                            @error('nik') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 dark:text-slate-200 mb-1.5">Nama Lengkap Pemohon:</label>
                            <input type="text" name="name" required placeholder="Nama lengkap sesuai KTP" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-[#0d9488] focus:outline-none">
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Tujuan / Keperluan -->
                    <div>
                        <label class="block font-bold text-slate-700 dark:text-slate-200 mb-1.5">Keperluan Pembuatan Surat:</label>
                        <textarea name="purpose" required rows="3" placeholder="Jelaskan secara ringkas keperluan surat (cth: Pengajuan pinjaman KUR Mikro Bank, persyaratan beasiswa, SKU, dll.)" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:ring-2 focus:ring-[#0d9488] focus:outline-none"></textarea>
                        @error('purpose') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Upload Lampiran Foto/KTP -->
                    <div>
                        <label class="block font-bold text-slate-700 dark:text-slate-200 mb-1.5">Upload Dokumen Pendukung (KTP/KK - Opsional):</label>
                        <input type="file" name="attachment" accept=".jpg,.jpeg,.png,.pdf" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#0d9488] file:text-white hover:file:bg-[#0f766e]">
                        <p class="text-[11px] text-slate-400 mt-1">Format: JPG, PNG, atau PDF (Maksimal 2 MB)</p>
                        @error('attachment') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-[#0d9488] hover:bg-[#0f766e] text-white font-extrabold py-3.5 px-6 rounded-2xl shadow-lg transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        Kirim Permohonan Surat
                    </button>
                </form>
            </div>

            <!-- 2. LACAK RESI SURAT & TIMELINE (5 KOLOM) -->
            <div id="lacak-surat" class="lg:col-span-5 space-y-8">
                
                <!-- Box Lacak Resi -->
                <div class="bg-gradient-to-br from-[#15803d] to-[#166534] text-white rounded-3xl p-8 shadow-xl relative overflow-hidden">
                    <h3 class="font-extrabold text-lg mb-2 font-heading">Lacak Status Resi Surat</h3>
                    <p class="text-xs text-slate-200 leading-relaxed mb-6">
                        Masukkan kode nomor resi yang Anda dapatkan saat mengajukan surat (cth: <strong class="text-teal-200">SRT-8899A1</strong>).
                    </p>

                    <form action="{{ route('esurat.track') }}" method="POST" class="space-y-3">
                        @csrf
                        <div class="relative">
                            <input type="text" name="resi_number" required placeholder="Masukkan Nomor Resi..." class="w-full pl-10 pr-24 py-3 rounded-2xl text-xs sm:text-sm bg-white text-slate-900 focus:outline-none focus:ring-2 focus:ring-teal-400 font-mono font-bold uppercase">
                            <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <button type="submit" class="absolute right-1.5 top-1.5 bottom-1.5 bg-[#0d9488] hover:bg-[#0f766e] text-white text-xs font-bold px-4 rounded-xl shadow transition">
                                Lacak
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Hasil Pelacakan Surat -->
                @if(session('tracked_surat'))
                @php $surat = session('tracked_surat'); @endphp
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 animate-fade-in-up">
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800 mb-4">
                        <span class="text-xs text-slate-400">Nomor Resi:</span>
                        <span class="font-mono font-extrabold text-sm text-[#0d9488] bg-teal-50 dark:bg-slate-800 px-3 py-0.5 rounded-full">{{ $surat->resi_number }}</span>
                    </div>

                    <div class="space-y-3 text-xs">
                        <div class="flex justify-between">
                            <span class="text-slate-500 dark:text-slate-400">Nama Pemohon:</span>
                            <span class="font-bold text-slate-900 dark:text-white">{{ $surat->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500 dark:text-slate-400">Jenis Surat:</span>
                            <span class="font-bold text-slate-900 dark:text-white">{{ $surat->template->name ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500 dark:text-slate-400">Tanggal Pengajuan:</span>
                            <span class="font-semibold text-slate-700 dark:text-slate-300">{{ $surat->created_at->format('d M Y, H:i') }} WIB</span>
                        </div>
                    </div>

                    <!-- Progress Status Timeline -->
                    <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800 space-y-3">
                        <p class="text-xs font-bold text-slate-700 dark:text-slate-300">Status Permohonan:</p>
                        
                        @if($surat->status == 'ready')
                            <div class="p-3 bg-emerald-50 dark:bg-emerald-950/80 rounded-2xl border border-emerald-200 dark:border-emerald-800 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center flex-shrink-0 font-bold">
                                    ✓
                                </div>
                                <div class="text-xs">
                                    <p class="font-bold text-emerald-800 dark:text-emerald-200">Surat Selesai & Ditandatangani!</p>
                                    <p class="text-[11px] text-emerald-600 dark:text-emerald-300">Silakan ambil berkas fisik di Kantor Keuchik atau unduh via admin.</p>
                                </div>
                            </div>
                        @elseif($surat->status == 'processing')
                            <div class="p-3 bg-blue-50 dark:bg-blue-950/80 rounded-2xl border border-blue-200 dark:border-blue-800 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-500 text-white flex items-center justify-center flex-shrink-0 font-bold animate-spin">
                                    ⟳
                                </div>
                                <div class="text-xs">
                                    <p class="font-bold text-blue-800 dark:text-blue-200">Sedang Diproses Perangkat Gampong</p>
                                    <p class="text-[11px] text-blue-600 dark:text-blue-300">Berkas sedang diverifikasi dan menunggu penandatanganan Keuchik.</p>
                                </div>
                            </div>
                        @else
                            <div class="p-3 bg-amber-50 dark:bg-amber-950/80 rounded-2xl border border-amber-200 dark:border-amber-800 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-amber-500 text-white flex items-center justify-center flex-shrink-0 font-bold">
                                    ⏳
                                </div>
                                <div class="text-xs">
                                    <p class="font-bold text-amber-800 dark:text-amber-200">Menunggu Verifikasi Berkas</p>
                                    <p class="text-[11px] text-amber-600 dark:text-amber-300">Permohonan telah masuk ke antrean Kasi Pelayanan.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Petunjuk Alur -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 text-xs text-slate-600 dark:text-slate-300 space-y-3">
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white font-heading">Alur Pembuatan Surat Online:</h4>
                    <ol class="list-decimal list-inside space-y-1.5 text-[11px]">
                        <li>Isi formulir di samping dengan NIK dan nama sesuai e-KTP.</li>
                        <li>Sistem secara otomatis akan menerbitkan <strong>Nomor Resi Unik</strong>.</li>
                        <li>Petugas Kasi Pelayanan memverifikasi kelengkapan data pemohon.</li>
                        <li>Surat ditandatangani Keuchik dan siap diambil di kantor gampong.</li>
                    </ol>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection
