<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::create([
            'title' => 'Tentang Francis Artisan Bakery',
            'subtitle' => 'Memanggang dengan Hati, Menyajikan dengan Cinta — Sejak 2018',
            'content' => '<h2>Cerita Kami</h2><p>Francis Artisan Bakery lahir dari kecintaan mendalam terhadap seni membuat roti. Didirikan pada tahun 2018 di Bandung, kami memulai perjalanan kami dari dapur kecil dengan satu misi sederhana: menghadirkan roti artisan berkualitas tinggi yang dibuat dengan tangan, menggunakan bahan-bahan terbaik pilihan.</p><p>Setiap loaf roti yang keluar dari oven kami adalah buah dari proses fermentasi panjang, ketelitian dalam memilih tepung, dan pengalaman bertahun-tahun. Kami percaya bahwa roti yang baik bukan sekadar makanan — ia adalah karya seni yang menghangatkan dan menyatukan orang-orang.</p><h2>Komitmen Kami</h2><p>Kami berkomitmen untuk tidak menggunakan bahan pengawet atau pewarna buatan. Setiap bahan yang kami gunakan dipilih dengan cermat: tepung dari mitra penggilingan lokal, mentega berkualitas premium, dan starter sourdough yang telah kami rawat selama bertahun-tahun.</p><p>Proses pembuatan roti kami mengikuti metode tradisional Eropa yang telah disempurnakan selama berabad-abad, dipadukan dengan sentuhan modern dan cita rasa lokal Indonesia.</p>',
            'image' => null,
            'contact_email' => 'hello@francisartisanbakery.com',
            'contact_phone' => '6281234567890',
            'address' => 'Jl. Diponegoro No. 45, Bandung, Jawa Barat 40115',
            'is_active' => true,
            'sort_order' => 0,
            'values' => [
                [
                    'title' => 'Kualitas Tanpa Kompromi',
                    'icon' => '⭐',
                    'description' => 'Kami hanya menggunakan bahan-bahan terbaik dan tidak pernah mengambil jalan pintas dalam proses pembuatan roti kami.',
                ],
                [
                    'title' => 'Tradisi & Inovasi',
                    'icon' => '🍞',
                    'description' => 'Menghormati teknik tradisional sambil terus berinovasi untuk menciptakan cita rasa yang relevan dan menarik.',
                ],
                [
                    'title' => 'Ramah Lingkungan',
                    'icon' => '🌿',
                    'description' => 'Kami menggunakan kemasan ramah lingkungan dan bermitra dengan petani lokal untuk mendukung keberlanjutan.',
                ],
                [
                    'title' => 'Komunitas Lokal',
                    'icon' => '❤️',
                    'description' => 'Kami bangga menjadi bagian dari komunitas Bandung dan berkomitmen untuk mendukung usaha lokal di sekitar kami.',
                ],
            ],
            'team_members' => [
                [
                    'name' => 'Francis Hendra',
                    'role' => 'Head Baker & Founder',
                    'bio' => 'Berpengalaman 15 tahun dalam dunia bakery, Francis belajar langsung di Paris dan Vienna sebelum membawa keahliannya kembali ke Indonesia.',
                    'photo' => null,
                ],
                [
                    'name' => 'Sarah Wijaya',
                    'role' => 'Pastry Chef',
                    'bio' => 'Lulusan Le Cordon Bleu Singapura, Sarah bertanggung jawab atas kreasi pastry dan viennoiserie kami yang selalu memanjakan lidah.',
                    'photo' => null,
                ],
                [
                    'name' => 'Dito Pratama',
                    'role' => 'Sourdough Specialist',
                    'bio' => 'Dengan obsesinya pada fermentasi, Dito merawat starter sourdough kami dan memastikan setiap loaf memiliki profil rasa yang sempurna.',
                    'photo' => null,
                ],
            ],
            'milestones' => [
                [
                    'year' => '2018',
                    'title' => 'Berdiri di Bandung',
                    'description' => 'Francis Artisan Bakery membuka pintu pertama kali dari dapur rumah di Bandung dengan menu sourdough dan croissant.',
                ],
                [
                    'year' => '2019',
                    'title' => 'Membuka Toko Pertama',
                    'description' => 'Membuka toko fisik pertama di Jl. Diponegoro dan langsung mendapat respons luar biasa dari pecinta roti Bandung.',
                ],
                [
                    'year' => '2021',
                    'title' => 'Ekspansi Online & Delivery',
                    'description' => 'Meluncurkan platform pre-order online dan layanan pengiriman ke seluruh Jawa Barat.',
                ],
                [
                    'year' => '2022',
                    'title' => 'Penghargaan Best Artisan Bakery',
                    'description' => 'Meraih penghargaan Best Artisan Bakery Bandung dari majalah kuliner terkemuka.',
                ],
                [
                    'year' => '2024',
                    'title' => 'Koleksi Hampers',
                    'description' => 'Meluncurkan lini hampers eksklusif untuk berbagai perayaan dan hadiah korporat.',
                ],
            ],
        ]);
    }
}