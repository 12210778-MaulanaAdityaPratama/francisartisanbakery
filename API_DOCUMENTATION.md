# API Documentation - Francis Artisan Bakery

Base URL: `http://your-domain.com/api`

## Authentication

Semua endpoint publik (read-only) tidak memerlukan authentication.

---

## Hampers

### Get All Hampers

**Endpoint:** `GET /api/hampers`

**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Hamper Lebaran Premium 2024",
      "slug": "hamper-lebaran-premium-2024",
      "description": "Hamper spesial untuk perayaan Lebaran...",
      "price": 850000,
      "image": "hampers/abc123.webp",
      "badge_label": "Best Seller",
      "is_available": true,
      "specifications": [
        "Ukuran: 40cm x 30cm x 25cm",
        "Berat: ±2.5 kg",
        "Keranjang Rotan Premium"
      ]
    }
  ]
}
```

### Get Hamper Detail

**Endpoint:** `GET /api/hampers/{slug}`

**Parameters:**
- `slug` (string, required) - Slug hamper

**Response:**
```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Hamper Lebaran Premium 2024",
    "slug": "hamper-lebaran-premium-2024",
    "description": "Hamper spesial untuk perayaan Lebaran...",
    "price": 850000,
    "image": "hampers/abc123.webp",
    "images": [
      "hampers/gallery/img1.webp",
      "hampers/gallery/img2.webp"
    ],
    "contents": [
      {
        "name": "Sourdough Classic",
        "quantity": 1,
        "unit": "loaf",
        "description": "Roti sourdough signature..."
      }
    ],
    "specifications": [
      "Ukuran: 40cm x 30cm x 25cm",
      "Berat: ±2.5 kg"
    ],
    "badge_label": "Best Seller",
    "is_available": true,
    "is_active": true,
    "whatsapp_number": "6281234567890",
    "sort_order": 1,
    "keywords": "hamper lebaran, parcel...",
    "created_at": "2024-10-04T13:10:09.000000Z",
    "updated_at": "2024-10-04T13:10:09.000000Z"
  }
}
```

**Error Response (404):**
```json
{
  "success": false,
  "message": "Hamper tidak ditemukan"
}
```

---

## About Us

### Get About Us Content

**Endpoint:** `GET /api/about-us`

**Response:**
```json
{
  "success": true,
  "data": {
    "id": 1,
    "title": "Tentang Francis Artisan Bakery",
    "subtitle": "Memanggang dengan Hati, Menyajikan dengan Cinta — Sejak 2018",
    "content": "<h2>Cerita Kami</h2><p>Francis Artisan Bakery lahir...</p>",
    "image": "about/banner.webp",
    "values": [
      {
        "title": "Kualitas Tanpa Kompromi",
        "icon": "⭐",
        "description": "Kami hanya menggunakan bahan-bahan terbaik..."
      }
    ],
    "team_members": [
      {
        "name": "Francis Hendra",
        "role": "Head Baker & Founder",
        "bio": "Berpengalaman 15 tahun...",
        "photo": "about/team/francis.webp"
      }
    ],
    "milestones": [
      {
        "year": "2018",
        "title": "Berdiri di Bandung",
        "description": "Francis Artisan Bakery membuka pintu..."
      }
    ],
    "contact_email": "hello@francisartisanbakery.com",
    "contact_phone": "6281234567890",
    "address": "Jl. Diponegoro No. 45, Bandung, Jawa Barat 40115",
    "is_active": true,
    "sort_order": 0,
    "created_at": "2024-10-04T13:10:09.000000Z",
    "updated_at": "2024-10-04T13:10:09.000000Z"
  }
}
```

**Error Response (404):**
```json
{
  "success": false,
  "message": "Konten tentang kami tidak ditemukan"
}
```

---

## Bread Care

### Get All Bread Care Tips

**Endpoint:** `GET /api/bread-care`

**Query Parameters:**
- `category` (string, optional) - Filter by category: `Storage`, `Reheating`, `Freezing`, `Serving`, `Freshness`, `General`

**Example:** `GET /api/bread-care?category=Storage`

**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "Cara Menyimpan Sourdough dengan Benar",
      "category": "Storage",
      "icon": "🍞",
      "description": "Panduan lengkap untuk menyimpan roti sourdough...",
      "image": "bread-care/storage-tips.webp"
    }
  ],
  "grouped": {
    "Storage": [
      {
        "id": 1,
        "title": "Cara Menyimpan Sourdough dengan Benar",
        "category": "Storage",
        "icon": "🍞",
        "description": "Panduan lengkap untuk menyimpan...",
        "image": "bread-care/storage-tips.webp"
      }
    ],
    "Reheating": [...]
  },
  "categories": {
    "Storage": "Penyimpanan",
    "Reheating": "Memanaskan Kembali",
    "Freezing": "Pembekuan",
    "Serving": "Penyajian",
    "Freshness": "Menjaga Kesegaran",
    "General": "Umum"
  }
}
```

### Get Bread Care Detail

**Endpoint:** `GET /api/bread-care/{id}`

**Parameters:**
- `id` (integer, required) - ID bread care tip

**Response:**
```json
{
  "success": true,
  "data": {
    "id": 1,
    "title": "Cara Menyimpan Sourdough dengan Benar",
    "category": "Storage",
    "icon": "🍞",
    "description": "Panduan lengkap untuk menyimpan roti sourdough...",
    "content": "<h3>Menyimpan dengan Tepat</h3><p>Sourdough adalah...",
    "tips": [
      {
        "content": "Simpan dengan bagian yang terpotong menghadap ke bawah..."
      },
      {
        "content": "Gunakan bread box atau wadah dengan sirkulasi udara..."
      }
    ],
    "image": "bread-care/storage-tips.webp",
    "is_active": true,
    "sort_order": 1,
    "created_at": "2024-10-04T13:10:09.000000Z",
    "updated_at": "2024-10-04T13:10:09.000000Z"
  }
}
```

**Error Response (404):**
```json
{
  "success": false,
  "message": "Tips tidak ditemukan"
}
```

---

## Image URLs

Semua path gambar yang dikembalikan API adalah relative path. Untuk mendapatkan URL lengkap, tambahkan base URL storage:

```
Full URL: http://your-domain.com/storage/{image_path}
```

**Contoh:**
```javascript
const imageUrl = `${process.env.NEXT_PUBLIC_STORAGE_URL}/${hamper.image}`;
// Result: http://your-domain.com/storage/hampers/abc123.webp
```

---

## Error Handling

Semua error response mengikuti format:

```json
{
  "success": false,
  "message": "Error message here"
}
```

**HTTP Status Codes:**
- `200` - Success
- `404` - Not Found
- `500` - Internal Server Error

---

## CORS

Pastikan CORS sudah dikonfigurasi di backend untuk menerima request dari frontend domain Anda.

Edit `config/cors.php`:
```php
'paths' => ['api/*'],
'allowed_origins' => ['http://localhost:3000', 'https://your-frontend-domain.com'],
```

---

## Frontend Integration Example (Next.js)

### Fetch Hampers

```typescript
// lib/api.ts
const API_BASE_URL = process.env.NEXT_PUBLIC_API_URL;
const STORAGE_URL = process.env.NEXT_PUBLIC_STORAGE_URL;

export async function getHampers() {
  const res = await fetch(`${API_BASE_URL}/hampers`);
  if (!res.ok) throw new Error('Failed to fetch hampers');
  const json = await res.json();
  return json.data;
}

export async function getHamperBySlug(slug: string) {
  const res = await fetch(`${API_BASE_URL}/hampers/${slug}`);
  if (!res.ok) throw new Error('Hamper not found');
  const json = await res.json();
  return json.data;
}

export function getImageUrl(path: string | null) {
  if (!path) return '/placeholder.png';
  return `${STORAGE_URL}/${path}`;
}
```

### Usage in Component

```typescript
// app/hampers/page.tsx
import { getHampers, getImageUrl } from '@/lib/api';

export default async function HampersPage() {
  const hampers = await getHampers();

  return (
    <div className="grid grid-cols-3 gap-6">
      {hampers.map((hamper) => (
        <div key={hamper.id} className="card">
          <img 
            src={getImageUrl(hamper.image)} 
            alt={hamper.name}
          />
          <h3>{hamper.name}</h3>
          <p>{hamper.description}</p>
          <p>Rp {hamper.price.toLocaleString('id-ID')}</p>
          {hamper.badge_label && (
            <span className="badge">{hamper.badge_label}</span>
          )}
        </div>
      ))}
    </div>
  );
}
```

---

## Environment Variables (.env.local - Frontend)

```env
NEXT_PUBLIC_API_URL=http://localhost:8000/api
NEXT_PUBLIC_STORAGE_URL=http://localhost:8000/storage
```

---

## Testing API Endpoints

Gunakan tools seperti:
- **Postman** - Import collection dan test semua endpoint
- **Thunder Client** (VS Code extension)
- **curl** dari terminal

**Example curl:**
```bash
# Get all hampers
curl http://localhost:8000/api/hampers

# Get hamper detail
curl http://localhost:8000/api/hampers/hamper-lebaran-premium-2024

# Get about us
curl http://localhost:8000/api/about-us

# Get bread care tips
curl http://localhost:8000/api/bread-care

# Get bread care by category
curl http://localhost:8000/api/bread-care?category=Storage
```

---

**Need help? Check the backend code in `app/Http/Controllers/Api/`**