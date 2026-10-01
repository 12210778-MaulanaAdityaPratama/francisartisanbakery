@extends('layouts.app')

@section('title', 'Menu & Koleksi Roti — Francis Artisan Bakery')

@push('styles')
<style>
    /* MENU HERO */
    .menu-hero {
        background: var(--brown-deep);
        padding: 9rem 2rem 4.5rem;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(200, 134, 10, 0.25);
    }
    .menu-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: repeating-linear-gradient(-45deg, transparent, transparent 20px, rgba(200,134,10,0.035) 20px, rgba(200,134,10,0.035) 21px);
        pointer-events: none;
    }
    .menu-hero-inner {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }
    .menu-breadcrumbs {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.75rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: rgba(245,236,215,0.5);
    }
    .menu-breadcrumbs a {
        color: var(--amber);
        text-decoration: none;
        transition: color 0.2s;
    }
    .menu-breadcrumbs a:hover {
        color: var(--amber-light);
    }
    .menu-hero-eyebrow {
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        color: var(--amber);
    }
    .menu-hero-title {
        font-family: var(--ff-serif);
        font-size: clamp(2.4rem, 4.5vw, 4rem);
        font-weight: 400;
        color: var(--cream);
        line-height: 1.15;
    }
    .menu-hero-title em {
        font-style: italic;
        color: var(--amber-light);
    }
    .menu-hero-desc {
        color: rgba(245,236,215,0.75);
        font-size: 1.05rem;
        max-width: 60ch;
        line-height: 1.8;
    }
    .menu-stats-row {
        display: flex;
        flex-wrap: wrap;
        gap: 2.5rem;
        margin-top: 1rem;
        padding-top: 1.75rem;
        border-top: 1px solid rgba(200,134,10,0.2);
    }
    .menu-stat-item {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
    .menu-stat-val {
        font-family: var(--ff-serif);
        font-size: 1.6rem;
        font-style: italic;
        color: var(--cream);
        line-height: 1.1;
    }
    .menu-stat-label {
        font-size: 0.7rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: rgba(245,236,215,0.55);
    }

    /* CATALOG SECTION */
    .menu-section {
        background: var(--white);
        padding: 3rem 2rem 6rem;
        min-height: 80vh;
    }
    .menu-container {
        max-width: 1240px;
        margin: 0 auto;
    }

    /* FILTER & SEARCH PANEL */
    .filter-panel {
        background: #FDF7ED;
        border: 1px solid var(--cream-dark);
        padding: 1.5rem;
        margin-bottom: 2.5rem;
        border-radius: 4px;
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }
    .search-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }
    .search-icon {
        position: absolute;
        left: 1rem;
        color: var(--brown-light);
        pointer-events: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .search-input {
        width: 100%;
        padding: 0.85rem 3rem 0.85rem 2.85rem;
        background: var(--white);
        border: 1.5px solid var(--cream-dark);
        border-radius: 4px;
        font-family: var(--ff-sans);
        font-size: 0.95rem;
        color: var(--brown-deep);
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .search-input:focus {
        border-color: var(--amber);
        box-shadow: 0 0 0 3px rgba(200, 134, 10, 0.15);
    }
    .search-clear {
        position: absolute;
        right: 1rem;
        background: none;
        border: none;
        color: var(--brown-light);
        font-size: 1.2rem;
        cursor: pointer;
        display: none;
        padding: 4px;
    }
    .search-clear.visible {
        display: block;
    }
    .search-submit {
        border: 1px solid var(--brown-deep);
        background: var(--brown-deep);
        color: var(--cream);
        padding: 0.75rem 1rem;
        font: inherit;
        font-size: 0.8rem;
        font-weight: 700;
        cursor: pointer;
    }

    /* CHIPS */
    .filter-chips-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .filter-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }
    .filter-chip {
        background: var(--white);
        border: 1px solid var(--cream-dark);
        padding: 0.45rem 1.15rem;
        font-family: var(--ff-sans);
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: var(--brown-mid);
        border-radius: 30px;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
    }
    .filter-chip:hover {
        border-color: var(--amber);
        color: var(--amber);
    }
    .filter-chip.active {
        background: var(--brown-deep);
        border-color: var(--brown-deep);
        color: var(--cream);
    }
    .results-count {
        font-size: 0.85rem;
        color: var(--brown-light);
        font-style: italic;
    }

    /* PRODUCT CATALOG GRID */
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 1.75rem;
    }

    .product-card {
        background: var(--white);
        border: 1px solid var(--cream-dark);
        border-radius: 4px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        position: relative;
    }
    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(44, 26, 14, 0.09);
        border-color: var(--amber);
    }

    /* CARD VISUAL HEADER */
    .product-card-visual {
        height: 200px;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .product-visual-bg {
        position: absolute;
        inset: 0;
        transition: transform 0.4s ease;
    }
    .product-card-image {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .product-card:hover .product-visual-bg {
        transform: scale(1.04);
    }
    .bg-sourdough { background: linear-gradient(135deg, #5C2E0A 0%, #2A1505 100%); }
    .bg-croissant { background: linear-gradient(135deg, #7A4F20 0%, #422810 100%); }
    .bg-rye       { background: linear-gradient(135deg, #3D2618 0%, #1F120A 100%); }
    .bg-focaccia  { background: linear-gradient(135deg, #6B4E26 0%, #382810 100%); }
    .bg-cinnamon  { background: linear-gradient(135deg, #8A4818 0%, #4D2508 100%); }
    .bg-baguette  { background: linear-gradient(135deg, #7B4B18 0%, #3B2005 100%); }
    .bg-pain      { background: linear-gradient(135deg, #4A2810 0%, #211105 100%); }
    .bg-coffee    { background: linear-gradient(135deg, #2E1B10 0%, #150B05 100%); }
    .bg-almond    { background: linear-gradient(135deg, #8C5C28 0%, #472D10 100%); }

    .product-badge-status {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: rgba(44, 26, 14, 0.85);
        color: var(--cream);
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        padding: 0.25rem 0.65rem;
        border-radius: 2px;
        backdrop-filter: blur(4px);
    }
    .product-badge-status.tag-available {
        background: rgba(200, 134, 10, 0.95);
        color: var(--brown-deep);
    }

    .product-code-icon {
        position: relative;
        z-index: 2;
        font-family: var(--ff-serif);
        font-size: 3.5rem;
        font-style: italic;
        font-weight: 700;
        color: rgba(245, 236, 215, 0.2);
        user-select: none;
    }

    /* CARD BODY */
    .product-card-body {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 0.6rem;
    }
    .product-card-category {
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--amber);
    }
    .product-card-name {
        font-family: var(--ff-serif);
        font-size: 1.35rem;
        font-weight: 600;
        color: var(--brown-deep);
        line-height: 1.25;
    }
    .product-card-desc {
        font-size: 0.85rem;
        color: var(--brown-light);
        line-height: 1.65;
        flex: 1;
    }

    /* SPECS ROW (FERMENTATION, WEIGHT, CRUST) */
    .product-specs {
        display: flex;
        flex-wrap: wrap;
        gap: 0.4rem;
        margin-top: 0.5rem;
        padding-top: 0.75rem;
        border-top: 1px dashed var(--cream-dark);
    }
    .spec-tag {
        font-size: 0.7rem;
        background: #F8EFE1;
        color: var(--brown-mid);
        padding: 0.2rem 0.55rem;
        border-radius: 2px;
        border: 1px solid rgba(200, 134, 10, 0.2);
    }

    /* CARD FOOTER */
    .product-card-footer {
        padding: 1rem 1.5rem;
        background: #FDFAF5;
        border-top: 1px solid var(--cream-dark);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }
    .product-price {
        font-family: var(--ff-serif);
        font-size: 1.25rem;
        font-style: italic;
        color: var(--brown-deep);
        font-weight: 600;
    }
    .product-actions {
        display: flex;
        gap: 0.5rem;
    }
    .btn-detail {
        background: none;
        border: 1px solid var(--brown-mid);
        padding: 0.45rem 0.85rem;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--brown-mid);
        border-radius: 2px;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-detail:hover {
        background: var(--brown-deep);
        color: var(--cream);
        border-color: var(--brown-deep);
    }
    .btn-order-wa {
        background: var(--brown-deep);
        border: 1px solid var(--brown-deep);
        padding: 0.45rem 0.95rem;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--cream);
        text-decoration: none;
        border-radius: 2px;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
    }
    .btn-order-wa:hover {
        background: var(--amber);
        border-color: var(--amber);
        color: var(--brown-deep);
    }

    /* EMPTY STATE */
    .empty-state {
        display: none;
        text-align: center;
        padding: 4rem 2rem;
        background: #FDF7ED;
        border: 1px dashed var(--cream-dark);
        border-radius: 4px;
        grid-column: 1 / -1;
    }
    .empty-state.visible {
        display: block;
    }
    .catalog-pagination { display: flex; justify-content: center; margin-top: 2rem; }
    .catalog-pagination nav { display: flex; justify-content: center; width: 100%; }
    .catalog-pagination nav > div { display: flex; align-items: center; gap: 0.35rem; }
    .catalog-pagination a, .catalog-pagination span[aria-current], .catalog-pagination span[aria-disabled] {
        display: inline-flex; align-items: center; justify-content: center; min-width: 2.5rem; min-height: 2.5rem;
        padding: 0.4rem 0.75rem; border: 1px solid var(--cream-dark); color: var(--brown-mid);
        background: var(--white); text-decoration: none; font-size: 0.85rem;
    }
    .catalog-pagination a:hover, .catalog-pagination [aria-current="page"] span {
        border-color: var(--brown-deep); background: var(--brown-deep); color: var(--cream);
    }
    .empty-state-title {
        font-family: var(--ff-serif);
        font-size: 1.5rem;
        color: var(--brown-deep);
        margin-bottom: 0.5rem;
    }
    .empty-state-desc {
        font-size: 0.9rem;
        color: var(--brown-light);
        margin-bottom: 1.5rem;
    }

    /* BOTTOM: BREAD CARE GUIDE SECTION */
    .bread-care-section {
        background: var(--cream);
        padding: 5rem 2rem;
        border-top: 1px solid var(--cream-dark);
    }
    .bread-care-inner {
        max-width: 1200px;
        margin: 0 auto;
    }
    .care-header {
        text-align: center;
        max-width: 650px;
        margin: 0 auto 3.5rem;
    }
    .care-cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }
    .care-card {
        background: var(--white);
        padding: 2.5rem 2rem;
        border: 1px solid var(--cream-dark);
        border-radius: 4px;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        transition: transform 0.2s;
    }
    .care-card:hover {
        transform: translateY(-4px);
    }
    .care-card-icon {
        width: 48px;
        height: 48px;
        background: #F8EFE1;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--amber);
        margin-bottom: 0.5rem;
    }
    .care-card-title {
        font-family: var(--ff-serif);
        font-size: 1.35rem;
        font-weight: 600;
        color: var(--brown-deep);
    }
    .care-card-text {
        font-size: 0.9rem;
        color: var(--brown-light);
        line-height: 1.7;
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .menu-hero {
            padding: 7rem 1.5rem 3.5rem;
        }
        .menu-section {
            padding: 2.5rem 1.25rem 4rem;
        }
        .care-cards {
            grid-template-columns: 1fr;
        }
        .filter-chips {
            overflow-x: auto;
            flex-wrap: nowrap;
            width: 100%;
            padding-bottom: 0.5rem;
        }
        .filter-chip {
            white-space: nowrap;
        }
    }

    @media (max-width: 600px) {
        .menu-grid {
            grid-template-columns: 1fr;
        }
        .product-card-footer {
            flex-direction: column;
            align-items: stretch;
            gap: 0.75rem;
        }
        .product-actions {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
        }
    }
</style>
@endpush

@section('content')
    <!-- HERO SECTION -->
    <header class="menu-hero" aria-label="Header Menu Roti">
        <div class="menu-hero-inner">
            <nav class="menu-breadcrumbs" aria-label="Breadcrumb">
                <a href="{{ url('/') }}">Beranda</a>
                <span>&rsaquo;</span>
                <span>Menu &amp; Koleksi</span>
            </nav>
            <span class="menu-hero-eyebrow">Artisan Bakehouse Catalog</span>
            <h1 class="menu-hero-title">
                Roti Buatan Tangan,<br>
                <em>Panggang Segar Setiap Pagi.</em>
            </h1>
            <p class="menu-hero-desc">
                Semua roti kami dibuat menggunakan metode fermentasi alami (*sourdough starter*) berumur lebih dari dua tahun. Tanpa bahan pengawet, tanpa pelembut kimiawi, hanya tepung berkualitas, air, garam, dan waktu.
            </p>
            <div class="menu-stats-row">
                <div class="menu-stat-item">
                    <span class="menu-stat-val">18+ Jam</span>
                    <span class="menu-stat-label">Fermentasi Dingin Alami</span>
                </div>
                <div class="menu-stat-item">
                    <span class="menu-stat-val">240&deg;C</span>
                    <span class="menu-stat-label">Dipanggang di Oven Batu</span>
                </div>
                <div class="menu-stat-item">
                    <span class="menu-stat-val">0% Kimia</span>
                    <span class="menu-stat-label">Bebas Pengawet &amp; Improver</span>
                </div>
            </div>
        </div>
    </header>

    <!-- CATALOG FILTER & GRID SECTION -->
    <section class="menu-section" id="katalog-menu" aria-label="Katalog Menu Roti">
        <div class="menu-container">

            <!-- FILTER & SEARCH PANEL -->
            <div class="filter-panel">
                <form class="search-wrapper" action="{{ route('menu') }}" method="GET">
                    <span class="search-icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </span>
                    <input type="search" name="search" id="menu-search-input" class="search-input" value="{{ $search }}" placeholder="Cari nama roti atau bahan..." aria-label="Cari menu roti">
                    @if ($category !== '')
                        <input type="hidden" name="category" value="{{ $category }}">
                    @endif
                    @if ($search !== '')
                        <a href="{{ route('menu', ['category' => $category ?: null]) }}" class="search-clear visible" aria-label="Hapus pencarian">&times;</a>
                    @endif
                    <button type="submit" class="search-submit">Cari</button>
                </form>

                <div class="filter-chips-row">
                    <div class="filter-chips" role="radiogroup" aria-label="Filter kategori roti">
                        <a class="filter-chip {{ $category === '' ? 'active' : '' }}" href="{{ route('menu', ['search' => $search ?: null]) }}" @if ($category === '') aria-current="page" @endif>Semua Menu</a>
                        @foreach ($categories as $menuCategory)
                            <a class="filter-chip {{ $category === $menuCategory->category ? 'active' : '' }}" href="{{ route('menu', ['category' => $menuCategory->category, 'search' => $search ?: null]) }}" @if ($category === $menuCategory->category) aria-current="page" @endif>{{ $menuCategory->category_label }}</a>
                        @endforeach
                    </div>
                    <span class="results-count">Menampilkan {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} produk</span>
                </div>
            </div>

            <!-- PRODUCT GRID -->
            <div class="menu-grid" id="product-grid">
                @forelse ($products as $product)
                    @php
                        $visualClass = match ($product->category) {
                            'Pastry' => 'bg-croissant',
                            'Savory' => 'bg-focaccia',
                            'Sweet' => 'bg-cinnamon',
                            'Coffee' => 'bg-coffee',
                            default => 'bg-sourdough',
                        };
                        $productCode = strtoupper(collect(preg_split('/\s+/', $product->name))->filter()->take(2)->map(fn (string $word): string => mb_substr($word, 0, 1))->implode(''));
                    @endphp
                                    <article class="product-card">
                                        <div class="product-card-visual">
                                            @if (filled($product->image))
                                                <img class="product-card-image" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" loading="lazy">
                                            @else
                                                <div class="product-visual-bg {{ $visualClass }}"></div>
                                                <span class="product-code-icon">{{ $productCode }}</span>
                                            @endif
                                            @if (filled($product->badge_label))
                                                <span class="product-badge-status {{ $product->is_available ? 'tag-available' : '' }}">{{ $product->badge_label }}</span>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <span class="product-card-category">{{ $product->category_label }}</span>
                                            <h2 class="product-card-name">{{ $product->name }}</h2>
                                            <p class="product-card-desc">{{ $product->description }}</p>
                                            @if (filled($product->specifications))
                                                <div class="product-specs">
                                                    @foreach ($product->specifications as $specification)
                                                        <span class="spec-tag">{{ $specification }}</span>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                        <div class="product-card-footer">
                                            <span class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                            <div class="product-actions">
                                                <button type="button" class="btn-detail" data-product="{{ $product->slug }}">Detail</button>
                                                <a href="https://wa.me/{{ preg_replace('/\D+/', '', $product->whatsapp_number) }}?text={{ rawurlencode('Halo Francis Bakery, saya mau pesan ' . $product->name) }}" target="_blank" rel="noopener" class="btn-order-wa">Pesan WA</a>
                                            </div>
                                        </div>
                                    </article>
                                @empty
                                    <div class="empty-state visible">
                                        <h3 class="empty-state-title">Menu Tidak Ditemukan</h3>
                                        <p class="empty-state-desc">Tidak ada produk yang cocok dengan pencarian atau kategori ini.</p>
                                        <a href="{{ route('menu') }}" class="btn-detail">Tampilkan semua menu</a>
                                    </div>
                                @endforelse
                            </div>
                            <div class="catalog-pagination">{{ $products->links() }}</div>
                        </div>
                    </section>

                    <!-- BREAD CARE GUIDE SECTION -->
                    <section class="bread-care-section" aria-label="Panduan Perawatan Roti di Rumah">
                        <div class="bread-care-inner">
                            <div class="care-header">
                                <span class="section-label">Tips Dari Baker Kami</span>
                                <h2 class="section-title">Cara Menikmati Roti <em>Di Rumah</em></h2>
                            </div>
                            <div class="care-cards">
                                <div class="care-card">
                                    <div class="care-card-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                                    </div>
                                    <h3 class="care-card-title">1. Simpan di Suhu Ruang</h3>
                                    <p class="care-card-text">Jangan simpan sourdough di dalam kulkas chiller karena akan cepat kering. Bungkus dalam kain katun atau kantong kertas pada suhu ruang untuk daya tahan hingga 3 hari.</p>
                                </div>
                                <div class="care-card">
                                    <div class="care-card-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                    </div>
                                    <h3 class="care-card-title">2. Bekukan untuk Tahan Lama</h3>
                                    <p class="care-card-text">Jika ingin dinikmati minggu depan, iris roti terlebih dahulu, masukkan ke dalam wadah kedap udara, lalu simpan di freezer. Roti tahan hingga 1 bulan tanpa merusak rasa.</p>
                                </div>
                                <div class="care-card">
                                    <div class="care-card-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                                    </div>
                                    <h3 class="care-card-title">3. Panaskan Kembali (*Reheat*)</h3>
                                    <p class="care-card-text">Semprotkan sedikit air pada permukaan kulit roti, lalu panaskan di oven 180&deg;C selama 4-6 menit atau panggang di atas wajan anti lengket. Kerak akan kembali renyah sempurna.</p>
                                </div>
                            </div>
                        </div>
                    </section>

    <!-- PRODUCT DETAIL MODAL -->
    <div class="modal-overlay" id="modal-overlay" role="dialog" aria-modal="true" aria-labelledby="modal-product-name">
        <div class="modal" id="modal-box">
            <button class="modal-close" id="modal-close" aria-label="Tutup detail produk">&times;</button>
            <p class="modal-category" id="modal-product-category"></p>
            <h2 class="modal-name" id="modal-product-name"></h2>
            <p class="modal-desc" id="modal-product-desc"></p>
            <div class="modal-details" id="modal-product-details"></div>
            <p class="modal-price" id="modal-product-price"></p>
            <a href="#" class="modal-cta" id="modal-order-cta" target="_blank" rel="noopener">Pesan Lewat WhatsApp</a>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // PRODUCT DATABASE FOR MODAL & DETAILS
    var menuDetails = {
        'sourdough': {
            category: 'Artisan Sourdough',
            name: 'Sourdough Classic Loaf',
            desc: 'Loaf signature Francis Artisan Bakery. Difermentasi perlahan selama 18 jam dengan starter levain berumur dua tahun, lalu dipanggang di atas batu vulkanik 240°C dengan semburan uap air. Menghasilkan kerak cokelat berkilau yang renyah dan bagian dalam berongga terbuka yang elastis dengan aroma ragi asam buah yang kaya.',
            price: 'Rp 75.000 / loaf',
            details: [
                { label: 'Bahan Pokok', value: 'Tepung terigu gandum, air murni, ragi alami (levain), garam laut' },
                { label: 'Fermentasi', value: '18 jam bulk & cold retard' },
                { label: 'Berat Bersih', value: '850 – 900 gram' },
                { label: 'Ketahanan', value: '3 hari suhu ruang, 1 bulan freezer' }
            ]
        },
        'croissant': {
            category: 'Viennoiserie',
            name: 'Croissant Butter Prancis',
            desc: 'Karya seni laminasi pastry. Kami melipat adonan lembut dengan French AOP Butter 84% lemak hingga membentuk 27 lapisan mikro. Saat digigit, tekstur luarnya renyah berderak melepaskan aroma wangi mentega gurih tanpa meninggalkan rasa berminyak.',
            price: 'Rp 35.000 / buah',
            details: [
                { label: 'Bahan Pokok', value: 'Tepung terigu Prancis, French AOP butter, susu segar, ragi, gula, garam' },
                { label: 'Lapisan', value: '27 laminated micro-layers' },
                { label: 'Berat Bersih', value: '100 – 110 gram' },
                { label: 'Waktu Terbaik', value: 'Pagi hari / dipanaskan 2 menit' }
            ]
        },
        'rye': {
            category: 'Whole Grain Sourdough',
            name: 'Dark Rye Loaf 70%',
            desc: 'Dibuat untuk para pecinta karakter roti gandum otentik Eropa. Gandum hitam dipasok langsung dari penggilingan tradisional. Teksturnya padat, kenyal, kaya serat, dan memiliki sentuhan rasa malt serta aroma asam kuat alami.',
            price: 'Rp 85.000 / loaf',
            details: [
                { label: 'Bahan Pokok', value: '70% Tepung gandum hitam (rye), tepung gandum, air, starter gandum, garam' },
                { label: 'Fermentasi', value: '24 jam cold fermentation' },
                { label: 'Berat Bersih', value: '750 – 800 gram' },
                { label: 'Manfaat', value: 'Indeks glikemik rendah, tinggi serat pangan' }
            ]
        },
        'focaccia': {
            category: 'Savory Flatbread',
            name: 'Focaccia Rosemary & Olive Oil',
            desc: 'Roti pipih khas Genova, Italia. Direndam semalaman dalam minyak zaitun extra virgin dingin kualitas tertinggi, kemudian dipanggang bersama ranting rosemary segar dan taburan butiran garam laut fleur de sel yang gurih.',
            price: 'Rp 40.000 / potong (15x15 cm)',
            details: [
                { label: 'Bahan Pokok', value: 'Tepung protein tinggi, extra virgin olive oil, daun rosemary, fleur de sel, ragi' },
                { label: 'Karakteristik', value: 'Lembut, bersarang, sangat wangi herbal zaitun' },
                { label: 'Penyajian', value: 'Sangat cocok dicocol balsamic vinegar & olive oil' },
                { label: 'Ketahanan', value: '2 hari suhu ruang' }
            ]
        },
        'cinnamon': {
            category: 'Pastry Manis',
            name: 'Cinnamon Roll Sumatra',
            desc: 'Adonan brioche lembut yang digulung bersama mentega, gula aren asli, dan bubuk kayu manis Cassia khas pegunungan Sumatra Barat. Ditutup dengan sapuan glasur susu murni yang memberikan keseimbangan manis yang pas tanpa membuat enek.',
            price: 'Rp 42.000 / buah',
            details: [
                { label: 'Bahan Pokok', value: 'Tepung brioche, butter Prancis, telur ayam kampung, kayu manis Sumatra, aren murni' },
                { label: 'Aroma', value: 'Kayu manis hangat dengan karamel gula aren' },
                { label: 'Berat Bersih', value: '140 – 150 gram' },
                { label: 'Penyajian', value: 'Hangatkan 15 detik di microwave sebelum dinikmati' }
            ]
        },
        'pain-au-chocolat': {
            category: 'Viennoiserie',
            name: 'Pain au Chocolat 58%',
            desc: 'Pastry klasik Prancis dengan dua batang cokelat dark couverture Belgia berkadar kakao 58% di tengah lapisan croissant mentega. Meleleh lembut di mulut saat dinikmati dalam keadaan hangat bersama secangkir kopi hitam.',
            price: 'Rp 38.000 / buah',
            details: [
                { label: 'Bahan Pokok', value: 'Tepung terigu, French butter, cokelat dark couverture 58%, susu, ragi, gula' },
                { label: 'Cokelat', value: 'Dual batons dark couverture 58%' },
                { label: 'Berat Bersih', value: '110 – 120 gram' },
                { label: 'Waktu Terbaik', value: 'Hangat di pagi hari' }
            ]
        },
        'almond-croissant': {
            category: 'Pastry Manis',
            name: 'Almond Frangipane Croissant',
            desc: 'Dibuat dengan memanggang ulang (*double baked*) croissant butter yang diisi dan dilapisi krim almond kaya rasa (frangipane). Di atasnya ditaburi kacang almond iris panggang yang melimpah dan taburan gula icing tipis.',
            price: 'Rp 48.000 / buah',
            details: [
                { label: 'Bahan Pokok', value: 'Croissant butter, pasta almond, mentega, telur, irisan almond panggang, gula bubuk' },
                { label: 'Tekstur', value: 'Renyah di luar, lembut manis gurih di dalam' },
                { label: 'Berat Bersih', value: '150 gram' },
                { label: 'Alergen', value: 'Mengandung kacang pohon (almond), susu, telur' }
            ]
        },
        'baguette': {
            category: 'Artisan Bread',
            name: 'Baguette Traditionnelle',
            desc: 'Roti tongkat simbol Prancis. Diproduksi sesuai kaidah tradisi: hanya tepung, air, ragi alami, dan garam tanpa bahan tambahan apapun. Kulit luarnya garing renyah berkerut dengan remah dalam yang kenyal dan sarang lebah besar.',
            price: 'Rp 38.000 / batang',
            details: [
                { label: 'Bahan Pokok', value: 'Tepung terigu T65 Prancis, air murni, starter alami, garam laut' },
                { label: 'Ukuran', value: 'Panjang 55 cm' },
                { label: 'Berat Bersih', value: '350 gram' },
                { label: 'Cocok Untuk', value: 'Baguette sandwich, garlic bread, bruschetta' }
            ]
        },
        'cold-brew': {
            category: 'Minuman Pendamping',
            name: 'Signature Cold Brew Black',
            desc: 'Biji kopi Arabika Aceh Gayo pilihan yang disangrai dengan profil medium-dark, lalu diseduh menggunakan air dingin bersuhu 4°C selama 16 jam. Menghasilkan seduhan kopi rendah asam dengan rasa manis alami cokelat hitam dan karamel.',
            price: 'Rp 38.000 / botol 250ml',
            details: [
                { label: 'Bahan Pokok', value: '100% Single Origin Arabika Aceh Gayo, air mineral terfilter' },
                { label: 'Metode', value: 'Cold immersion steeping 16 jam' },
                { label: 'Volume', value: '250 ml (botol kaca higienis)' },
                { label: 'Karakter', value: 'Rendah asam, lembut di lambung, tanpa gula' }
            ]
        }
    };

    menuDetails = @js($menuDetails);

    // MODAL CONTROL
    var modalOverlay = document.getElementById('modal-overlay');
    var modalClose = document.getElementById('modal-close');

    function openProductModal(key) {
        var p = menuDetails[key];
        if (!p) return;
        document.getElementById('modal-product-category').textContent = p.category;
        document.getElementById('modal-product-name').textContent = p.name;
        document.getElementById('modal-product-desc').textContent = p.desc;
        document.getElementById('modal-product-price').textContent = p.price;

        var detailsEl = document.getElementById('modal-product-details');
        detailsEl.innerHTML = (p.details || []).map(function(d) {
            return '<div class="modal-detail-item"><p class="modal-detail-label">' + d.label + '</p><p class="modal-detail-value">' + d.value + '</p></div>';
        }).join('');

        var ctaEl = document.getElementById('modal-order-cta');
        ctaEl.href = 'https://wa.me/' + p.whatsapp_number + '?text=' + encodeURIComponent('Halo Francis Artisan Bakery, saya mau pesan ' + p.name);

        modalOverlay.classList.add('open');
        modalClose.focus();
        document.body.style.overflow = 'hidden';
    }

    function closeProductModal() {
        modalOverlay.classList.remove('open');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('[data-product]').forEach(function(button) {
        button.addEventListener('click', function() {
            openProductModal(button.dataset.product);
        });
    });

    modalClose.addEventListener('click', closeProductModal);
    modalOverlay.addEventListener('click', function(e) {
        if (e.target === modalOverlay) closeProductModal();
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modalOverlay.classList.contains('open')) closeProductModal();
    });

</script>
@endpush
