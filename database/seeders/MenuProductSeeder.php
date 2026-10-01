<?php

namespace Database\Seeders;

use App\Models\MenuProduct;
use Illuminate\Database\Seeder;

class MenuProductSeeder extends Seeder
{
    public function run(): void
    {
        if (MenuProduct::query()->exists()) {
            return;
        }

        $products = [
                [
                    'name' => 'Sourdough Classic Loaf',
                    'slug' => 'sourdough',
                    'category' => 'Sourdough',
                    'category_label' => 'Artisan Sourdough',
                    'description' => 'Loaf andalan kami dengan kerak tebal keemasan dan sarang lebah (open crumb) yang lembut. Rasa asam segar seimbang dari starter ragi alami 2 tahun.',
                    'price' => 75000,
                    'badge_label' => 'Tersedia Harian',
                    'is_available' => true,
                    'specifications' => ['⏱ Fermentasi 18 Jam', '⚖ 850 gram', '🌱 100% Vegan'],
                    'details' => [
                        ['label' => 'Bahan Pokok', 'value' => 'Tepung terigu gandum, air murni, ragi alami (levain), garam laut'],
                        ['label' => 'Fermentasi', 'value' => '18 jam bulk & cold retard'],
                        ['label' => 'Berat Bersih', 'value' => '850-900 gram'],
                        ['label' => 'Ketahanan', 'value' => '3 hari suhu ruang, 1 bulan freezer'],
                    ],
                    'keywords' => 'sourdough classic loaf asam krust tepung lokal artisan gandum starter',
                    'sort_order' => 1,
                ],
                [
                    'name' => 'Croissant Butter Prancis',
                    'slug' => 'croissant',
                    'category' => 'Pastry',
                    'category_label' => 'Viennoiserie',
                    'description' => 'Dibuat dengan teknik pelipatan tradisional 27 lapis menggunakan mentega AOP Prancis berlemak tinggi. Sangat renyah di luar, harum mentega lembut di dalam.',
                    'price' => 35000,
                    'badge_label' => 'Best Seller',
                    'is_available' => true,
                    'specifications' => ['🧈 French AOP Butter', '🥐 27 Lapisan', '⚖ 100 gram'],
                    'details' => [
                        ['label' => 'Bahan Pokok', 'value' => 'Tepung terigu Prancis, French AOP butter, susu segar, ragi, gula, garam'],
                        ['label' => 'Lapisan', 'value' => '27 laminated micro-layers'],
                        ['label' => 'Berat Bersih', 'value' => '100-110 gram'],
                        ['label' => 'Waktu Terbaik', 'value' => 'Pagi hari atau dipanaskan 2 menit'],
                    ],
                    'keywords' => 'croissant butter prancis viennoiserie pastry mentega renyah layer',
                    'sort_order' => 2,
                ],
                [
                    'name' => 'Dark Rye Loaf 70%',
                    'slug' => 'rye',
                    'category' => 'Sourdough',
                    'category_label' => 'Whole Grain Sourdough',
                    'description' => 'Menggunakan 70% tepung gandum hitam utuh (whole rye). Tekstur padat lembap dengan karakter rasa asam bumi yang pekat. Nikmat dengan keju atau smoked beef.',
                    'price' => 85000,
                    'badge_label' => 'High Fiber',
                    'is_available' => true,
                    'specifications' => ['🌾 70% Dark Rye', '⏱ Fermentasi 24 Jam', '⚖ 750 gram'],
                    'details' => [
                        ['label' => 'Bahan Pokok', 'value' => '70% tepung gandum hitam (rye), tepung gandum, air, starter gandum, garam'],
                        ['label' => 'Fermentasi', 'value' => '24 jam cold fermentation'],
                        ['label' => 'Berat Bersih', 'value' => '750-800 gram'],
                        ['label' => 'Karakter', 'value' => 'Padat, lembap, kaya serat, asam'],
                    ],
                    'keywords' => 'rye dark loaf gandum hitam jerman asam padat serat tinggi healthy diet',
                    'sort_order' => 3,
                ],
                [
                    'name' => 'Focaccia Rosemary & Olive Oil',
                    'slug' => 'focaccia',
                    'category' => 'Savory',
                    'category_label' => 'Savory Flatbread',
                    'description' => 'Adonan lembut kaya gelembung udara, dimarinasi minyak zaitun extra virgin, daun rosemary segar, serta taburan garam laut fleur de sel renyah.',
                    'price' => 40000,
                    'badge_label' => 'Fresh Batch',
                    'is_available' => true,
                    'specifications' => ['🫒 Extra Virgin Olive Oil', '🌿 Fresh Rosemary', '⚖ Slice 15x15 cm'],
                    'details' => [
                        ['label' => 'Bahan Pokok', 'value' => 'Tepung protein tinggi, extra virgin olive oil, rosemary, fleur de sel, ragi'],
                        ['label' => 'Karakteristik', 'value' => 'Lembut, bersarang, wangi herbal zaitun'],
                        ['label' => 'Penyajian', 'value' => 'Cocok dicocol balsamic vinegar dan olive oil'],
                        ['label' => 'Ketahanan', 'value' => '2 hari suhu ruang'],
                    ],
                    'keywords' => 'focaccia rosemary olive oil zaitun fleur de sel flatbread savory italia',
                    'sort_order' => 4,
                ],
                [
                    'name' => 'Cinnamon Roll Sumatra',
                    'slug' => 'cinnamon',
                    'category' => 'Sweet',
                    'category_label' => 'Pastry Manis',
                    'description' => 'Menggunakan kayu manis Cassia pilihan dari Sumatra Barat, gula aren organik, dan glasur susu murni tipis yang tidak berlebihan.',
                    'price' => 42000,
                    'badge_label' => 'Favorit Sarapan',
                    'is_available' => true,
                    'specifications' => ['🪵 Sumatra Cassia', '🥛 Pure Milk Glaze', '⚖ 140 gram'],
                    'details' => [
                        ['label' => 'Bahan Pokok', 'value' => 'Tepung brioche, butter Prancis, telur, kayu manis Sumatra, gula aren'],
                        ['label' => 'Aroma', 'value' => 'Kayu manis hangat dengan karamel gula aren'],
                        ['label' => 'Berat Bersih', 'value' => '140-150 gram'],
                        ['label' => 'Penyajian', 'value' => 'Hangatkan 15 detik sebelum dinikmati'],
                    ],
                    'keywords' => 'cinnamon roll kayu manis sumatra gula aren glazed pastry manis gula',
                    'sort_order' => 5,
                ],
                [
                    'name' => 'Pain au Chocolat 58%',
                    'slug' => 'pain-au-chocolat',
                    'category' => 'Pastry',
                    'category_label' => 'Viennoiserie',
                    'description' => 'Dua batang cokelat dark couverture 58% meleleh lembut di tengah adonan croissant berlapis mentega Prancis. Teman sempurna untuk kopi pagi.',
                    'price' => 38000,
                    'badge_label' => 'Tersedia Harian',
                    'is_available' => true,
                    'specifications' => ['🍫 Dark Couverture 58%', '🧈 French Butter', '⚖ 110 gram'],
                    'details' => [
                        ['label' => 'Bahan Pokok', 'value' => 'Tepung terigu, French butter, dark couverture 58%, susu, ragi, gula'],
                        ['label' => 'Cokelat', 'value' => 'Dark couverture 58%'],
                        ['label' => 'Berat Bersih', 'value' => '110-120 gram'],
                        ['label' => 'Waktu Terbaik', 'value' => 'Hangat di pagi hari'],
                    ],
                    'keywords' => 'pain au chocolat cokelat prancis valrhona viennoiserie pastry choco croissant',
                    'sort_order' => 6,
                ],
                [
                    'name' => 'Almond Frangipane Croissant',
                    'slug' => 'almond-croissant',
                    'category' => 'Sweet',
                    'category_label' => 'Pastry Manis',
                    'description' => 'Croissant mentega yang dipanggang ulang dengan krim almond (frangipane) buatan sendiri, irisan almond panggang, dan taburan gula halus.',
                    'price' => 48000,
                    'badge_label' => 'Double Baked',
                    'is_available' => true,
                    'specifications' => ['🌰 Homemade Frangipane', '🔥 Double Baked', '⚖ 150 gram'],
                    'details' => [
                        ['label' => 'Bahan Pokok', 'value' => 'Croissant butter, pasta almond, mentega, telur, almond panggang'],
                        ['label' => 'Tekstur', 'value' => 'Renyah di luar, lembut manis gurih di dalam'],
                        ['label' => 'Berat Bersih', 'value' => '150 gram'],
                        ['label' => 'Alergen', 'value' => 'Mengandung almond, susu, dan telur'],
                    ],
                    'keywords' => 'almond croissant frangipane kacang almond tabur gula bubuk viennoiserie double baked',
                    'sort_order' => 7,
                ],
                [
                    'name' => 'Baguette Traditionnelle',
                    'slug' => 'baguette',
                    'category' => 'Sourdough',
                    'category_label' => 'Artisan Bread',
                    'description' => 'Roti tongkat khas Prancis dengan kulit luar garing dan remah dalam yang kenyal serta berongga. Cocok untuk garlic bread atau sandwich.',
                    'price' => 38000,
                    'badge_label' => 'Tersedia Harian',
                    'is_available' => true,
                    'specifications' => ['⏱ Fermentasi 16 Jam', '📏 Panjang 55 cm', '⚖ 350 gram'],
                    'details' => [
                        ['label' => 'Bahan Pokok', 'value' => 'Tepung terigu T65, air murni, starter alami, garam laut'],
                        ['label' => 'Ukuran', 'value' => 'Panjang 55 cm'],
                        ['label' => 'Berat Bersih', 'value' => '350 gram'],
                        ['label' => 'Cocok Untuk', 'value' => 'Sandwich, garlic bread, dan bruschetta'],
                    ],
                    'keywords' => 'baguette prancis tradisional panjang roti kerak keras sandwich levan',
                    'sort_order' => 8,
                ],
                [
                    'name' => 'Signature Cold Brew Black',
                    'slug' => 'cold-brew',
                    'category' => 'Coffee',
                    'category_label' => 'Minuman Pendamping',
                    'description' => 'Kopi Arabika Aceh Gayo yang diseduh dingin perlahan selama 16 jam. Rasa manis alami berry dan cokelat tanpa gula tambahan.',
                    'price' => 38000,
                    'badge_label' => 'Fresh Brewed',
                    'is_available' => true,
                    'specifications' => ['☕ Single Origin Gayo', '⏱ Cold Steep 16 Jam', '🧴 Botol 250 ml'],
                    'details' => [
                        ['label' => 'Bahan Pokok', 'value' => '100% kopi Arabika Aceh Gayo dan air mineral terfilter'],
                        ['label' => 'Metode', 'value' => 'Cold immersion steeping 16 jam'],
                        ['label' => 'Volume', 'value' => '250 ml'],
                        ['label' => 'Karakter', 'value' => 'Rendah asam, tanpa gula'],
                    ],
                    'keywords' => 'kopi cold brew arabika gayo artisan drink minuman botol',
                    'sort_order' => 9,
                ],
            ];

        foreach ($products as $product) {
            $product['whatsapp_number'] = '6281234567890';
            $product['is_active'] = true;

            MenuProduct::query()->create($product);
        }
    }
}
