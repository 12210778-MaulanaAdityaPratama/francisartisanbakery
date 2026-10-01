<?php

namespace Database\Seeders;

use App\Models\StoreLocation;
use Illuminate\Database\Seeder;

class StoreLocationSeeder extends Seeder
{
    public function run(): void
    {
        if (StoreLocation::query()->exists()) {
            return;
        }

        $stores = [
            [
                'name' => 'Francis Sunter — Central Bakehouse',
                'slug' => 'sunter',
                'area' => 'Jakarta Utara',
                'type_label' => 'Flagship Store',
                'address' => 'Jl. Nusantara Timur 10 Blok D No. 47, RT.3/RW.17, Sunter Agung, Kec. Tj. Priok, Jakarta Utara 14350',
                'operating_hours' => '06.00 – 20.00 WIB (Setiap Hari)',
                'phone' => '+62 812-3456-7890',
                'whatsapp_number' => '6281234567890',
                'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Jl.+Nusantara+Timur+10+Blok+d+No.47+Sunter+Agung+Jakarta+Utara',
                'latitude' => -6.13845,
                'longitude' => 106.86210,
                'facilities' => ['🥖 Central Kitchen', '🔥 Fresh Every Hour', '☕ Espresso Bar', '🚗 Parkir Luas', '🛵 GoSend / Grab', '📶 Free Wi-Fi'],
                'keywords' => 'sunter tanjung priok jakarta utara nusantara flagship central kitchen head office',
                'is_flagship' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Francis Senopati — Bakery & Cafe',
                'slug' => 'senopati',
                'area' => 'Jakarta Selatan',
                'type_label' => 'Dine-in Cafe',
                'address' => 'Jl. Senopati No. 42, Selong, Kebayoran Baru, Jakarta Selatan 12190',
                'operating_hours' => '07.00 – 21.00 WIB (Setiap Hari)',
                'phone' => '+62 813-8888-2301',
                'whatsapp_number' => '6281388882301',
                'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Jl.+Senopati+No.+42+Kebayoran+Baru+Jakarta+Selatan',
                'latitude' => -6.23450,
                'longitude' => 106.81120,
                'facilities' => ['🪑 45 Kursi Dine-in', '🥪 All-Day Brunch', '☕ Specialty Coffee', '🐕 Pet-friendly Patio', '⚡ Stopkontak & Wi-Fi'],
                'keywords' => 'senopati kebayoran baru jakarta selatan scbd cafe brunch dine-in',
                'sort_order' => 2,
            ],
            [
                'name' => 'Francis Grand Indonesia',
                'slug' => 'gi',
                'area' => 'Jakarta Pusat',
                'type_label' => 'Mall Boutique',
                'address' => 'Grand Indonesia East Mall, Lantai LG Unit #18, Jl. M.H. Thamrin No. 1, Jakarta Pusat 10310',
                'operating_hours' => '10.00 – 22.00 WIB (Sesuai Jam Mall)',
                'phone' => '+62 813-8888-2302',
                'whatsapp_number' => '6281388882302',
                'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Grand+Indonesia+East+Mall+Jakarta+Pusat',
                'latitude' => -6.19500,
                'longitude' => 106.82100,
                'facilities' => ['🥐 Fresh Pastry Counter', '🛍️ Grab & Go', '🎁 Hampers & Gift Box', '💳 Cashless Only'],
                'keywords' => 'grand indonesia gi thamrin jakarta pusat mall boutique to-go grab express',
                'sort_order' => 3,
            ],
            [
                'name' => 'Francis Mall Kelapa Gading 3',
                'slug' => 'mkg',
                'area' => 'Jakarta Utara',
                'type_label' => 'Viennoiserie Bar',
                'address' => 'Mall Kelapa Gading 3, Ground Floor #G-08 (Dekat Lobby Selatan), Kelapa Gading, Jakarta Utara 14240',
                'operating_hours' => '10.00 – 22.00 WIB',
                'phone' => '+62 813-8888-2303',
                'whatsapp_number' => '6281388882303',
                'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Mall+Kelapa+Gading+3+Jakarta+Utara',
                'latitude' => -6.15780,
                'longitude' => 106.90800,
                'facilities' => ['🥖 Sourdough Restock 11.00 & 16.00', '☕ Coffee To-Go', '🔪 Free Bread Slicing'],
                'keywords' => 'kelapa gading mkg 3 mall jakarta utara boulangerie bakery coffee',
                'sort_order' => 4,
            ],
            [
                'name' => 'Francis Lippo Mall Puri',
                'slug' => 'puri',
                'area' => 'Jakarta Barat',
                'type_label' => 'Fresh Oven Corner',
                'address' => 'Lippo Mall Puri, LG Floor Unit #24, Jl. Puri Indah Raya Blok U1, Kembangan, Jakarta Barat 11610',
                'operating_hours' => '10.00 – 22.00 WIB',
                'phone' => '+62 813-8888-2304',
                'whatsapp_number' => '6281388882304',
                'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Lippo+Mall+Puri+Jakarta+Barat',
                'latitude' => -6.18660,
                'longitude' => 106.73600,
                'facilities' => ['🥖 Whole Loaves & Baguettes', '🔥 Warm-up Service', '🧈 Selai & Butter Organik'],
                'keywords' => 'puri indah lippo mall puri kembangan jakarta barat whole loaf artisan',
                'sort_order' => 5,
            ],
            [
                'name' => 'Francis Garden Patio — The Breeze BSD',
                'slug' => 'bsd',
                'area' => 'Tangerang',
                'type_label' => 'Garden Cafe',
                'address' => 'The Breeze BSD City, GF Unit L-15 (Danau View), Jl. Grand Boulevard, BSD City, Tangerang 15345',
                'operating_hours' => '07.30 – 21.00 WIB',
                'phone' => '+62 813-8888-2305',
                'whatsapp_number' => '6281388882305',
                'maps_url' => 'https://www.google.com/maps/search/?api=1&query=The+Breeze+BSD+City+Tangerang',
                'latitude' => -6.30150,
                'longitude' => 106.65340,
                'facilities' => ['🌳 Area Semi-Outdoor Danau', '🐶 Pet & Dog Friendly', '🍕 Sourdough Pizza Akhir Pekan', '☕ Manual Brew Bar'],
                'keywords' => 'the breeze bsd serpong tangerang banten patio outdoor dog pet garden cafe',
                'sort_order' => 6,
            ],
        ];

        foreach ($stores as $store) {
            StoreLocation::query()->create($store + ['is_active' => true]);
        }
    }
}
