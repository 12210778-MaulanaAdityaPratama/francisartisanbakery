# Backend Setup - Francis Artisan Bakery

## Fitur Backend yang Telah Dibuat

Backend untuk 3 fitur utama telah berhasil dibuat:

### 1. **Hampers** (Paket Hadiah)
- Model: `Hamper`
- Resource Filament: `HamperResource`
- Navigasi: Katalog → Hampers
- Icon: 🎁 (Gift)

**Field yang tersedia:**
- Nama Hamper
- Slug URL
- Deskripsi
- Harga
- Badge Label (Best Seller, Limited, Pre-Order, dll)
- Isi Hamper (Repeater): Nama item, jumlah, satuan, deskripsi
- Spesifikasi (Tags)
- Gambar Utama
- Gambar Galeri (Multiple Upload, max 6)
- Status: Tersedia / Aktif
- Urutan Tampil
- Nomor WhatsApp
- Keywords

### 2. **Tentang Kami** (About Us)
- Model: `AboutUs`
- Resource Filament: `AboutUsResource`
- Navigasi: Konten → Tentang Kami
- Icon: ℹ️ (Information Circle)

**Field yang tersedia:**
- Judul
- Sub-judul / Tagline
- Konten Utama (Rich Editor)
- Foto Banner
- Nilai-nilai Perusahaan (Repeater): Nama nilai, icon, deskripsi
- Tim / Founder (Repeater): Nama, jabatan, bio, foto
- Sejarah & Pencapaian (Repeater): Tahun, judul, deskripsi
- Kontak: Email, Telepon, Alamat
- Status Aktif

### 3. **Bread Care** (Tips Perawatan Roti)
- Model: `BreadCare`
- Resource Filament: `BreadCareResource`
- Navigasi: Konten → Bread Care
- Icon: 💡 (Light Bulb)

**Field yang tersedia:**
- Judul Tips
- Kategori: Penyimpanan, Memanaskan, Pembekuan, Penyajian, Kesegaran, Umum
- Icon (emoji atau heroicon)
- Deskripsi Singkat
- Konten Detail (Rich Editor)
- Tips Poin-poin (Repeater)
- Gambar Ilustrasi
- Status Aktif
- Urutan Tampil

## Data Dummy

Seeder telah dibuat dengan data dummy yang lengkap dan realistis:

### Hamper (3 data)
1. **Hamper Lebaran Premium 2024** - Rp 850.000
   - Isi: Sourdough, Pain au Chocolat, Croissant, Cookies, Madu
   - Badge: Best Seller

2. **Hamper Natal Joy & Peace** - Rp 750.000
   - Isi: Stollen, Gingerbread Cookies, Danish Pastry, Hot Chocolate
   - Badge: Pre-Order

3. **Hamper Appreciation Corporate** - Rp 1.200.000
   - Isi: Sourdough, Croissant Selection, Cookies, Macarons, Jam, Coffee
   - Badge: Limited

### Tentang Kami (1 data)
- Cerita lengkap Francis Artisan Bakery
- 4 Nilai perusahaan (Kualitas, Tradisi & Inovasi, Ramah Lingkungan, Komunitas)
- 3 Anggota tim (Founder, Pastry Chef, Sourdough Specialist)
- 5 Pencapaian (2018-2024)
- Kontak lengkap

### Bread Care (6 data)
1. Cara Menyimpan Sourdough
2. Cara Memanaskan Roti Artisan
3. Membekukan dan Mencairkan Roti
4. Tips Menyajikan Roti Artisan
5. Menjaga Kesegaran Croissant
6. Mengenali Tanda-tanda Roti Masih Baik

## Cara Menjalankan Migration & Seeder

### Jika menggunakan Docker:
```bash
# Masuk ke container
docker-compose exec app bash

# Jalankan migration
php artisan migrate

# Jalankan seeder untuk data dummy
php artisan db:seed

# Atau jalankan seeder spesifik
php artisan db:seed --class=HamperSeeder
php artisan db:seed --class=AboutUsSeeder
php artisan db:seed --class=BreadCareSeeder
```

### Jika menjalankan lokal:
```bash
# Jalankan migration
php artisan migrate

# Jalankan seeder untuk data dummy
php artisan db:seed
```

## Akses Filament Admin Panel

Setelah migration dan seeder berhasil:

1. Buka browser: `http://localhost/admin` (atau sesuai URL project Anda)
2. Login dengan credentials default:
   - Email: `test@example.com`
   - Password: `password`

3. Navigasi yang tersedia:
   - **Katalog** → Katalog Menu (existing)
   - **Katalog** → Hampers (baru)
   - **Konten** → Tentang Kami (baru)
   - **Konten** → Bread Care (baru)

## Struktur File Backend

```
app/
├── Filament/
│   └── Resources/
│       ├── Hampers/
│       │   ├── HamperResource.php
│       │   ├── Pages/
│       │   │   ├── ListHampers.php
│       │   │   ├── CreateHamper.php
│       │   │   └── EditHamper.php
│       │   ├── Schemas/
│       │   │   └── HamperForm.php
│       │   └── Tables/
│       │       └── HampersTable.php
│       ├── AboutUs/
│       │   ├── AboutUsResource.php
│       │   ├── Pages/
│       │   ├── Schemas/
│       │   └── Tables/
│       └── BreadCares/
│           ├── BreadCareResource.php
│           ├── Pages/
│           ├── Schemas/
│           └── Tables/
├── Models/
│   ├── Hamper.php
│   ├── AboutUs.php
│   └── BreadCare.php
database/
├── migrations/
│   ├── 2026_10_04_131009_create_hampers_table.php
│   ├── 2026_10_04_131017_create_about_us_table.php
│   └── 2026_10_04_131018_create_bread_cares_table.php
└── seeders/
    ├── HamperSeeder.php
    ├── AboutUsSeeder.php
    ├── BreadCareSeeder.php
    └── DatabaseSeeder.php (updated)
```

## API Endpoint (untuk Frontend)

Anda perlu membuat API Controller untuk mengakses data di frontend:

```php
// Contoh endpoint yang bisa dibuat:
GET /api/hampers           // List semua hampers aktif
GET /api/hampers/{slug}    // Detail hamper
GET /api/about-us          // Data tentang kami
GET /api/bread-care        // List semua bread care tips
GET /api/bread-care/{slug} // Detail bread care tip
```

## Tips Pengisian Data

### Hampers
- Gunakan slug yang SEO-friendly (huruf kecil, tanda hubung)
- Upload gambar dengan rasio 4:3 atau 1:1
- Isi "Isi Hamper" dengan detail agar customer tahu apa saja yang didapat
- Gunakan Badge Label untuk highlight (Best Seller, Limited, Pre-Order, New)

### Tentang Kami
- Tulis cerita yang personal dan autentik
- Upload foto tim untuk membangun trust
- Cantumkan pencapaian untuk kredibilitas

### Bread Care
- Pilih kategori yang sesuai
- Gunakan icon emoji untuk visual menarik (🍞 🔥 ❄️ 🍽️)
- Tulis konten yang praktis dan mudah dipahami
- Tambahkan tips dalam bentuk poin-poin untuk kemudahan membaca

## Fitur Upload Gambar

Semua upload gambar otomatis:
- Di-convert ke format WebP (lebih hemat bandwidth)
- Di-resize sesuai kebutuhan
- Disimpan di `storage/app/public/`
- Path yang digunakan:
  - Hampers: `hampers/` dan `hampers/gallery/`
  - About Us: `about/` dan `about/team/`
  - Bread Care: `bread-care/`

## Troubleshooting

### Error Permission Denied
Jika di Docker:
```bash
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
```

### Error Database Connection
Pastikan database sudah running dan `.env` sudah dikonfigurasi dengan benar.

## Catatan Penting

1. **Data dummy sudah lengkap** - Anda bisa langsung lihat contoh pengisian data yang baik
2. **Semua field sudah ada helper text** - Panduan ada di setiap field form
3. **Validasi sudah diterapkan** - Required field, unique slug, dll
4. **Image optimizer sudah terintegrasi** - Menggunakan WebpImageOptimizer yang existing
5. **Struktur sama dengan MenuProduct** - Konsisten dengan arsitektur yang sudah ada

## Next Steps

1. Jalankan migration dan seeder
2. Login ke Filament admin panel
3. Lihat data dummy yang sudah ada
4. Edit atau tambah data sesuai kebutuhan Anda
5. Buat API Controller untuk frontend (jika diperlukan)
6. Integrasikan dengan frontend React/Next.js Anda

---

**Happy Coding! 🚀**