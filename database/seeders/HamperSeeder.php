<?php

namespace Database\Seeders;

use App\Models\Hamper;
use Illuminate\Database\Seeder;

class HamperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hampers = [
            [
                'name' => 'Hamper Lebaran Premium 2024',
                'slug' => 'hamper-lebaran-premium-2024',
                'description' => 'Hamper spesial untuk perayaan Lebaran dengan koleksi roti artisan pilihan dan pastry premium. Dikemas cantik dalam keranjang rotan dengan pita hijau elegan.',
                'price' => 850000,
                'badge_label' => 'Best Seller',
                'is_available' => true,
                'is_active' => true,
                'whatsapp_number' => '6281234567890',
                'sort_order' => 1,
                'keywords' => 'hamper lebaran, parcel lebaran, hamper premium, gift box lebaran',
                'specifications' => [
                    'Ukuran: 40cm x 30cm x 25cm',
                    'Berat: ±2.5 kg',
                    'Keranjang Rotan Premium',
                    'Free Kartu Ucapan',
                    'Packaging Eksklusif',
                ],
                'contents' => [
                    [
                        'name' => 'Sourdough Classic',
                        'quantity' => 1,
                        'unit' => 'loaf',
                        'description' => 'Roti sourdough signature dengan rasa asam yang seimbang',
                    ],
                    [
                        'name' => 'Pain au Chocolat',
                        'quantity' => 4,
                        'unit' => 'pcs',
                        'description' => 'Pastry berlapis dengan cokelat premium',
                    ],
                    [
                        'name' => 'Croissant Butter',
                        'quantity' => 6,
                        'unit' => 'pcs',
                        'description' => 'Croissant klasik dengan mentega berkualitas',
                    ],
                    [
                        'name' => 'Cookies Almond',
                        'quantity' => 1,
                        'unit' => 'box',
                        'description' => 'Cookies renyah dengan almond slice (isi 12 pcs)',
                    ],
                    [
                        'name' => 'Madu Premium',
                        'quantity' => 1,
                        'unit' => 'botol',
                        'description' => 'Madu murni 250ml sebagai pelengkap',
                    ],
                ],
            ],
            [
                'name' => 'Hamper Natal Joy & Peace',
                'slug' => 'hamper-natal-joy-peace',
                'description' => 'Hadiah Natal istimewa berisi koleksi roti dan kue kering pilihan. Sempurna untuk keluarga dan rekan bisnis. Tersedia dalam packaging festive merah-hijau.',
                'price' => 750000,
                'badge_label' => 'Pre-Order',
                'is_available' => true,
                'is_active' => true,
                'whatsapp_number' => '6281234567890',
                'sort_order' => 2,
                'keywords' => 'hamper natal, christmas hamper, gift box natal, parcel natal',
                'specifications' => [
                    'Ukuran: 35cm x 30cm x 20cm',
                    'Berat: ±2 kg',
                    'Box Premium dengan Pita',
                    'Kartu Ucapan Natal',
                    'Tersedia Pre-Order',
                ],
                'contents' => [
                    [
                        'name' => 'Stollen Christmas Bread',
                        'quantity' => 1,
                        'unit' => 'loaf',
                        'description' => 'Roti khas Natal dengan dried fruits dan marzipan',
                    ],
                    [
                        'name' => 'Gingerbread Cookies',
                        'quantity' => 1,
                        'unit' => 'box',
                        'description' => 'Cookies jahe klasik Natal (isi 15 pcs)',
                    ],
                    [
                        'name' => 'Danish Pastry Mix',
                        'quantity' => 6,
                        'unit' => 'pcs',
                        'description' => 'Variasi danish dengan topping berbeda',
                    ],
                    [
                        'name' => 'Hot Chocolate Mix',
                        'quantity' => 1,
                        'unit' => 'pack',
                        'description' => 'Premium hot chocolate powder 200gr',
                    ],
                ],
            ],
            [
                'name' => 'Hamper Appreciation Corporate',
                'slug' => 'hamper-appreciation-corporate',
                'description' => 'Hamper elegan untuk apresiasi klien dan karyawan. Berisi produk artisan berkualitas tinggi dengan kemasan profesional dan eksklusif.',
                'price' => 1200000,
                'badge_label' => 'Limited',
                'is_available' => true,
                'is_active' => true,
                'whatsapp_number' => '6281234567890',
                'sort_order' => 3,
                'keywords' => 'hamper corporate, hamper kantor, hamper bisnis, gift box perusahaan',
                'specifications' => [
                    'Ukuran: 45cm x 35cm x 30cm',
                    'Berat: ±3 kg',
                    'Wooden Box Premium',
                    'Custom Branding Available',
                    'Minimum Order: 10 pcs',
                ],
                'contents' => [
                    [
                        'name' => 'Multigrain Sourdough',
                        'quantity' => 1,
                        'unit' => 'loaf',
                        'description' => 'Sourdough dengan berbagai biji-bijian',
                    ],
                    [
                        'name' => 'Artisan Croissant Selection',
                        'quantity' => 8,
                        'unit' => 'pcs',
                        'description' => 'Mix croissant plain, almond, dan chocolate',
                    ],
                    [
                        'name' => 'Premium Cookies Assortment',
                        'quantity' => 2,
                        'unit' => 'box',
                        'description' => '2 box berisi berbagai varian cookies (total 24 pcs)',
                    ],
                    [
                        'name' => 'French Macarons',
                        'quantity' => 12,
                        'unit' => 'pcs',
                        'description' => 'Macarons premium dengan 6 rasa berbeda',
                    ],
                    [
                        'name' => 'Artisan Jam',
                        'quantity' => 2,
                        'unit' => 'jar',
                        'description' => 'Selai strawberry dan blueberry homemade',
                    ],
                    [
                        'name' => 'Premium Coffee Beans',
                        'quantity' => 1,
                        'unit' => 'pack',
                        'description' => 'Kopi arabika 250gr',
                    ],
                ],
            ],
        ];

        foreach ($hampers as $hamper) {
            Hamper::create($hamper);
        }
    }
}