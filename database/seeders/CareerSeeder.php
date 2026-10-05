<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Career::query()->exists()) {
            return;
        }

        Career::query()->create([
            'title' => 'Baker Artisan',
            'employment_type' => 'Full Time',
            'location' => 'Jakarta',
            'description' => 'Kami mencari baker yang bersemangat dan berpengalaman dalam pembuatan roti artisan (sourdough, croissant, dsb). Anda akan bertanggung jawab mulai dari persiapan bahan, proses fermentasi, hingga pemanggangan.',
            'application_email' => 'hrd@francisartisanbakery.com',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Career::query()->create([
            'title' => 'Store Assistant / Kasir',
            'employment_type' => 'Full Time / Part Time',
            'location' => 'Jakarta',
            'description' => 'Membantu melayani pelanggan dengan ramah, menjelaskan varian produk, mengatur display roti, dan menangani transaksi. Dibutuhkan kemampuan komunikasi yang baik dan teliti.',
            'application_email' => 'hrd@francisartisanbakery.com',
            'is_active' => true,
            'sort_order' => 2,
        ]);
    }
}
