@extends('layouts.app')

@section('title', 'Peta Geografis & Titik Fasilitas Gampong')

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
            <span class="text-teal-200">Peta & Lokasi</span>
            <span class="text-teal-300/70">/</span>
            <span class="text-white font-bold">GIS Gampong</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-start sm:items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-md text-white border border-white/30 flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md text-teal-100 border border-white/20 shadow-sm">
                            Sistem Informasi Geografis (GIS)
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-heading tracking-tight drop-shadow-sm">
                        Peta Wilayah & Fasilitas Gampong Leu Ue
                    </h1>
                    <p class="text-xs sm:text-sm text-teal-100/90 mt-1 max-w-2xl leading-relaxed">
                        Eksplorasi batas wilayah administrasi 4 dusun, lokasi kantor pelayanan, sarana meunasah, fasilitas kesehatan, dan destinasi wisata alam.
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-2 text-xs font-bold text-white bg-white/15 backdrop-blur-md px-4 py-2 rounded-2xl border border-white/25 shadow-sm self-start md:self-auto font-mono">
                <span class="w-2.5 h-2.5 rounded-full bg-amber-400 animate-pulse"></span>
                <span>4.78939, 95.92712</span>
            </div>
        </div>
    </div>
</div>

<div class="py-10 bg-slate-50 dark:bg-slate-950 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Peta Container -->
        <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
            <div id="leaflet-full-map" class="h-[520px] w-full rounded-2xl border border-slate-200 dark:border-slate-700 shadow-inner z-10"></div>

            <!-- Legend Bar -->
            <div class="mt-6 flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-slate-100 dark:border-slate-800 text-xs">
                <div class="flex flex-wrap items-center gap-4">
                    <span class="flex items-center gap-2 font-bold text-slate-700 dark:text-slate-300">
                        <span class="w-3 h-3 rounded-full bg-red-500 shadow"></span> Kantor Keuchik / Pemerintahan
                    </span>
                    <span class="flex items-center gap-2 font-bold text-slate-700 dark:text-slate-300">
                        <span class="w-3 h-3 rounded-full bg-emerald-500 shadow"></span> Sarana Ibadah (Meunasah Gampong)
                    </span>
                    <span class="flex items-center gap-2 font-bold text-slate-700 dark:text-slate-300">
                        <span class="w-3 h-3 rounded-full bg-blue-500 shadow"></span> Posyandu / Polindes
                    </span>
                    <span class="flex items-center gap-2 font-bold text-slate-700 dark:text-slate-300">
                        <span class="w-3 h-3 rounded-full bg-amber-500 shadow"></span> Cagar Budaya & Wisata Glee Taron
                    </span>
                </div>
                <span class="text-slate-400 font-mono text-[11px]">Koordinat: 4.7893957, 95.9271281</span>
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const mapEl = document.getElementById('leaflet-full-map');
    if (mapEl && typeof L !== 'undefined') {
        const lat = 4.7893957;
        const lng = 95.9271281;

        const map = L.map('leaflet-full-map').setView([lat, lng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Marker 1: Kantor Keuchik
        L.marker([lat, lng]).addTo(map)
            .bindPopup('<b>Kantor Keuchik Gampong Leu Ue</b><br>Jl. Jenderal Sudirman - Mata Ie, Kode Pos 23352.<br><i>Pusat Pelayanan & Administrasi Warga.</i>')
            .openPopup();

        // Marker 2: Meunasah Gampong
        L.marker([lat + 0.002, lng - 0.001]).addTo(map)
            .bindPopup('<b>Meunasah Gampong Leu Ue</b><br>Pusat Kegiatan Keagamaan & Musyawarah Adat.');

        // Marker 3: Polindes / Posyandu
        L.marker([lat + 0.001, lng + 0.002]).addTo(map)
            .bindPopup('<b>Posyandu & Polindes Leu Ue</b><br>Pelayanan Kesehatan Ibu & Anak, Penanganan Stunting.');

        // Marker 4: Makam Meurah (Cagar Budaya)
        L.marker([lat - 0.002, lng + 0.002]).addTo(map)
            .bindPopup('<b>Situs Makam Meurah</b><br>Cagar Budaya Peninggalan Sejarah Kesultanan Aceh (1999).');

        // Marker 5: Wisata Alam Glee Taron
        L.marker([lat + 0.003, lng + 0.003]).addTo(map)
            .bindPopup('<b>Wisata Alam Glee Taron</b><br>Panorama Sunrise, Sunset & Pemandangan Alam Pegunungan.');
    }
});
</script>
@endpush
