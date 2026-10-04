<?php

namespace Database\Seeders;

use App\Models\BreadCare;
use Illuminate\Database\Seeder;

class BreadCareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $breadCares = [
            [
                'title' => 'Cara Menyimpan Sourdough dengan Benar',
                'category' => 'Storage',
                'icon' => '🍞',
                'description' => 'Panduan lengkap untuk menyimpan roti sourdough agar tetap segar dan lezat hingga beberapa hari.',
                'content' => '<h3>Menyimpan dengan Tepat</h3><p>Sourdough adalah jenis roti yang unik karena menggunakan fermentasi alami. Cara penyimpanannya berbeda dengan roti biasa agar tetap mempertahankan tekstur khasnya yang crispy di luar dan lembut di dalam.</p><h3>Di Suhu Ruang</h3><p>Untuk konsumsi dalam 2-3 hari, simpan sourdough di suhu ruang dalam kantong kertas atau kain bersih. Jangan gunakan plastik karena akan membuat kulit roti menjadi lembek.</p><h3>Hindari Kulkas</h3><p>Kulkas bukan tempat yang baik untuk roti karena akan mempercepat proses mengeras (staling). Suhu kulkas justru membuat roti kehilangan kelembapannya lebih cepat.</p>',
                'tips' => [
                    ['content' => 'Simpan dengan bagian yang terpotong menghadap ke bawah di atas talenan untuk mencegah interior mengering'],
                    ['content' => 'Gunakan bread box atau wadah dengan sirkulasi udara yang baik'],
                    ['content' => 'Potong sesuai kebutuhan saja, jangan potong seluruh loaf sekaligus'],
                    ['content' => 'Jika sudah mulai mengeras, jangan dibuang — bisa dipanaskan kembali atau dijadikan crouton'],
                ],
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Cara Memanaskan Roti Artisan Kembali',
                'category' => 'Reheating',
                'icon' => '🔥',
                'description' => 'Tips memanaskan roti artisan agar kembali crispy seperti baru keluar dari oven.',
                'content' => '<h3>Kembalikan Kesegaran Roti</h3><p>Roti artisan yang telah disimpan bisa dikembalikan kesegarannya dengan teknik pemanasan yang tepat. Oven adalah pilihan terbaik untuk hasil maksimal.</p><h3>Menggunakan Oven</h3><p>Panaskan oven hingga 175°C. Percikkan sedikit air pada permukaan roti (atau basahi tangan dan usapkan ke kulit roti). Panggang selama 8-10 menit hingga kulit kembali crispy.</p><h3>Untuk Hasil Cepat</h3><p>Jika terburu-buru, panggang roti di toaster atau pemanggang roti biasa. Potong tipis agar panas merata dan tidak gosong di luar namun dingin di dalam.</p>',
                'tips' => [
                    ['content' => 'Jangan gunakan microwave untuk roti artisan karena akan membuat teksturnya kenyal dan lembek'],
                    ['content' => 'Tambahkan sedikit air/uap saat memanaskan untuk mengembalikan kelembapan'],
                    ['content' => 'Panaskan hanya bagian yang akan dimakan untuk menjaga kesegaran sisanya'],
                    ['content' => 'Oven toaster atau air fryer juga bisa menjadi alternatif yang baik'],
                ],
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Membekukan dan Mencairkan Roti Sourdough',
                'category' => 'Freezing',
                'icon' => '❄️',
                'description' => 'Panduan membekukan roti artisan untuk penyimpanan jangka panjang tanpa kehilangan kualitas.',
                'content' => '<h3>Penyimpanan Jangka Panjang</h3><p>Membekukan adalah cara terbaik untuk menyimpan roti lebih dari 3 hari. Dengan teknik yang benar, roti bisa bertahan hingga 3 bulan di freezer tanpa kehilangan kualitas.</p><h3>Cara Membekukan</h3><p>Potong roti sesuai porsi yang diinginkan (atau simpan utuh). Bungkus rapat dengan plastic wrap, kemudian masukkan ke dalam kantong ziplock atau wadah kedap udara. Keluarkan udara sebanyak mungkin sebelum menutup.</p><h3>Cara Mencairkan</h3><p>Keluarkan dari freezer dan biarkan mencair di suhu ruang selama 1-2 jam. Setelah itu panaskan di oven 175°C selama 10-12 menit untuk mengembalikan tekstur crispy-nya.</p>',
                'tips' => [
                    ['content' => 'Bekukan roti saat masih sangat segar (hari pertama atau kedua) untuk hasil terbaik'],
                    ['content' => 'Potong dulu sebelum dibekukan jika ingin ambil per slice sesuai kebutuhan'],
                    ['content' => 'Label dengan tanggal pembekuan agar tidak lupa'],
                    ['content' => 'Bisa langsung dipanggang dari frozen untuk hasil yang lebih praktis (tambah 5 menit waktu panggang)'],
                    ['content' => 'Hindari membekukan ulang roti yang sudah dicairkan'],
                ],
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Tips Menyajikan Roti Artisan',
                'category' => 'Serving',
                'icon' => '🍽️',
                'description' => 'Ide penyajian dan pasangan sempurna untuk menikmati roti artisan Anda.',
                'content' => '<h3>Nikmati dengan Maksimal</h3><p>Roti artisan berkualitas tinggi bisa dinikmati dengan berbagai cara. Tekstur dan rasa kompleksnya sangat cocok dipasangkan dengan berbagai makanan.</p><h3>Sebagai Sarapan</h3><p>Toast tipis dan olesi dengan mentega berkualitas baik, madu, atau selai homemade. Kesederhanaan ini akan membiarkan rasa roti bersinar.</p><h3>Untuk Sandwich</h3><p>Gunakan sourdough untuk sandwich berkelas: alpukat, telur, smoked salmon, atau keju. Roti artisan akan mengangkat cita rasa isian Anda.</p><h3>Sebagai Pendamping</h3><p>Potong tipis dan sajikan bersama soup, salad, atau charcuterie board. Sempurna untuk acara gathering.</p>',
                'tips' => [
                    ['content' => 'Sajikan pada suhu ruang untuk rasa dan aroma terbaik'],
                    ['content' => 'Pasangkan dengan olive oil dan balsamic untuk pengalaman Italia'],
                    ['content' => 'Buat bruschetta dengan topping tomat segar, basil, dan mozzarella'],
                    ['content' => 'Gunakan roti yang sedikit kering untuk French toast yang sempurna'],
                    ['content' => 'Slice saat akan disajikan, bukan jauh-jauh hari sebelumnya'],
                ],
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Menjaga Kesegaran Croissant dan Pastry',
                'category' => 'Freshness',
                'icon' => '🥐',
                'description' => 'Cara merawat croissant dan viennoiserie agar tetap crispy dan lezat.',
                'content' => '<h3>Kesegaran Pastry Berlapis</h3><p>Croissant dan pastry dengan lapisan-lapisan butter sangat rentan kehilangan kerenyahannya. Perawatan yang tepat akan mempertahankan tekstur signature-nya.</p><h3>Hari Pertama</h3><p>Croissant paling enak dalam 4-6 jam pertama setelah dipanggang. Simpan dalam wadah dengan sirkulasi udara baik, JANGAN dalam plastik tertutup.</p><h3>Hari Kedua dan Seterusnya</h3><p>Panaskan kembali di oven 160°C selama 5-7 menit. Ini akan mengembalikan kerenyahan dan menghangatkan butter di dalamnya.</p>',
                'tips' => [
                    ['content' => 'Croissant bisa dibekukan dan tetap mempertahankan kualitas hingga 1 bulan'],
                    ['content' => 'Panaskan langsung dari freezer tanpa dicairkan terlebih dahulu'],
                    ['content' => 'Jangan microwave croissant karena akan membuat teksturnya kenyal'],
                    ['content' => 'Untuk croissant filled (isi), konsumsi dalam 24 jam untuk kualitas terbaik'],
                    ['content' => 'Letakkan tissue di bagian bawah wadah untuk menyerap kelembapan berlebih'],
                ],
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Mengenali Tanda-tanda Roti Masih Baik',
                'category' => 'General',
                'icon' => '✅',
                'description' => 'Bagaimana mengetahui apakah roti masih aman dan enak untuk dikonsumsi.',
                'content' => '<h3>Cek Kualitas Roti Anda</h3><p>Roti artisan tanpa pengawet memiliki umur simpan lebih pendek dari roti komersial. Penting untuk tahu kapan roti masih layak dikonsumsi.</p><h3>Tanda Roti Masih Baik</h3><p>Interior masih lembut (meski kulit mungkin agak keras), tidak ada bau asam atau tengik yang aneh, tidak ada jamur atau bintik-bintik, dan warna masih konsisten.</p><h3>Tanda Roti Harus Dibuang</h3><p>Muncul bintik hijau/hitam (jamur), bau tidak sedap, tekstur sangat keras seperti batu, atau warna berubah drastis.</p>',
                'tips' => [
                    ['content' => 'Roti sourdough bisa bertahan 4-5 hari di suhu ruang jika disimpan dengan benar'],
                    ['content' => 'Sedikit mengeras bukan berarti rusak — cukup dipanaskan kembali'],
                    ['content' => 'Jika ragu, lebih baik bekukan roti saat masih fresh daripada menunggu hingga mulai basi'],
                    ['content' => 'Roti dengan isian (keju, daging) bertahan lebih singkat — maksimal 2 hari di kulkas'],
                    ['content' => 'Trust your senses: jika bau atau tampilan aneh, jangan dikonsumsi'],
                ],
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($breadCares as $breadCare) {
            BreadCare::create($breadCare);
        }
    }
}