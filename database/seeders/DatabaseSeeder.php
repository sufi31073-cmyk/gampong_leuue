<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 0.1 Perangkat Gampong (Aparatur)
        VillageOfficial::truncate();
        $officials = [
            ['name' => 'Razali', 'position' => 'Keuchik Gampong', 'nip' => '19750812 200501 1 002', 'phone' => '08126908207', 'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&auto=format&fit=crop&q=80', 'presence_status' => 'Hadir', 'check_in_time' => '07:45 WIB', 'order' => 1, 'is_active' => true],
            ['name' => 'Tgk. Muhammad Yusuf', 'position' => 'Imuem Meunasah', 'nip' => '-', 'phone' => '08126908208', 'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=300&auto=format&fit=crop&q=80', 'presence_status' => 'Hadir', 'check_in_time' => '07:50 WIB', 'order' => 2, 'is_active' => true],
            ['name' => 'Safriadi, S.Pd.', 'position' => 'Sekretaris Gampong', 'nip' => '19820315 200804 1 005', 'phone' => '08126908209', 'photo' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300&auto=format&fit=crop&q=80', 'presence_status' => 'Hadir', 'check_in_time' => '07:55 WIB', 'order' => 3, 'is_active' => true],
            ['name' => 'Nurhayati', 'position' => 'Kaur Keuangan', 'nip' => '-', 'phone' => '08126908210', 'photo' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=300&auto=format&fit=crop&q=80', 'presence_status' => 'Hadir', 'check_in_time' => '08:00 WIB', 'order' => 4, 'is_active' => true],
            ['name' => 'Zulkifli', 'position' => 'Kaur Umum & Perencanaan', 'nip' => '-', 'phone' => '08126908211', 'photo' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=300&auto=format&fit=crop&q=80', 'presence_status' => 'Hadir', 'check_in_time' => '08:00 WIB', 'order' => 5, 'is_active' => true],
            ['name' => 'Syamsuddin', 'position' => 'Ketua Tuha Peut (BPD)', 'nip' => '-', 'phone' => '08126908212', 'photo' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=300&auto=format&fit=crop&q=80', 'presence_status' => 'Hadir', 'check_in_time' => '08:15 WIB', 'order' => 6, 'is_active' => true],
            ['name' => 'Irwansyah', 'position' => 'Kepala Dusun Cot Kuta', 'nip' => '-', 'phone' => '08126908213', 'photo' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=300&auto=format&fit=crop&q=80', 'presence_status' => 'Hadir', 'check_in_time' => '08:05 WIB', 'order' => 7, 'is_active' => true],
            ['name' => 'Fakhrurrazi', 'position' => 'Kepala Dusun Meurah', 'nip' => '-', 'phone' => '08126908214', 'photo' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=300&auto=format&fit=crop&q=80', 'presence_status' => 'Hadir', 'check_in_time' => '08:10 WIB', 'order' => 8, 'is_active' => true],
            ['name' => 'Mariana', 'position' => 'Kepala Dusun Japakeh', 'nip' => '-', 'phone' => '08126908215', 'photo' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=300&auto=format&fit=crop&q=80', 'presence_status' => 'Hadir', 'check_in_time' => '08:10 WIB', 'order' => 9, 'is_active' => true],
        ];
        foreach ($officials as $off) {
            VillageOfficial::create($off);
        }

        // 0.2 Agenda Gampong
        Agenda::truncate();
        $agendasData = [
            [
                'title' => 'Musrenbang Gampong 2026',
                'event_date' => '15 Agu 2026',
                'event_time' => '09:00 WIB - Selesai',
                'location' => 'Meunasah Gampong Leu Ue',
                'organizer' => 'Keuchik & Tuha Peut',
                'description' => 'Musyawarah Perencanaan Pembangunan Gampong Leu Ue Tahun Anggaran 2026 bersama elemen masyarakat 4 dusun.',
                'status' => 'Selesai',
                'is_active' => true,
            ],
            [
                'title' => 'Kenduri & Peringatan Maulid Nabi',
                'event_date' => '18 Agu 2026',
                'event_time' => '08:00 WIB - Selesai',
                'location' => 'Meunasah Gampong & Lapangan',
                'organizer' => 'Imuem Meunasah & Remaja Masjid',
                'description' => 'Peringatan Hari Besar Islam (PHBI) Maulid Nabi Muhammad SAW dilanjutkan Kenduri bersama warga 4 Dusun Gampong Leu Ue.',
                'status' => 'Selesai',
                'is_active' => true,
            ],
            [
                'title' => 'Gotong Royong Kebersihan Meunasah & Saluran Air',
                'event_date' => '19 Agu 2026',
                'event_time' => '07:30 WIB - Selesai',
                'location' => 'Meunasah & Saluran Irigasi Persawahan',
                'organizer' => 'Aparatur & Seluruh Kepala Dusun',
                'description' => 'Aksi gotong royong massal pembersihan drainase pemukiman dan saluran persawahan gampong.',
                'status' => 'Selesai',
                'is_active' => true,
            ],
            [
                'title' => 'Posyandu Balita & Pelayanan Kesehatan Ibu Hamil',
                'event_date' => '25 Agu 2026',
                'event_time' => '08:30 WIB - 12:00 WIB',
                'location' => 'Posyandu / Polindes Gampong Leu Ue',
                'organizer' => 'Bidan Desa & Kader Posyandu',
                'description' => 'Penimbangan balita, pemberian makanan tambahan (PMT), imunisasi rutin, serta pemeriksaan kesehatan lansia.',
                'status' => 'Akan Datang',
                'is_active' => true,
            ],
        ];
        foreach ($agendasData as $ag) {
            Agenda::create($ag);
        }

        // 0. Hero Banners
        HeroBanner::truncate();
        $heroBannersData = [
            [
                'title' => 'Pelayanan E-Surat Mandiri',
                'subtitle' => 'Urus Berkas Kependudukan Semudah Sentuhan Jari Tanpa Perlu Antre di Kantor Gampong. Dapatkan nomor resi unik pelacakan status.',
                'badge_text' => '⚡ Layanan Mandiri 24 Jam Nonstop',
                'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1600&auto=format&fit=crop&q=80',
                'cta_text' => 'Buat Surat Sekarang',
                'cta_url' => '/e-surat',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Pesona Alam Persawahan & Wisata Glee Taron',
                'subtitle' => 'Nikmati keindahan panorama matahari terbit, udara segar persawahan subur, serta situs cagar budaya bersejarah Makam Meurah.',
                'badge_text' => '🌿 Destinasi Wisata & Budaya',
                'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1600&auto=format&fit=crop&q=80',
                'cta_text' => 'Jelajahi Wisata & UMKM',
                'cta_url' => '/lapak',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Transparansi APBGampong 2026',
                'subtitle' => 'Keterbukaan Informasi Anggaran Pendapatan dan Belanja Gampong Leu Ue Secara Akuntabel. Pantau realisasi pembangunan desa.',
                'badge_text' => '📊 Keterbukaan Informasi Publik',
                'image' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=1600&auto=format&fit=crop&q=80',
                'cta_text' => 'Lihat Realisasi APBGampong',
                'cta_url' => '/transparansi',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Sistem Informasi Geografis (GIS) Gampong',
                'subtitle' => 'Peta Digital Interaktif Batas Wilayah 4 Dusun, Fasilitas Meunasah, Posyandu, dan Cagar Budaya Gampong Leu Ue.',
                'badge_text' => '📍 Pemetaan Digital Presisi',
                'image' => 'https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?w=1600&auto=format&fit=crop&q=80',
                'cta_text' => 'Buka Peta Interaktif',
                'cta_url' => '/peta',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($heroBannersData as $banner) {
            HeroBanner::create($banner);
        }

        // 1. Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@leuue.sigapaceh.id'],
            [
                'name' => 'Administrator Gampong Leu Ue',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Categories
        $categoriesData = [
            ['name' => 'Pemerintahan', 'slug' => 'pemerintahan'],
            ['name' => 'Pembangunan Desa', 'slug' => 'pembangunan-desa'],
            ['name' => 'Kemasyarakatan', 'slug' => 'kemasyarakatan'],
            ['name' => 'Pengumuman Resmi', 'slug' => 'pengumuman-resmi'],
            ['name' => 'Wisata & Budaya', 'slug' => 'wisata-dan-budaya'],
            ['name' => 'Lapak UMKM', 'slug' => 'lapak-umkm'],
        ];

        $categories = [];
        foreach ($categoriesData as $cat) {
            $categories[$cat['slug']] = Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }

        // 3. Posts (Berita & Artikel Desa)
        $postsData = [
            [
                'user_id' => $admin->id,
                'category_id' => $categories['pemerintahan']->id,
                'title' => 'Musyawarah Perencanaan Pembangunan Gampong (Musrenbang) Tahun Anggaran 2026',
                'slug' => 'musrenbang-gampong-tahun-anggaran-2026',
                'image' => 'https://images.unsplash.com/photo-1577495508048-b635879837f1?w=800&auto=format&fit=crop&q=80',
                'content' => 'Pemerintah Gampong Leu Ue sukses menyelenggarakan Musyawarah Perencanaan Pembangunan Gampong (Musrenbang) untuk menetapkan prioritas RKPGampong Tahun Anggaran 2026. Acara dihadiri oleh Tuha Peut, Imuem Meunasah, Tokoh Adat, Pengurus PKK, serta perwakilan pemuda dan kelompok tani. Fokus pembangunan tahun ini difokuskan pada peningkatan infrastruktur jalan usaha tani di kawasan persawahan, digitalisasi layanan mandiri warga, serta bantuan ketahanan pangan.',
                'is_published' => true,
                'created_at' => now()->subDays(1),
            ],
            [
                'user_id' => $admin->id,
                'category_id' => $categories['pembangunan-desa']->id,
                'title' => 'Penyaluran BLT Dana Gampong Tahap I untuk 75 Keluarga Penerima Manfaat',
                'slug' => 'penyaluran-blt-dana-gampong-tahap-1-2026',
                'image' => 'https://images.unsplash.com/photo-1593113598332-cd288d649433?w=800&auto=format&fit=crop&q=80',
                'content' => 'Bertempat di Meunasah Gampong, Pemerintah Gampong Leu Ue bersama Pendamping Desa dan Babinsa menyalurkan Bantuan Langsung Tunai (BLT) Dana Gampong kepada 75 Keluarga Penerima Manfaat (KPM). Setiap KPM menerima bantuan tunai secara transparan dan tepat sasaran guna mendukung pemulihan ekonomi keluarga rentan di Kecamatan Darul Imarah.',
                'is_published' => true,
                'created_at' => now()->subDays(3),
            ],
            [
                'user_id' => $admin->id,
                'category_id' => $categories['kemasyarakatan']->id,
                'title' => 'Kegiatan Posyandu Integrasi dan Pencegahan Stunting Balita Gampong Leu Ue',
                'slug' => 'kegiatan-posyandu-dan-pencegahan-stunting',
                'image' => 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=800&auto=format&fit=crop&q=80',
                'content' => 'Kader Posyandu bersama Bidan Gampong menggelar pemeriksaan rutin bulanan untuk balita dan ibu hamil. Program ini dilengkapi dengan pemberian makanan tambahan (PMT) bergizi tinggi seperti telur, susu, dan kacang hijau dalam rangka mendukung target Zero Stunting di Gampong Leu Ue, Kecamatan Darul Imarah, Aceh Besar.',
                'is_published' => true,
                'created_at' => now()->subDays(5),
            ],
            [
                'user_id' => $admin->id,
                'category_id' => $categories['wisata-dan-budaya']->id,
                'title' => 'Wisata Alam Glee Taron & Pelestarian Makam Meurah Cagar Budaya Leu Ue',
                'slug' => 'wisata-glee-taron-makam-meurah-leu-ue',
                'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800&auto=format&fit=crop&q=80',
                'content' => 'Gampong Leu Ue menyimpan potensi wisata alam yang luar biasa dengan kawasan Glee Taron sebagai spot sunrise dan sunset favorit. Selain itu, situs Makam Meurah yang merupakan cagar budaya bersejarah menarik perhatian wisatawan domestik dan peneliti sejarah Kesultanan Aceh.',
                'is_published' => true,
                'created_at' => now()->subDays(7),
            ],
            [
                'user_id' => $admin->id,
                'category_id' => $categories['pengumuman-resmi']->id,
                'title' => 'Pelayanan E-Surat Mandiri Gampong Leu Ue Kini Terhubung 24 Jam Nonstop',
                'slug' => 'pelayanan-e-surat-mandiri-terhubung-24-jam',
                'image' => 'https://images.unsplash.com/photo-1450133064473-71024230f91b?w=800&auto=format&fit=crop&q=80',
                'content' => 'Untuk mempermudah administrasi kependudukan, warga Gampong Leu Ue kini dapat mengajukan Surat Keterangan Usaha, Domisili, dan Tidak Mampu secara online langsung dari smartphone tanpa perlu mengantre. Lacak status resi surat Anda secara transparan melalui leuue.sigapaceh.id.',
                'is_published' => true,
                'created_at' => now()->subDays(10),
            ],
            [
                'user_id' => $admin->id,
                'category_id' => $categories['lapak-umkm']->id,
                'title' => 'Pelatihan Digital Marketing dan Pengemasan Produk UMKM Gampong Leu Ue',
                'slug' => 'pelatihan-digital-marketing-umkm-gampong',
                'image' => 'https://images.unsplash.com/photo-1556742049-0a67e557b683?w=800&auto=format&fit=crop&q=80',
                'content' => 'Puluhan pelaku UMKM pengolah produk khas Aceh dan pengrajin bordir lokal mengikuti bimbingan teknis pemasaran digital yang difasilitasi BUMG Gampong Leu Ue. Melalui website gampong, produk warga dapat diakses oleh pasar yang lebih luas dan terhubung langsung ke kontak WhatsApp penjual.',
                'is_published' => true,
                'created_at' => now()->subDays(12),
            ],
        ];

        foreach ($postsData as $post) {
            Post::firstOrCreate(['slug' => $post['slug']], $post);
        }

        // 4. Village Profiles (Sejarah, Visi Misi, Struktur)
        VillageProfile::firstOrCreate(
            ['type' => 'visi_misi'],
            [
                'title' => 'Visi & Misi Gampong Leu Ue',
                'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&auto=format&fit=crop&q=80',
                'content' => "VISI:
\"Terwujudnya Gampong Leu Ue yang Mandiri, Islami, Sejahtera, dan Berdaya Saing melalui Pemanfaatan Potensi Pertanian, Pelestarian Budaya Aceh, dan Teknologi Informasi Inklusif.\"

MISI:
1. Menyelenggarakan tata kelola pemerintahan gampong yang bersih, transparan, akuntabel, dan berbasis digital (Smart Village) di bawah kepemimpinan Keuchik bersama Tuha Peut.
2. Meningkatkan kualitas infrastruktur dasar, sarana pertanian persawahan, dan fasilitas perekonomian warga seluas 1.27 km².
3. Mengembangkan perekonomian warga melalui pemberdayaan UMKM, BUMG, dan wisata berbasis kearifan lokal Aceh.
4. Meningkatkan pelayanan kesehatan masyarakat, penurunan angka stunting, dan peningkatan mutu pendidikan generasi muda.
5. Memperkokoh kerukunan sosial, pelestarian adat istiadat Aceh, syariat Islam, serta perlindungan lingkungan hidup yang berkelanjutan.",
            ]
        );

        VillageProfile::firstOrCreate(
            ['type' => 'sejarah'],
            [
                'title' => 'Sejarah Gampong Leu Ue',
                'image' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=800&auto=format&fit=crop&q=80',
                'content' => "Gampong Leu Ue merupakan salah satu gampong bersejarah di wilayah Kecamatan Darul Imarah, Kabupaten Aceh Besar, Provinsi Aceh. Terletak di kawasan dataran rendah yang subur dengan luas wilayah 1.27 km², gampong ini dikelilingi oleh persawahan hijau dan dikenal dengan situs bersejarah Makam Meurah serta pemandangan alam Glee Taron.

Gampong Leu Ue terdiri dari empat dusun: Cot Kuta, Meurah, Japakeh, dan Mata Ie. Berbatasan dengan Gampong Gue Gajah di utara, Gampong Lhang dan Lambaro Kueh di selatan, Gampong Geundrieng di barat, dan Gampong Punie di timur. Sejak awal pembentukannya, masyarakat Gampong Leu Ue dikenal memiliki tradisi gotong royong yang tinggi, kearifan budaya Aceh, serta semangat keislaman yang kuat. Dalam perjalanannya, gampong ini terus bertransformasi menuju gampong modern yang tetap teguh menjaga nilai-nilai adat, budaya Aceh, dan syariat Islam.",
            ]
        );

        $aparaturList = [
            ['title' => 'Keuchik (Kepala Gampong)', 'content' => 'Razali - Bertanggung jawab memimpin jalannya pemerintahan gampong, pembinaan kemasyarakatan, dan pembangunan Gampong Leu Ue.'],
            ['title' => 'Sekretaris Gampong', 'content' => 'M. Faisal Anwar, S.Pd. - Mengkoordinasikan administrasi umum, keuangan gampong, dan penyusunan pelaporan transparansi.'],
            ['title' => 'Kaur Keuangan (Bendahara)', 'content' => 'Siti Rahmawati, S.E. - Mengelola pembukuan, realisasi APBGampong, dan penatausahaan kas gampong secara akuntabel.'],
            ['title' => 'Kaur Umum & Perencanaan', 'content' => 'Teuku Irawan - Mengelola inventaris aset gampong, tata naskah dinas, dan penyusunan dokumen perencanaan RKPGampong.'],
            ['title' => 'Kasi Pemerintahan', 'content' => 'Ridwan Hakim, S.H. - Pelayanan administrasi kependudukan, tata batas wilayah, dan ketertiban umum gampong.'],
            ['title' => 'Kasi Kesejahteraan', 'content' => 'Cut Nurul Hidayah, S.Kep. - Mengoordinasikan program bansos, kesehatan, posyandu stunting, dan sarana ibadah.'],
            ['title' => 'Kasi Pelayanan', 'content' => 'Zulkifli Mansyur - Membantu pelayanan E-Surat mandiri warga dan fasilitasi aspirasi masyarakat.'],
            ['title' => 'Imuem Meunasah', 'content' => 'Tgk. Abdullah - Membina kehidupan keagamaan, memimpin kegiatan ibadah di meunasah, dan menjadi penasihat adat gampong.'],
            ['title' => 'Ketua Tuha Peut', 'content' => 'Tgk. Hasan Basri - Memimpin lembaga musyawarah gampong, mengawasi kinerja Keuchik, dan menampung aspirasi warga.'],
            ['title' => 'Kepala Dusun Cot Kuta', 'content' => 'Usman Abdullah - Mengayomi warga Dusun Cot Kuta dan mengoordinasikan kegiatan kemasyarakatan.'],
            ['title' => 'Kepala Dusun Meurah', 'content' => 'Iskandar Muda - Mengayomi warga Dusun Meurah dan menjaga kelestarian situs Makam Meurah.'],
            ['title' => 'Kepala Dusun Japakeh', 'content' => 'Syarifuddin - Mengayomi warga Dusun Japakeh dan mengoordinasikan kegiatan pertanian.'],
            ['title' => 'Kepala Dusun Mata Ie', 'content' => 'Ruslan Karim - Mengayomi warga Dusun Mata Ie di sepanjang Jl. Jenderal Sudirman - Mata Ie.'],
        ];

        foreach ($aparaturList as $ap) {
            VillageProfile::firstOrCreate(
                ['type' => 'struktur', 'title' => $ap['title']],
                [
                    'content' => $ap['content'],
                    'image' => null,
                ]
            );
        }

        // 5. Tourist Spots
        $touristSpots = [
            [
                'name' => 'Wisata Alam Glee Taron',
                'description' => 'Kawasan perbukitan hijau dengan pemandangan sunrise dan sunset yang memukau. Spot favorit warga Aceh Besar untuk menikmati panorama alam persawahan dan pegunungan.',
                'location' => 'Dusun Japakeh, Gampong Leu Ue, Kecamatan Darul Imarah',
                'image' => 'https://images.unsplash.com/photo-1470240731273-7821a6eeb6bd?w=800&auto=format&fit=crop&q=80',
            ],
            [
                'name' => 'Persawahan Leu Ue',
                'description' => 'Hamparan sawah hijau nan asri seluas puluhan hektar yang menjadi jantung pertanian Gampong Leu Ue. Cocok untuk wisata edukasi pertanian dan fotografi alam.',
                'location' => 'Dusun Cot Kuta & Mata Ie, Gampong Leu Ue',
                'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&auto=format&fit=crop&q=80',
            ],
            [
                'name' => 'Makam Meurah (Cagar Budaya)',
                'description' => 'Situs bersejarah peninggalan masa Kesultanan Aceh yang telah ditetapkan sebagai cagar budaya. Menarik perhatian peneliti sejarah dan wisatawan budaya.',
                'location' => 'Dusun Meurah, Gampong Leu Ue',
                'image' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=800&auto=format&fit=crop&q=80',
            ],
            [
                'name' => 'Meunasah Gampong Leu Ue',
                'description' => 'Meunasah bersejarah yang menjadi pusat kegiatan keagamaan, musyawarah adat, dan kehidupan sosial masyarakat gampong sejak generasi terdahulu.',
                'location' => 'Pusat Gampong Leu Ue, Jl. Jenderal Sudirman - Mata Ie',
                'image' => 'https://images.unsplash.com/photo-1577495508048-b635879837f1?w=800&auto=format&fit=crop&q=80',
            ],
        ];

        foreach ($touristSpots as $spot) {
            TouristSpot::firstOrCreate(['name' => $spot['name']], $spot);
        }

        // 6. UMKM Warga
        $umkms = [
            [
                'name' => 'Kopi Ulee Kareng Leu Ue',
                'owner_name' => 'Pak Ismail',
                'description' => 'Kopi robusta khas Ulee Kareng yang disangrai tradisional dengan aroma kuat dan cita rasa khas Aceh. Tersedia dalam kemasan bubuk dan biji utuh.',
                'contact' => '08126908207',
                'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=800&auto=format&fit=crop&q=80',
            ],
            [
                'name' => 'Kueh Timphan Aceh',
                'owner_name' => 'Ibu Cut Aminah',
                'description' => 'Kue tradisional Aceh berbahan daun pandan dan pisang yang dibungkus daun pisang kemudian dikukus. Cocok sebagai oleh-oleh khas Aceh.',
                'contact' => '08126908207',
                'image' => 'https://images.unsplash.com/photo-1606787366850-de6330128bfc?w=800&auto=format&fit=crop&q=80',
            ],
            [
                'name' => 'Mie Aceh Leu Ue',
                'owner_name' => 'Pak Ruslan',
                'description' => 'Mie Aceh khas dengan bumbu rempah pilihan yang kaya rasa. Tersedia varian goreng, kuah, dan tumis dengan topping seafood atau daging.',
                'contact' => '08126908207',
                'image' => 'https://images.unsplash.com/photo-1534483509719-3feaee7c30da?w=800&auto=format&fit=crop&q=80',
            ],
            [
                'name' => 'Kerajinan Bordir Aceh',
                'owner_name' => 'Ibu Nurjannah',
                'description' => 'Kerajinan bordir tangan khas Aceh dengan motif tradisional Pintoe Aceh pada tas, taplak, dan busana. Produk budaya bernilai seni tinggi.',
                'contact' => '08126908207',
                'image' => 'https://images.unsplash.com/photo-1587049352846-4a222e784d38?w=800&auto=format&fit=crop&q=80',
            ],
            [
                'name' => 'Rencong Miniatur Souvenir',
                'owner_name' => 'Pak Teuku Daud',
                'description' => 'Miniatur rencong (senjata tradisional Aceh) dari kuningan dan kayu pilihan. Cocok sebagai souvenir, koleksi, dan cinderamata khas Aceh.',
                'contact' => '08126908207',
                'image' => 'https://images.unsplash.com/photo-1556742049-0a67e557b683?w=800&auto=format&fit=crop&q=80',
            ],
        ];

        foreach ($umkms as $u) {
            Umkm::firstOrCreate(['name' => $u['name']], $u);
        }

        // 7. Letter Templates
        $letterTemplates = [
            ['name' => 'Surat Keterangan Domisili', 'content_template' => 'Menerangkan bahwa yang bersangkutan adalah penduduk resmi yang berdomisili di Gampong Leu Ue, Kecamatan Darul Imarah, Kabupaten Aceh Besar, Provinsi Aceh.'],
            ['name' => 'Surat Keterangan Usaha (SKU)', 'content_template' => 'Menerangkan bahwa yang bersangkutan benar memiliki dan menjalankan unit usaha aktif di wilayah Gampong Leu Ue, Kecamatan Darul Imarah, Kabupaten Aceh Besar.'],
            ['name' => 'Surat Keterangan Tidak Mampu (SKTM)', 'content_template' => 'Menerangkan keadaan ekonomi keluarga bersangkutan untuk keperluan beasiswa / bantuan pengobatan.'],
            ['name' => 'Surat Pengantar SKCK Kepolisian', 'content_template' => 'Surat pengantar berkelakuan baik untuk pengurusan SKCK di Polsek / Polres.'],
            ['name' => 'Surat Keterangan Kelahiran', 'content_template' => 'Surat keterangan kelahiran bayi untuk dasar penerbitan Akta Kelahiran Disdukcapil.'],
            ['name' => 'Surat Keterangan Kematian', 'content_template' => 'Surat keterangan kematian warga untuk kelengkapan administrasi kependudukan.'],
            ['name' => 'Surat Keterangan Pindah Penduduk', 'content_template' => 'Surat keterangan kepindahan warga antar desa / kecamatan / kabupaten.'],
        ];

        foreach ($letterTemplates as $template) {
            LetterTemplate::firstOrCreate(['name' => $template['name']], $template);
        }

        // 8. Sample Letter Requests (Tracking Demonstrations)
        $sampleTemplate = LetterTemplate::first();
        LetterRequest::firstOrCreate(
            ['resi_number' => 'SRT-8899A1'],
            [
                'letter_template_id' => $sampleTemplate->id,
                'nik' => '1106041204900001',
                'name' => 'Hasan Basri',
                'purpose' => 'Persyaratan pengajuan KUR Mikro Bank untuk pengembangan usaha tani di Gampong Leu Ue',
                'attachment' => null,
                'status' => 'ready',
            ]
        );

        LetterRequest::firstOrCreate(
            ['resi_number' => 'SRT-7722B2'],
            [
                'letter_template_id' => $sampleTemplate->id,
                'nik' => '1106042508920002',
                'name' => 'Cut Siti Aminah',
                'purpose' => 'Pengurusan beasiswa pendidikan anak ke perguruan tinggi di Banda Aceh',
                'attachment' => null,
                'status' => 'processing',
            ]
        );

        // 9. Complaints (Aspirasi & Laporan)
        Complaint::firstOrCreate(
            ['title' => 'Usulan Perbaikan Lampu Penerangan Jalan Dusun Mata Ie'],
            [
                'nik' => '1106041002880003',
                'name' => 'Usman Abdullah',
                'content' => 'Mohon bantuan perbaikan lampu penerangan jalan di Jl. Jenderal Sudirman - Mata Ie karena sering redup saat malam hari.',
                'status' => 'resolved',
                'reply' => 'Terima kasih atas masukannya. Tim Kaur Umum Gampong telah melakukan penggantian bohlam LED tenaga surya baru di lokasi Dusun Mata Ie per tanggal 2 Agustus 2026.',
            ]
        );

        Complaint::firstOrCreate(
            ['title' => 'Pembersihan Saluran Air Drainase Dusun Japakeh Menjelang Musim Hujan'],
            [
                'nik' => '1106041905950004',
                'name' => 'Irfan Hakim',
                'content' => 'Diharapkan ada kegiatan kerja bakti pembersihan selokan di Dusun Japakeh agar tidak terjadi genangan air di area persawahan saat hujan lebat.',
                'status' => 'verified',
                'reply' => 'Usulan telah diagendakan dalam kegiatan Gotong Royong Jumat Bersih bersama Kepala Dusun Japakeh.',
            ]
        );

        // 10. Transparencies (APBGampong & Dokumen Publik)
        $transparencies = [
            [
                'title' => 'Laporan Realisasi APBGampong Leu Ue Tahun Anggaran 2025 (LPJ Akhir Tahun)',
                'type' => 'apbg',
                'file_path' => 'dokumen/lpj_apbgampong_2025.pdf',
                'thumbnail' => null,
            ],
            [
                'title' => 'Rencana Anggaran Pendapatan dan Belanja Gampong (APBGampong) Leu Ue Tahun 2026',
                'type' => 'apbg',
                'file_path' => 'dokumen/apbgampong_induk_2026.pdf',
                'thumbnail' => null,
            ],
            [
                'title' => 'Qanun Gampong Leu Ue Nomor 02 Tahun 2026 tentang Ketertiban Umum dan Lingkungan',
                'type' => 'other',
                'file_path' => 'dokumen/qanun_gampong_02_2026.pdf',
                'thumbnail' => null,
            ],
            [
                'title' => 'Daftar Penerima Manfaat BLT-Dana Gampong dan Program Bansos 2026',
                'type' => 'kkn',
                'file_path' => 'dokumen/daftar_kpm_blt_2026.pdf',
                'thumbnail' => null,
            ],
        ];

        foreach ($transparencies as $trans) {
            Transparency::firstOrCreate(['title' => $trans['title']], $trans);
        }
    }
}
