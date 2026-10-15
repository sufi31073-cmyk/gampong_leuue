<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\VillageProfile;
use App\Models\TouristSpot;
use App\Models\Umkm;
use App\Models\LetterTemplate;
use App\Models\LetterRequest;
use App\Models\Complaint;
use App\Models\Transparency;
use App\Models\HeroBanner;
use App\Models\VillageOfficial;
use App\Models\Agenda;
use Illuminate\Support\Str;

class FrontEndController extends Controller
{
    /**
     * Menampilkan halaman Beranda (Konsep DeNava / OpenDesa Gampong Leu Ue)
     */
    public function index()
    {
        // 0. Hero Banner Dynamic Slides
        $heroBanners = HeroBanner::where('is_active', true)->orderBy('order', 'asc')->get();
        // 1. Artikel & Berita
        $posts = Post::with(['category', 'user'])
            ->where('is_published', true)
            ->latest()
            ->take(6)
            ->get();

        $featuredPost = $posts->first();

        // 2. Kategori Berita
        $categories = Category::withCount(['posts' => function ($query) {
            $query->where('is_published', true);
        }])->get();

        // 3. Profil Desa & Aparatur
        $profiles = VillageProfile::all()->groupBy('type');
        $visiMisi = optional($profiles->get('visi_misi'))->first();
        $sejarah = optional($profiles->get('sejarah'))->first();
        $aparatur = $profiles->get('struktur') ?? collect([]);

        // 4. Potensi Wisata & UMKM
        $wisata = TouristSpot::take(4)->get();
        $umkm = Umkm::take(4)->get();

        // 5. Layanan & Template Surat
        $templates = LetterTemplate::all();

        // 6. Transparansi & APBDes Data
        $transparansi = Transparency::latest()->take(4)->get();

        // Data Realisasi APBDes 2026
        $apbdes = [
            'tahun' => '2026',
            'pendapatan' => 1485250000,
            'pendapatan_persen' => 96.4,
            'belanja' => 1472100000,
            'belanja_persen' => 88.5,
            'pembiayaan' => 13150000,
            'pembiayaan_persen' => 100.0,
            'pendapatan' => 1480000000,
            'belanja' => 1395000000,
            'pembiayaan' => 85000000,
            'tahun' => '2026'
        ];

        // 7. Statistik Kependudukan Summary
        $statistik = [
            'total_penduduk' => 1482,
            'total_kk' => 374,
            'pria' => 752,
            'wanita' => 730,
            'dusun_count' => 4,
            'umkm_count' => 28,
            'bantuan_count' => 185,
        ];

        // 8. Agenda Gampong (Dynamic from Admin)
        $agenda = Agenda::where('is_active', true)->get();

        // 9. Running Text Pengumuman
        $pengumuman = [
            'Selamat Datang di Website Resmi Gampong Leu Ue, Kecamatan Darul Imarah, Kabupaten Aceh Besar, Aceh.',
            'Layanan E-Surat Mandiri Warga kini dapat diakses 24 Jam Nonstop secara online dari smartphone Anda.',
            'Penyaluran Bantuan Langsung Tunai (BLT) Dana Desa Tahap I telah selesai disalurkan kepada 75 KPM.',
            'Mari Sukseskan Gerakan Gampong Bersih dan Sehat menuju Gampong Leu Ue Smart Village 2026.'
        ];

        // 10. Aparatur Gampong Kehadiran Hari Ini (Dynamic from Admin)
        $kehadiranHariIni = $aparatur;

        return view('welcome', compact(
            'heroBanners',
            'posts',
            'featuredPost',
            'categories',
            'visiMisi',
            'sejarah',
            'aparatur',
            'wisata',
            'umkm',
            'templates',
            'transparansi',
            'apbdes',
            'statistik',
            'agenda',
            'pengumuman',
            'kehadiranHariIni'
        ));
    }

    /**
     * Menampilkan halaman Profil Desa
     */
    public function profil()
    {
        $profiles = VillageProfile::all()->groupBy('type');
        $visiMisi = optional($profiles->get('visi_misi'))->first();
        $sejarah = optional($profiles->get('sejarah'))->first();
        $struktur = $profiles->get('struktur') ?? collect([]);

        return view('pages.profil', compact('profiles', 'visiMisi', 'sejarah', 'struktur'));
    }

    /**
     * Menampilkan Struktur Pemerintahan & Lembaga Desa
     */
    public function pemerintahan()
    {
        $aparatur = VillageOfficial::where('is_active', true)->orderBy('order', 'asc')->get();
        return view('pages.pemerintahan', compact('aparatur'));
    }

    /**
     * Menampilkan halaman Kehadiran Aparatur Gampong (Fitur Khas Gampong Leu Ue DeNava)
     */
    public function kehadiran()
    {
        $kehadiranList = VillageOfficial::where('is_active', true)->orderBy('order', 'asc')->get();
        return view('pages.kehadiran', compact('kehadiranList'));
    }

    /**
     * Menampilkan Dashboard Data & Statistik Kependudukan
     */
    public function statistik()
    {
        $statistik = [
            'total_penduduk' => 1482,
            'total_kk' => 374,
            'pria' => 752,
            'wanita' => 730,
            'usia' => [
                ['kelompok' => 'Balita (0-4 Tahun)', 'jumlah' => 112, 'persen' => 7.6],
                ['kelompok' => 'Anak-Anak (5-14 Tahun)', 'jumlah' => 248, 'persen' => 16.7],
                ['kelompok' => 'Remaja (15-24 Tahun)', 'jumlah' => 295, 'persen' => 19.9],
                ['kelompok' => 'Dewasa Produktif (25-59 Tahun)', 'jumlah' => 682, 'persen' => 46.0],
                ['kelompok' => 'Lansia (60+ Tahun)', 'jumlah' => 145, 'persen' => 9.8],
            ],
            'pendidikan' => [
                ['tingkat' => 'Tidak / Belum Sekolah', 'jumlah' => 120, 'persen' => 8.1],
                ['tingkat' => 'SD / Sederajat', 'jumlah' => 380, 'persen' => 25.6],
                ['tingkat' => 'SMP / Sederajat', 'jumlah' => 395, 'persen' => 26.7],
                ['tingkat' => 'SMA / SMK / Sederajat', 'jumlah' => 452, 'persen' => 30.5],
                ['tingkat' => 'Diploma / Sarjana (D3/S1/S2)', 'jumlah' => 135, 'persen' => 9.1],
            ],
            'pekerjaan' => [
                ['pekerjaan' => 'Petani & Perkebunan', 'jumlah' => 460, 'persen' => 41.2],
                ['pekerjaan' => 'Pedagang / Wiraswasta', 'jumlah' => 290, 'persen' => 26.0],
                ['pekerjaan' => 'Pengrajin & UMKM', 'jumlah' => 145, 'persen' => 13.0],
                ['pekerjaan' => 'PNS / Guru / Tenaga Medis', 'jumlah' => 95, 'persen' => 8.5],
                ['pekerjaan' => 'Buruh / Karyawan Swasta', 'jumlah' => 38, 'persen' => 3.4],
                ['pekerjaan' => 'Lainnya / Pelajar / Ibu Rumah Tangga', 'jumlah' => 88, 'persen' => 7.9],
            ],
            'agama' => [
                ['agama' => 'Islam', 'jumlah' => 1475, 'persen' => 99.5],
                ['agama' => 'Lainnya', 'jumlah' => 7, 'persen' => 0.5],
            ],
            'dusun' => [
                ['nama' => 'Dusun Cot Kuta', 'kk' => 105, 'jiwa' => 410, 'pria' => 210, 'wanita' => 200],
                ['nama' => 'Dusun Meurah', 'kk' => 98, 'jiwa' => 385, 'pria' => 195, 'wanita' => 190],
                ['nama' => 'Dusun Japakeh', 'kk' => 92, 'jiwa' => 370, 'pria' => 185, 'wanita' => 185],
                ['nama' => 'Dusun Mata Ie', 'kk' => 79, 'jiwa' => 317, 'pria' => 162, 'wanita' => 155],
            ],
            'bansos' => [
                ['program' => 'Bantuan Langsung Tunai (BLT-DD)', 'kpm' => 75, 'keterangan' => 'Rp 300.000 / Bulan (APBD Gampong)'],
                ['program' => 'Program Keluarga Harapan (PKH)', 'kpm' => 58, 'keterangan' => 'Kemensos RI'],
                ['program' => 'Bantuan Pangan Non Tunai (BPNT)', 'kpm' => 92, 'keterangan' => 'Sembako & Beras Sejahtera'],
                ['program' => 'Kartu Indonesia Sehat (KIS PBI)', 'kpm' => 210, 'keterangan' => 'BPJS Kesehatan Gratis APBN/APBD'],
            ]
        ];

        return view('pages.statistik', compact('statistik'));
    }

    /**
     * Menampilkan Portal Berita, Wisata & UMKM
     */
    public function informasi(Request $request)
    {
        $query = Post::with(['category', 'user'])->where('is_published', true);

        if ($request->filled('kategori')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->kategori);
            });
        }

        if ($request->filled('cari')) {
            $query->where('title', 'like', '%' . $request->cari . '%')
                  ->orWhere('content', 'like', '%' . $request->cari . '%');
        }

        $posts = $query->latest()->paginate(9);
        $categories = Category::all();
        $wisata = TouristSpot::all();
        $umkm = Umkm::all();

        return view('pages.informasi', compact('posts', 'categories', 'wisata', 'umkm'));
    }

    /**
     * Menampilkan Detail Artikel Berita
     */
    public function beritaDetail($slug)
    {
        $post = Post::with(['category', 'user'])->where('slug', $slug)->where('is_published', true)->firstOrFail();
        $relatedPosts = Post::where('id', '!=', $post->id)->where('is_published', true)->latest()->take(4)->get();
        $categories = Category::all();

        return view('pages.berita-detail', compact('post', 'relatedPosts', 'categories'));
    }

    /**
     * Menampilkan Halaman Lapak UMKM Desa
     */
    public function lapak()
    {
        $umkms = Umkm::all();
        $wisata = TouristSpot::all();
        $wisatas = $wisata;
        return view('pages.lapak', compact('umkms', 'wisata', 'wisatas'));
    }

    /**
     * Menampilkan Halaman Peta GIS Interaktif Desa
     */
    public function peta()
    {
        return view('pages.peta');
    }

    /**
     * Menampilkan form E-Surat Mandiri
     */
    public function esurat()
    {
        $templates = LetterTemplate::all();
        return view('pages.esurat', compact('templates'));
    }

    /**
     * Memproses pengajuan E-Surat (Secured & Sanitized)
     */
    public function submitEsurat(Request $request)
    {
        $validated = $request->validate([
            'letter_template_id' => 'required|exists:letter_templates,id',
            'nik' => 'required|digits:16',
            'name' => 'required|string|max:255',
            'purpose' => 'required|string|max:1000',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $data = [
            'letter_template_id' => $validated['letter_template_id'],
            'nik' => strip_tags($validated['nik']),
            'name' => strip_tags($validated['name']),
            'purpose' => strip_tags($validated['purpose']),
            'resi_number' => 'SRT-' . strtoupper(Str::random(8)),
            'status' => 'pending',
        ];

        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }

        $letterRequest = LetterRequest::create($data);

        return back()->with('success', 'Pengajuan surat berhasil dikirim! Nomor Resi Anda: <span class="font-mono bg-white px-3 py-1 rounded-md border border-green-300 font-extrabold text-green-900 tracking-wider">' . e($data['resi_number']) . '</span>. Simpan nomor resi ini untuk melacak status surat Anda secara online.');
    }

    /**
     * Melacak status E-Surat
     */
    public function trackEsurat(Request $request)
    {
        $request->validate(['resi_number' => 'required|string|max:50']);
        $cleanedResi = strip_tags(trim($request->resi_number));
        $surat = LetterRequest::with('template')->where('resi_number', $cleanedResi)->first();
        
        if (!$surat) {
            return back()->with('error', 'Surat dengan Nomor Resi "' . e($cleanedResi) . '" tidak ditemukan. Mohon periksa kembali nomor resi Anda.');
        }

        return back()->with('tracked_surat', $surat);
    }

    /**
     * Menampilkan form Kotak Aspirasi
     */
    public function aspirasi()
    {
        $complaints = Complaint::latest()->take(6)->get();
        return view('pages.aspirasi', compact('complaints'));
    }

    /**
     * Memproses pengiriman Aspirasi (Secured & Sanitized)
     */
    public function submitAspirasi(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|digits:16',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:2000',
        ]);

        Complaint::create([
            'nik' => strip_tags($validated['nik']),
            'name' => strip_tags($validated['name']),
            'title' => strip_tags($validated['title']),
            'content' => strip_tags($validated['content']),
            'status' => 'pending',
        ]);

        return back()->with('success', 'Terima kasih, aspirasi/laporan Anda telah berhasil terkirim dan akan segera ditindaklanjuti oleh aparat desa dalam 1x24 jam.');
    }

    /**
     * Menampilkan Halaman Transparansi APBDes
     */
    public function transparansi()
    {
        $transparansi = Transparency::latest()->get();

        $apbdesDetail = [
            'tahun' => '2026',
            'pendapatan' => [
                'total' => 1485250000,
                'items' => [
                    ['sumber' => 'Dana Desa (APBN)', 'nominal' => 895000000, 'persen' => 60.3],
                    ['sumber' => 'Alokasi Dana Gampong (ADG Kab. Aceh Besar)', 'nominal' => 450250000, 'persen' => 30.3],
                    ['sumber' => 'Bagi Hasil Pajak & Retribusi Daerah', 'nominal' => 65000000, 'persen' => 4.4],
                    ['sumber' => 'Pendapatan Asli Gampong (PAG / UMKM & Koperasi)', 'nominal' => 45000000, 'persen' => 3.0],
                    ['sumber' => 'Bantuan Keuangan Provinsi Aceh', 'nominal' => 30000000, 'persen' => 2.0],
                ]
            ],
            'belanja' => [
                'total' => 1472100000,
                'items' => [
                    ['bidang' => 'Bidang Penyelenggaraan Pemerintahan Desa', 'nominal' => 450000000, 'realisasi' => 412000000, 'persen' => 91.5],
                    ['bidang' => 'Bidang Pelaksanaan Pembangunan Desa (Infrastruktur & Sarpras)', 'nominal' => 620000000, 'realisasi' => 545600000, 'persen' => 88.0],
                    ['bidang' => 'Bidang Pembinaan Kemasyarakatan (Budaya, Pemuda & Olahraga)', 'nominal' => 145000000, 'realisasi' => 128000000, 'persen' => 88.2],
                    ['bidang' => 'Bidang Pemberdayaan Masyarakat (UMKM & Pertanian)', 'nominal' => 180000000, 'realisasi' => 152000000, 'persen' => 84.4],
                    ['bidang' => 'Bidang Penanggulangan Bencana, Darurat & Mendesak (BLT-DD)', 'nominal' => 77100000, 'realisasi' => 65000000, 'persen' => 84.3],
                ]
            ],
            'pembiayaan' => [
                'penerimaan' => 13150000,
                'pengeluaran' => 0,
                'sisa' => 13150000,
            ]
        ];

        return view('pages.transparansi', compact('transparansi', 'apbdesDetail'));
    }
}
