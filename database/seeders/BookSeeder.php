<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Sejarah Cina',
                'author' => 'Frederick Wells W.',
                'description' => 'Buku ini menyajikan perjalanan panjang peradaban Tiongkok dari masa kuno hingga modern, membahas dinasti-dinasti besar dan transformasi sosial politiknya.',
                'cover_path' => 'a history of china.jpg',
                'category_id' => 8,
            ],
            [
                'title' => 'Agrobisnis Budidaya Lidah Buaya',
                'author' => 'Tim Agro Mandiri',
                'description' => 'Panduan praktis dan ekonomis dalam membudidayakan lidah buaya sebagai komoditas agrobisnis yang menguntungkan dan mudah diterapkan.',
                'cover_path' => 'agrobisnis budidaya lidah buaya.jpg',
                'category_id' => 3,
            ],
            [
                'title' => 'Aku Bisa Jika Aku Berpikir Bisa',
                'author' => 'Feri Tjahjono',
                'description' => 'Buku motivasi inspiratif yang membangkitkan semangat pembaca untuk mengembangkan pola pikir positif dan kepercayaan diri dalam meraih tujuan.',
                'cover_path' => 'aku bisa jika aku berpikir biasa.jpg',
                'category_id' => 6,
            ],
            [
                'title' => 'Aku Memilih Bahagia',
                'author' => 'Fery Tjahjono',
                'description' => 'Sebuah refleksi kehidupan yang mengajak pembaca untuk memilih kebahagiaan sebagai sikap hidup di tengah tantangan dan tekanan.',
                'cover_path' => 'aku memilih bahagia.jpg',
                'category_id' => 6,
            ],
            [
                'title' => 'Anggrek Bayi Tidur',
                'author' => 'Sri Widawati',
                'description' => 'Cerita atau panduan seputar jenis anggrek unik yang dikenal dengan nama "bayi tidur", serta tips merawat dan membudidayakannya.',
                'cover_path' => 'anggrek bayi tidur.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Bekerja dengan Cinta',
                'author' => 'John Afifi',
                'description' => 'Menanamkan semangat dan filosofi kerja yang dilandasi cinta, dedikasi, dan makna, untuk kehidupan kerja yang lebih bermakna dan bahagia.',
                'cover_path' => 'bekerja dengan cinta .jpg',
                'category_id' => 6,
            ],
            [
                'title' => 'Belajar Menuang Ide dalam Puisi, Cerita, Drama',
                'author' => 'Wendi Widya Ratna Dewi',
                'description' => 'Buku ini mengajarkan cara kreatif menuangkan ide dalam bentuk karya sastra seperti puisi, cerita pendek, dan naskah drama secara menarik.',
                'cover_path' => 'belajar menuang ide dalam puisi cerita drama.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Bencana di Lingkungan',
                'author' => 'Pakar Raya Pustaka',
                'description' => 'Mengupas berbagai jenis bencana lingkungan, penyebab, dampak, serta langkah mitigasi untuk meningkatkan kesadaran dan kesiapsiagaan.',
                'cover_path' => 'bencana di lingkungan.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Berdisiplin',
                'author' => 'Sukini',
                'description' => 'Menanamkan pentingnya kedisiplinan dalam kehidupan sehari-hari sebagai dasar kesuksesan dan pembentukan karakter kuat.',
                'cover_path' => 'berdisiplin.jpg',
                'category_id' => 6,
            ],
            [
                'title' => 'Bertanam Kentang',
                'author' => 'Ir. Widi Agustin, M.P.',
                'description' => 'Panduan lengkap budidaya kentang, mulai dari pemilihan bibit, teknik penanaman, hingga panen yang menguntungkan.',
                'cover_path' => 'bertanam kentang.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Cara Budidaya Lebah Madu yang Berhasil',
                'author' => 'Tim Agro Mandiri',
                'description' => 'Petunjuk praktis untuk memulai dan mengelola budidaya lebah madu secara efektif dengan hasil panen optimal.',
                'cover_path' => 'cara budidaya lebah madu yang berhasil.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Cara Cerdas Budidaya Kakao',
                'author' => 'Ahmad Fanani',
                'description' => 'Langkah-langkah efisien dan cerdas dalam budidaya tanaman kakao, cocok bagi petani maupun pebisnis pemula.',
                'cover_path' => 'cara cerdas budidaya kakao.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Cara Memperbaiki Alat-Alat Rumah Tangga',
                'author' => 'Ir. PM Aritonang',
                'description' => 'Solusi praktis dan hemat untuk memperbaiki peralatan rumah tangga umum tanpa perlu teknisi profesional.',
                'cover_path' => 'cara memperbaiki alat alat rumah tanga .jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Cara Merakit Aquarium',
                'author' => 'Drs. Achdi Achmadi',
                'description' => 'Panduan sederhana dan terstruktur tentang cara merakit akuarium dari awal, lengkap dengan sistem filtrasi dan estetika.',
                'cover_path' => 'cara merakit aquarium.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Cerita Terbaik Pembentuk Budi Pekerti',
                'author' => 'siti anisah',
                'description' => 'Kumpulan cerita inspiratif yang menanamkan nilai moral dan karakter positif kepada anak-anak sejak dini.',
                'cover_path' => 'cerita terbaik pembentuk budi pekerti seri pendidikan karakter.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Dasar-dasar Berenang',
                'author' => 'Dewi Nawangsari',
                'description' => 'Mengenalkan teknik dasar berenang dengan benar dan aman, cocok untuk pemula dari segala usia.',
                'cover_path' => 'dasar dasar berenang.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Dasar-dasar Keperawatan',
                'author' => 'Tim Media Cipta Guru SMK',
                'description' => 'Materi dasar keperawatan yang ditujukan untuk siswa SMK maupun pemula yang ingin memahami profesi perawat.',
                'cover_path' => 'dasar dasar keperawatan.jpg',
                'category_id' => 4,
            ],
            [
                'title' => 'Dasar-dasar Budidaya Perikanan',
                'author' => 'Tim Media Cipta Guru SMK',
                'description' => 'Menjelaskan teknik dan konsep dasar budidaya perikanan air tawar maupun laut secara efisien dan berkelanjutan.',
                'cover_path' => 'dasar-dasar budi daya perikanan.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Demokrasi',
                'author' => 'Panjalu Wiranggani',
                'description' => 'Mengupas konsep dan prinsip demokrasi, sejarahnya, serta implementasinya dalam konteks negara modern.',
                'cover_path' => 'demokrasi.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Dimana Ada Kemauan Disana Ada Kemudahan',
                'author' => 'Feri Tjahjono',
                'description' => 'Buku motivasi yang menekankan pentingnya kemauan kuat sebagai kunci untuk membuka segala peluang dan kemudahan hidup.',
                'cover_path' => 'dimana ada kemauan di sana ada kemudahan.jpg',
                'category_id' => 3,
            ],
            [
                'title' => 'Eksperimen Sains',
                'author' => 'Nini Subini, S.Pd',
                'description' => 'Buku ini berisi berbagai eksperimen sains sederhana dan menarik yang dapat dilakukan di rumah atau di sekolah, untuk menumbuhkan rasa ingin tahu dan cinta terhadap ilmu pengetahuan.',
                'cover_path' => 'eksperimen sains.jpg',
                'category_id' => 2,
            ],
            [
                'title' => 'Elektronik di Rumah Kita',
                'author' => 'Hadi Karyanto, S.P.',
                'description' => 'Mengenalkan berbagai perangkat elektronik di sekitar kita, cara kerjanya, serta bagaimana penggunaannya secara aman dan efisien dalam kehidupan sehari-hari.',
                'cover_path' => 'elektronik di rumah kita.jpg',
                'category_id' => 1,
            ],
            [
                'title' => 'Ensiklopedi Hindu',
                'author' => 'Penerbit Paramita Surabaya',
                'description' => 'Merupakan ensiklopedi komprehensif mengenai ajaran, tokoh, upacara, dan nilai-nilai dalam agama Hindu, disusun secara sistematis dan informatif.',
                'cover_path' => 'ensiklopedi hindu.jpg',
                'category_id' => 11,
            ],
            [
                'title' => 'Ensiklopedia Anak Nusantara',
                'author' => 'Tim Afin and Friends',
                'description' => 'Mengenalkan kekayaan budaya, flora-fauna, dan keunikan daerah-daerah di Indonesia kepada anak-anak dalam format yang mudah dipahami dan menyenangkan.',
                'cover_path' => 'ensklopedia anak nusantara.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Every Man is a King',
                'author' => 'Orison Swett Marden',
                'description' => 'Buku inspiratif klasik yang mendorong setiap orang untuk menggali potensi dan mengambil kendali atas hidupnya dengan penuh percaya diri dan semangat.',
                'cover_path' => 'every man a king.jpg',
                'category_id' => 6,
            ],
            [
                'title' => 'Gagal Bukan Berarti Sia-sia',
                'author' => 'Teo Sutan',
                'description' => 'Kumpulan kisah dan refleksi tentang bagaimana kegagalan justru bisa menjadi pintu menuju keberhasilan, asalkan dijalani dengan tekad dan pelajaran.',
                'cover_path' => 'gagal bukan berarti sia-sia.jpg',
                'category_id' => 6,
            ],
            [
                'title' => 'Gaguritan Sutasoma 1, jilid 1',
                'author' => 'Mangku Pande Gd. Rauh Artana',
                'description' => 'Sebuah karya sastra Bali klasik berbentuk gaguritan yang memuat nilai-nilai moral, spiritual, dan filosofi kehidupan dalam gaya bahasa tradisional.',
                'cover_path' => 'gaguritan sutasoma I jilid I.jpg',
                'category_id' => 11,
            ],
            [
                'title' => 'Gaguritan Watugangga',
                'author' => 'Jro Made M.Mardika',
                'description' => 'Puisi tradisional Bali (gaguritan) yang mengisahkan perjalanan spiritual dan kebijaksanaan, diperkaya dengan kearifan lokal dan budaya Bali.',
                'cover_path' => 'gaguritan watugangga.jpg',
                'category_id' => 11,
            ],
            [
                'title' => 'Gajah Mada, Taktha dan Angkara',
                'author' => 'Langit Kresna Hariadi',
                'description' => 'Novel sejarah epik yang mengangkat kehidupan Gajah Mada, penuh intrik, ambisi, dan pengorbanan dalam perjalanan politik dan kekuasaan di Nusantara.',
                'cover_path' => 'gajah mada takhta dan angkara.jpg',
                'category_id' => 8,
            ],
            [
                'title' => 'Gambar Teknik Manufaktur Pembelajaran SMK',
                'author' => 'Tim Media Cipta Guru SMK',
                'description' => 'Buku pelajaran teknik gambar manufaktur untuk siswa SMK yang membahas dasar-dasar menggambar teknik dalam industri manufaktur modern.',
                'cover_path' => 'gambar teknik menufaktur pemebelajaran smk.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Hama dan Penyakit Tanaman Pangan',
                'author' => 'Ir. Sartono Joko S., MP',
                'description' => 'Panduan identifikasi dan penanganan berbagai hama serta penyakit yang menyerang tanaman pangan, lengkap dengan solusi praktisnya.',
                'cover_path' => 'Hama dan Penyakit Tanaman Pangan.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Hamsad Rangkut Cemara',
                'author' => '-',
                'description' => 'Kumpulan cerita pendek dengan gaya khas Hamsad Rangkuti yang tajam, humanis, dan kadang absurd, menggambarkan realita sosial dengan elegan.',
                'cover_path' => 'hamsad rangkuti cemara.jpg',
                'category_id' => 10,
            ],
            [
                'title' => 'Hari Raya & Kakawin Siwaratri Kalpa',
                'author' => 'I.B, Suparta Ardhana',
                'description' => 'Buku ini mengulas makna hari raya Siwaratri dan mengupas Kakawin Siwaratri Kalpa, sebuah karya sastra klasik Hindu yang penuh nilai spiritual.',
                'cover_path' => 'hari raya dan kakawin siwaratri kalpa.jpg',
                'category_id' => 11,
            ],
            [
                'title' => 'Hidroponik Teknologi Budidaya Tanaman Tanpa Tanah',
                'author' => 'Tim Agro Mandiri',
                'description' => 'Panduan praktis budidaya tanaman secara hidroponik, cocok untuk pemula maupun pelaku pertanian modern yang ingin efisien dan ramah lingkungan.',
                'cover_path' => 'hidroponik teknologi budidaya tanaman tanpa tanah.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Hidup Sehat, Kinejra Melejit',
                'author' => 'Heru Setyaka',
                'description' => 'Buku motivasi yang menggabungkan prinsip gaya hidup sehat dan strategi produktivitas untuk meraih kinerja puncak secara berkelanjutan.',
                'cover_path' => 'hidup sehat kinerja melejit.jpg',
                'category_id' => 6,
            ],
            [
                'title' => 'I Love You',
                'author' => 'Wilda Ayu Mandasari Baskoro',
                'description' => 'Kisah romantis penuh emosi yang menyentuh hati, tentang cinta, harapan, dan pengorbanan dalam dinamika hubungan antar manusia.',
                'cover_path' => 'i love you.jpg',
                'category_id' => 6,
            ],
            [
                'title' => 'Ibu Tien dan Pak Harto',
                'author' => 'Ira Tri Onggo',
                'description' => 'Biografi yang mengangkat kisah pasangan presiden Soeharto dan Ibu Tien, membahas kehidupan pribadi, peran politik, serta sejarah kekuasaan mereka.',
                'cover_path' => 'ibu tien dan pak harto.jpg',
                'category_id' => 10,
            ],
            [
                'title' => 'Step by Step Budidaya Ikan Hias Cupang',
                'author' => 'Devan Ramadhan',
                'description' => 'Petunjuk lengkap dan bertahap untuk memelihara serta membudidayakan ikan cupang, dari pemilihan indukan hingga pemasaran hasilnya.',
                'cover_path' => 'ikan hias cupang.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Ilmu Lengkap Bahan Makanan',
                'author' => 'Tim Bina Karya SMK',
                'description' => 'Menyajikan informasi komprehensif mengenai jenis, cara memilih, menyimpan, dan mengolah bahan makanan secara tepat dan higienis.',
                'cover_path' => 'ilmu lengka bahan makanan (pemilihan, penyimpanan, pengelohan).jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Ilmu Seni Rupa Dasar',
                'author' => 'Tim Bina Karya SMK',
                'description' => 'Pengantar dasar-dasar seni rupa untuk siswa SMK atau pemula, mencakup elemen, prinsip, dan teknik-teknik seni rupa yang aplikatif.',
                'cover_path' => 'ilmu seni rupa dasar.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Jadilah Pemimpin Idaman',
                'author' => 'Mahawira Abimayu',
                'description' => 'Panduan praktis menjadi pemimpin yang visioner, inspiratif, dan dicintai, dengan nilai-nilai kepemimpinan yang kuat dan etis.',
                'cover_path' => 'jadilah pemimpin idaman.jpg',
                'category_id' => 6,
            ],
            [
                'title' => 'Jamu Ramuan Surga Plus Pijat Refleksi',
                'author' => 'Jarwo Pramono',
                'description' => 'Kombinasi resep jamu tradisional dan teknik pijat refleksi yang diyakini dapat meningkatkan kesehatan dan vitalitas secara alami.',
                'cover_path' => 'jamu ramuan surga pijat refleksi.jpg',
                'category_id' => 4,
            ],
            [
                'title' => 'Jenis-jenis Banten Tebasan',
                'author' => 'Drs. I Wayan Dunia',
                'description' => 'Membahas berbagai jenis banten tebasan dalam tradisi Bali, lengkap dengan makna simbolis dan tata cara penyajiannya.',
                'cover_path' => 'jenis banten tebasan.jpg',
                'category_id' => 11,
            ],
            [
                'title' => 'Geguritan Jnana Siddhi (Sarining Kasuksman)',
                'author' => 'Drs. I Wayan Mudayasa, S.H., M.H',
                'description' => 'Sebuah karya sastra spiritual dalam bentuk geguritan yang membahas jalan menuju kesempurnaan jiwa dan pengetahuan luhur.',
                'cover_path' => 'jnana sidhi.jpg',
                'category_id' => 11,
            ],
            [
                'title' => 'Jus Ampuh Penumpas Aneka Penyakit',
                'author' => 'Mama Lubna',
                'description' => 'Kumpulan resep jus sehat berbahan alami yang dipercaya dapat membantu mencegah dan mengatasi berbagai macam penyakit secara alami.',
                'cover_path' => 'jus ampuh penumpas aneka penyakit berat.jpg',
                'category_id' => 4,
            ],
            [
                'title' => 'Kampungku Dikepung Sayuran',
                'author' => 'Nasin El-Kabumaini, DKK.',
                'description' => 'Kisah edukatif tentang pentingnya menanam sayuran di lingkungan sekitar sebagai solusi ketahanan pangan dan gaya hidup sehat.',
                'cover_path' => 'kampungku dikepung sayuran.jpg',
                'category_id' => 4,
            ],
            [
                'title' => 'Kamus Bahasa Bali',
                'author' => 'Wayan Budha Gautama',
                'description' => 'Kamus praktis yang menyajikan terjemahan dan penjelasan kata-kata dalam Bahasa Bali untuk mendukung pelestarian bahasa daerah.',
                'cover_path' => 'kamus bahasa bali.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Kamus Istilah Boga',
                'author' => 'Daru Wijayanti',
                'description' => 'Referensi lengkap istilah dunia boga (kuliner), sangat berguna bagi pelajar, profesional kuliner, hingga pecinta masak-memasak.',
                'cover_path' => 'kamus istilah boga.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Kamus Istilah Sains & Teknologi',
                'author' => 'Mohammad Sholihul Wafi',
                'description' => 'Berisi kumpulan istilah penting dalam dunia sains dan teknologi yang disusun secara alfabetis dan mudah dipahami.',
                'cover_path' => 'kamus istilah sains dan teknologi.jpg',
                'category_id' => 5,
            ],
            [
                'title' => 'Kamus Istilah Sejarah & Budaya',
                'author' => 'Alvi Merlina',
                'description' => 'Kamus ini mencakup istilah-istilah kunci dalam bidang sejarah dan budaya, cocok untuk pelajar, peneliti, dan pemerhati budaya.',
                'cover_path' => 'kamus istilah sejarah dan budidaya.jpg',
                'category_id' => 5,
            ],

        ];

        foreach ($books as $index => $book) {
            DB::table('books')->insert([
                'title' => $book['title'],
                'author' => $book['author'],
                'description' => $book['description'],
                'cover_path' => asset('storage/book-covers/' . rawurlencode(strtolower($book['cover_path']))),
                'category_id' => $book['category_id'],
                'created_at' => Carbon::now()->subDays($index * 3),
                'updated_at' => null,
            ]);
        }
    }
}
