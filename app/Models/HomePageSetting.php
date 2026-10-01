<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePageSetting extends Model
{
    protected $fillable = [
        'hero',
        'daily',
        'process',
        'identity',
        'featured_menu',
        'order_section',
    ];

    protected function casts(): array
    {
        return [
            'hero' => 'array',
            'daily' => 'array',
            'process' => 'array',
            'identity' => 'array',
            'featured_menu' => 'array',
            'order_section' => 'array',
        ];
    }

    public static function defaults(): array
    {
        return [
            'hero' => [
                'eyebrow' => 'Artisan Bakery, Jakarta',
                'title' => "Dibuat Tangan,\nSetiap Pagi.",
                'description' => 'Roti kami keluar dari oven pukul 05.30. Dibuat dari tepung lokal, air, garam, dan waktu. Tidak ada pengawet. Tidak ada kompromi.',
                'cta_label' => 'Lihat Menu Hari Ini',
                'cta_url' => '#menu',
                'price_label' => 'Mulai dari',
                'price_value' => 'Rp 35.000',
            ],
            'daily' => [
                'eyebrow' => 'Selalu Segar',
                'title' => "Roti dari\nPagi Ini.",
                'description' => 'Kami memanggang dalam batch kecil. Setiap loaf diperiksa sebelum masuk rak. Kalau sudah habis, tidak ada tambahan hari itu.',
                'open_time' => '06.00 WIB',
                'close_time' => '14.00 WIB',
                'closed_day' => 'Senin',
                'products' => [
                    ['name' => 'Sourdough Classic', 'description' => 'Fermentasi 18 jam, krust tebal', 'status' => 'Tersedia', 'slug' => 'sourdough'],
                    ['name' => 'Croissant Butter', 'description' => 'Butter Prancis, 27 lipatan', 'status' => 'Tersedia', 'slug' => 'croissant'],
                    ['name' => 'Rye Dark', 'description' => 'Gandum hitam, dense, sedikit asam', 'status' => 'Tersedia', 'slug' => 'rye'],
                    ['name' => 'Focaccia Rosemary', 'description' => 'Minyak zaitun extra virgin, rosemary segar', 'status' => 'Habis Hari Ini', 'slug' => 'focaccia'],
                    ['name' => 'Cinnamon Roll', 'description' => 'Kayu manis Cassia, glazur susu', 'status' => 'Tersedia', 'slug' => 'cinnamon'],
                ],
            ],
            'process' => [
                'eyebrow' => 'Dari Tangan ke Meja Anda',
                'title' => 'Begini Cara Kami Bekerja',
                'steps' => [
                    ['time' => 'Pukul 20.00, malam sebelumnya', 'title' => 'Starter Dibangunkan', 'description' => 'Levain kami berumur lebih dari dua tahun. Setiap malam ia diberi makan campuran tepung terigu dan gandum hitam sebelum bekerja keesokan harinya.'],
                    ['time' => 'Pukul 02.00', 'title' => 'Autolyse dan Mixing', 'description' => 'Tepung dan air dicampur, dibiarkan istirahat, lalu levain dan garam dimasukkan. Tidak ada mixer mesin untuk adonan sourdough kami.'],
                    ['time' => 'Pukul 02.00 sampai 05.00', 'title' => 'Bulk Fermentation', 'description' => 'Adonan difermentasi tiga jam dalam suhu ruang, dengan stretch-and-fold tiap 30 menit. Di sinilah rasa asam berkembang pelan.'],
                    ['time' => 'Pukul 05.00', 'title' => 'Shaping dan Scoring', 'description' => 'Setiap loaf dibentuk tangan, ditaruh di banneton, lalu diskor dengan lame. Pola skor bukan dekorasi, ia mengontrol arah pengembangan krust.'],
                    ['time' => 'Pukul 05.30', 'title' => 'Panggang dan Dinginkan', 'description' => 'Oven batu pada 240 derajat Celsius dengan uap. Setelah keluar, roti tidak boleh dipotong minimal satu jam. Proses matang berlanjut di dalam krust.'],
                ],
            ],
            'identity' => [
                'eyebrow' => 'Komitmen Kami',
                'title' => 'Bahan Asli, Proses Jujur.',
                'since_year' => '2019',
                'location' => 'Jakarta Selatan',
                'points' => [
                    ['title' => 'Tepung dari Penggilingan Lokal', 'description' => 'Kami bekerja langsung dengan penggiling di Jawa Tengah yang mengirim setiap dua minggu.'],
                    ['title' => 'Tanpa Pengawet, Tanpa Improver', 'description' => 'Hanya empat bahan: tepung, air, garam, starter. Roti tahan dua hari di suhu ruang jika disimpan benar.'],
                    ['title' => 'Batch Kecil Setiap Hari', 'description' => 'Kami tidak memanggang cadangan. Jumlah yang dipanggang sama dengan yang kami perkirakan terjual hari itu.'],
                ],
            ],
            'featured_menu' => [
                'eyebrow' => 'Pilihan Pelanggan',
                'title' => 'Menu Unggulan',
                'cta_label' => 'Pesan Sekarang',
                'cta_url' => '#pesan',
                'products' => [
                    ['category' => 'Roti Utama', 'name' => 'Sourdough Classic', 'description' => 'Krust gelap, crumb terbuka, rasa asam ringan. Cocok dengan mentega, keju, atau dimakan langsung.', 'price' => 75000, 'slug' => 'sourdough'],
                    ['category' => 'Pastry', 'name' => 'Croissant Butter', 'description' => '27 lapisan, butter Prancis, renyah di luar lembut di dalam.', 'price' => 35000, 'slug' => 'croissant'],
                    ['category' => 'Whole Grain', 'name' => 'Rye Dark', 'description' => 'Gandum hitam penuh, untuk mereka yang serius soal rasa.', 'price' => 85000, 'slug' => 'rye'],
                    ['category' => 'Flatbread', 'name' => 'Focaccia Rosemary', 'description' => 'Direndam minyak zaitun extra virgin semalam. Rosemary segar. Dijual per potong besar.', 'price' => 40000, 'slug' => 'focaccia'],
                    ['category' => 'Pastry Manis', 'name' => 'Cinnamon Roll', 'description' => 'Kayu manis Cassia dari Sumatra, glazur susu tipis. Tidak terlalu manis.', 'price' => 42000, 'slug' => 'cinnamon'],
                ],
            ],
            'order_section' => [
                'eyebrow' => 'Pesan Lebih Mudah',
                'title' => "Reservasi untuk\nBesok.",
                'description' => 'Untuk memastikan roti tersedia, Anda bisa memesan sehari sebelumnya. Pesanan dikonfirmasi via WhatsApp sebelum pukul 21.00 malam.',
                'whatsapp' => '+62 812-3456-7890',
                'address' => 'Jl. Kemang Raya No. 12, Jakarta Selatan',
                'business_hours' => 'Selasa - Minggu, 06.00 - 14.00',
            ],
        ];
    }

    public static function singleton(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            [
                'hero' => [],
                'daily' => [],
                'process' => [],
                'identity' => [],
                'featured_menu' => [],
                'order_section' => [],
            ],
        );
    }
}
