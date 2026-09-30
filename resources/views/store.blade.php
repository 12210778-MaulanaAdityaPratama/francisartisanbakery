@extends('layouts.app')

@section('title', 'Lokasi & Store Kami — Francis Artisan Bakery')

@push('styles')
<!-- Leaflet CSS for Interactive Map -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

<style>
    /* STORE HERO */
    .store-hero {
        background: var(--brown-deep);
        padding: 9rem 2rem 4.5rem;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(200, 134, 10, 0.25);
    }
    .store-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: repeating-linear-gradient(-45deg, transparent, transparent 20px, rgba(200,134,10,0.035) 20px, rgba(200,134,10,0.035) 21px);
        pointer-events: none;
    }
    .store-hero-inner {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }
    .store-breadcrumbs {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.75rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: rgba(245,236,215,0.5);
    }
    .store-breadcrumbs a {
        color: var(--amber);
        text-decoration: none;
        transition: color 0.2s;
    }
    .store-breadcrumbs a:hover {
        color: var(--amber-light);
    }
    .store-hero-eyebrow {
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        color: var(--amber);
    }
    .store-hero-title {
        font-family: var(--ff-serif);
        font-size: clamp(2.4rem, 4.5vw, 4rem);
        font-weight: 400;
        color: var(--cream);
        line-height: 1.15;
    }
    .store-hero-title em {
        font-style: italic;
        color: var(--amber-light);
    }
    .store-hero-desc {
        color: rgba(245,236,215,0.75);
        font-size: 1.05rem;
        max-width: 60ch;
        line-height: 1.8;
    }
    .store-stats-row {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        margin-top: 1rem;
        padding-top: 1.75rem;
        border-top: 1px solid rgba(200,134,10,0.2);
    }
    .store-stat-item {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
    .store-stat-val {
        font-family: var(--ff-serif);
        font-size: 1.6rem;
        font-style: italic;
        color: var(--cream);
        line-height: 1.1;
    }
    .store-stat-label {
        font-size: 0.7rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: rgba(245,236,215,0.55);
    }

    /* MAIN LOCATOR LAYOUT */
    .locator-section {
        background: var(--white);
        padding: 3rem 2rem 6rem;
        min-height: 80vh;
    }
    .locator-container {
        max-width: 1320px;
        margin: 0 auto;
    }

    /* FILTER BAR */
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
        padding: 0.45rem 1.1rem;
        font-family: var(--ff-sans);
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: var(--brown-mid);
        border-radius: 30px;
        cursor: pointer;
        transition: all 0.2s ease;
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

    /* SPLIT GRID: CARDS (LEFT) + MAP (RIGHT) */
    .locator-grid {
        display: grid;
        grid-template-columns: 1.15fr 1fr;
        gap: 2rem;
        align-items: start;
    }

    /* STORE LIST (LEFT) */
    .stores-list {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .store-card {
        background: var(--white);
        border: 1px solid var(--cream-dark);
        padding: 1.75rem;
        border-radius: 4px;
        position: relative;
        cursor: pointer;
        transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
    }
    .store-card:hover {
        transform: translateY(-2px);
        border-color: var(--amber);
        box-shadow: 0 8px 24px rgba(44, 26, 14, 0.07);
    }
    .store-card.selected {
        border-color: var(--amber);
        border-left: 5px solid var(--amber);
        background: #FFFAF0;
        box-shadow: 0 8px 26px rgba(200, 134, 10, 0.12);
    }

    .store-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 0.5rem;
    }
    .store-area-tag {
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--amber);
        display: block;
        margin-bottom: 4px;
    }
    .store-title {
        font-family: var(--ff-serif);
        font-size: 1.45rem;
        font-weight: 600;
        color: var(--brown-deep);
        line-height: 1.25;
    }
    .store-type-badge {
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        padding: 0.25rem 0.6rem;
        background: var(--cream);
        color: var(--brown-deep);
        border-radius: 2px;
        white-space: nowrap;
    }
    .store-type-badge.flagship {
        background: var(--brown-deep);
        color: var(--cream);
    }

    .store-address {
        font-size: 0.9rem;
        color: var(--brown-mid);
        line-height: 1.6;
        margin-bottom: 1rem;
        display: flex;
        gap: 0.5rem;
        align-items: flex-start;
    }
    .store-address svg {
        flex-shrink: 0;
        margin-top: 3px;
        color: var(--amber);
    }

    .store-info-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1.25rem;
        padding: 0.75rem 1rem;
        background: rgba(245, 236, 215, 0.4);
        border-radius: 4px;
    }
    .store-info-col {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
    .store-info-label {
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--brown-light);
    }
    .store-info-val {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--brown-deep);
    }

    /* FACILITIES PILLS */
    .store-facilities {
        display: flex;
        flex-wrap: wrap;
        gap: 0.4rem;
        margin-bottom: 1.5rem;
    }
    .facility-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        font-size: 0.72rem;
        color: var(--brown-light);
        background: var(--white);
        border: 1px solid var(--cream-dark);
        padding: 0.25rem 0.6rem;
        border-radius: 2px;
    }

    /* ACTION BUTTONS */
    .store-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        align-items: center;
    }
    .btn-maps {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.65rem 1.2rem;
        background: var(--brown-deep);
        color: var(--cream);
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        text-decoration: none;
        border-radius: 3px;
        transition: background 0.2s, transform 0.15s;
    }
    .btn-maps:hover {
        background: var(--amber);
        color: var(--brown-deep);
        transform: translateY(-1px);
    }
    .btn-wa {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.65rem 1.2rem;
        background: #25D366;
        color: #FFFFFF;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        text-decoration: none;
        border-radius: 3px;
        transition: opacity 0.2s, transform 0.15s;
    }
    .btn-wa:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }
    .btn-focus-map {
        background: none;
        border: 1px solid var(--cream-dark);
        padding: 0.65rem 1rem;
        color: var(--brown-mid);
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        border-radius: 3px;
        cursor: pointer;
        margin-left: auto;
        transition: all 0.2s;
    }
    .btn-focus-map:hover {
        border-color: var(--brown-deep);
        color: var(--brown-deep);
    }

    /* RIGHT COLUMN: STICKY MAP */
    .map-sticky-wrapper {
        position: sticky;
        top: 6rem;
        border-radius: 6px;
        overflow: hidden;
        border: 1px solid var(--cream-dark);
        box-shadow: 0 10px 30px rgba(44, 26, 14, 0.08);
        background: var(--white);
    }
    .map-header {
        background: var(--brown-deep);
        padding: 1rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: var(--cream);
    }
    .map-header-title {
        font-family: var(--ff-serif);
        font-size: 1.1rem;
        font-style: italic;
    }
    .map-reset-btn {
        background: rgba(200, 134, 10, 0.2);
        color: var(--amber-light);
        border: 1px solid rgba(200, 134, 10, 0.4);
        padding: 0.35rem 0.75rem;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        border-radius: 2px;
        cursor: pointer;
        transition: background 0.2s;
    }
    .map-reset-btn:hover {
        background: var(--amber);
        color: var(--brown-deep);
    }
    #store-map {
        height: 600px;
        width: 100%;
        background: #EFE8DA;
    }
    #store-map .leaflet-tile {
        filter: sepia(12%) saturate(92%) contrast(98%);
    }

    /* LEAFLET POPUP STYLES */
    .leaflet-popup-content-wrapper {
        background: var(--white);
        color: var(--brown-deep);
        border-radius: 4px;
        padding: 0.5rem;
        border: 1px solid var(--cream-dark);
        box-shadow: 0 8px 24px rgba(44, 26, 14, 0.15);
    }
    .popup-store-name {
        font-family: var(--ff-serif);
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--brown-deep);
        margin-bottom: 4px;
    }
    .popup-store-sub {
        font-size: 0.75rem;
        color: var(--amber);
        font-weight: 700;
        margin-bottom: 8px;
        text-transform: uppercase;
    }
    .popup-store-desc {
        font-size: 0.8rem;
        color: var(--brown-mid);
        margin-bottom: 10px;
        line-height: 1.4;
    }
    .popup-store-link {
        display: inline-block;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        color: var(--brown-deep);
        border-bottom: 1.5px solid var(--amber);
        text-decoration: none;
    }

    /* EMPTY STATE */
    .empty-state {
        display: none;
        text-align: center;
        padding: 4rem 2rem;
        background: #FDF7ED;
        border: 1px dashed var(--cream-dark);
        border-radius: 4px;
    }
    .empty-state.visible {
        display: block;
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

    /* MOBILE TOGGLE BAR */
    .mobile-locator-toggle {
        display: none;
        margin-bottom: 1.5rem;
        gap: 0.5rem;
        background: var(--cream-dark);
        padding: 4px;
        border-radius: 4px;
    }
    .mobile-tab-btn {
        flex: 1;
        padding: 0.65rem;
        background: none;
        border: none;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--brown-mid);
        border-radius: 3px;
        cursor: pointer;
    }
    .mobile-tab-btn.active {
        background: var(--brown-deep);
        color: var(--cream);
    }

    /* BOTTOM INFO SECTION: PRE-ORDER & VISITOR TIPS */
    .store-guide-section {
        background: var(--cream);
        padding: 5rem 2rem;
        border-top: 1px solid var(--cream-dark);
    }
    .store-guide-inner {
        max-width: 1200px;
        margin: 0 auto;
    }
    .guide-header {
        text-align: center;
        max-width: 650px;
        margin: 0 auto 3.5rem;
    }
    .guide-cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }
    .guide-card {
        background: var(--white);
        padding: 2.5rem 2rem;
        border: 1px solid var(--cream-dark);
        border-radius: 4px;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        transition: transform 0.2s;
    }
    .guide-card:hover {
        transform: translateY(-4px);
    }
    .guide-card-icon {
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
    .guide-card-title {
        font-family: var(--ff-serif);
        font-size: 1.35rem;
        font-weight: 600;
        color: var(--brown-deep);
    }
    .guide-card-text {
        font-size: 0.9rem;
        color: var(--brown-light);
        line-height: 1.7;
    }

    /* RESPONSIVE */
    @media (max-width: 1024px) {
        .locator-grid {
            grid-template-columns: 1fr;
        }
        .map-sticky-wrapper {
            position: relative;
            top: 0;
            margin-bottom: 2rem;
        }
        #store-map {
            height: 400px;
        }
        .mobile-locator-toggle {
            display: flex;
        }
        .view-map-mode .stores-list {
            display: none;
        }
        .view-list-mode .map-sticky-wrapper {
            display: none;
        }
        .guide-cards {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 600px) {
        .store-hero {
            padding: 7rem 1.25rem 3.5rem;
        }
        .locator-section {
            padding: 2rem 1.25rem 4rem;
        }
        .filter-panel {
            padding: 1rem;
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
        .store-info-row {
            grid-template-columns: 1fr;
        }
        .store-actions {
            flex-direction: column;
            align-items: stretch;
        }
        .btn-focus-map {
            margin-left: 0;
            text-align: center;
        }
    }
</style>
@endpush

@section('content')
    <!-- HERO SECTION -->
    <header class="store-hero" aria-label="Header Lokasi Store">
        <div class="store-hero-inner">
            <nav class="store-breadcrumbs" aria-label="Breadcrumb">
                <a href="{{ url('/') }}">Beranda</a>
                <span>&rsaquo;</span>
                <span>Store &amp; Gerai</span>
            </nav>
            <span class="store-hero-eyebrow">Our Boutiques &amp; Bakehouses</span>
            <h1 class="store-hero-title">
                Temukan Roti Segar Kami<br>
                <em>Di Dekat Anda.</em>
            </h1>
            <p class="store-hero-desc">
                Dari aroma roti hangat yang baru keluar dari oven batu di Sunter hingga sudut kafe estetik di Senopati. Kunjungi gerai Francis Artisan Bakery terdekat untuk menikmati roti berfermentasi alami setiap hari.
            </p>
            <div class="store-stats-row">
                <div class="store-stat-item">
                    <span class="store-stat-val">6 Gerai</span>
                    <span class="store-stat-label">Jabodetabek</span>
                </div>
                <div class="store-stat-item">
                    <span class="store-stat-val">05.30 WIB</span>
                    <span class="store-stat-label">Batch Pertama Keluar Oven</span>
                </div>
                <div class="store-stat-item">
                    <span class="store-stat-val">100% Alami</span>
                    <span class="store-stat-label">Tanpa Bahan Pengawet</span>
                </div>
            </div>
        </div>
    </header>

    <!-- STORE LOCATOR SECTION -->
    <section class="locator-section" id="locator-root" aria-label="Pencarian dan Daftar Lokasi Store">
        <div class="locator-container">

            <!-- FILTER & SEARCH PANEL -->
            <div class="filter-panel">
                <div class="search-wrapper">
                    <span class="search-icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </span>
                    <input type="text" id="store-search-input" class="search-input" placeholder="Cari nama toko, jalan, atau area (misal: Sunter, Senopati, Grand Indonesia)..." aria-label="Cari toko">
                    <button type="button" id="search-clear-btn" class="search-clear" aria-label="Hapus pencarian">&times;</button>
                </div>

                <div class="filter-chips-row">
                    <div class="filter-chips" role="radiogroup" aria-label="Filter berdasarkan area">
                        <button class="filter-chip active" data-area="all">Semua Area</button>
                        <button class="filter-chip" data-area="Jakarta Utara">Jakarta Utara (2)</button>
                        <button class="filter-chip" data-area="Jakarta Selatan">Jakarta Selatan (1)</button>
                        <button class="filter-chip" data-area="Jakarta Pusat">Jakarta Pusat (1)</button>
                        <button class="filter-chip" data-area="Jakarta Barat">Jakarta Barat (1)</button>
                        <button class="filter-chip" data-area="Tangerang">Tangerang &amp; BSD (1)</button>
                    </div>
                    <span class="results-count" id="results-count-text">Menampilkan 6 lokasi gerai</span>
                </div>
            </div>

            <!-- MOBILE TOGGLE LIST / MAP -->
            <div class="mobile-locator-toggle" id="mobile-toggle">
                <button type="button" class="mobile-tab-btn active" id="btn-toggle-list">Daftar Toko (<span id="mobile-list-count">6</span>)</button>
                <button type="button" class="mobile-tab-btn" id="btn-toggle-map">Peta Interaktif</button>
            </div>

            <!-- GRID LOCATOR -->
            <div class="locator-grid" id="locator-grid">
                
                <!-- LEFT COLUMN: STORE CARDS -->
                <div class="stores-list" id="stores-list-container">
                    
                    <!-- 1. SUNTER (FLAGSHIP) -->
                    <article class="store-card selected" id="card-sunter" data-id="sunter" data-area="Jakarta Utara" data-keywords="sunter tanjung priok jakarta utara nusantara flagship central kitchen head office">
                        <div class="store-card-header">
                            <div>
                                <span class="store-area-tag">Jakarta Utara</span>
                                <h2 class="store-title">Francis Sunter — Central Bakehouse</h2>
                            </div>
                            <span class="store-type-badge flagship">Flagship Store</span>
                        </div>
                        <p class="store-address">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Jl. Nusantara Timur 10 Blok D No. 47, RT.3/RW.17, Sunter Agung, Kec. Tj. Priok, Jakarta Utara 14350</span>
                        </p>
                        <div class="store-info-row">
                            <div class="store-info-col">
                                <span class="store-info-label">Jam Operasional</span>
                                <span class="store-info-val">06.00 – 20.00 WIB (Setiap Hari)</span>
                            </div>
                            <div class="store-info-col">
                                <span class="store-info-label">Telepon / WhatsApp</span>
                                <span class="store-info-val">+62 812-3456-7890</span>
                            </div>
                        </div>
                        <div class="store-facilities">
                            <span class="facility-pill">🥖 Central Kitchen</span>
                            <span class="facility-pill">🔥 Fresh Every Hour</span>
                            <span class="facility-pill">☕ Espresso Bar</span>
                            <span class="facility-pill">🚗 Parkir Luas</span>
                            <span class="facility-pill">🛵 GoSend / Grab</span>
                            <span class="facility-pill">📶 Free Wi-Fi</span>
                        </div>
                        <div class="store-actions">
                            <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Nusantara+Timur+10+Blok+d+No.47+Sunter+Agung+Jakarta+Utara" target="_blank" rel="noopener" class="btn-maps">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                                Buka di Google Maps
                            </a>
                            <a href="https://wa.me/6281234567890?text=Halo%20Francis%20Artisan%20Bakery%20Sunter,%20saya%20ingin%20tanya%20ketersediaan%20roti%20hari%20ini" target="_blank" rel="noopener" class="btn-wa">
                                WhatsApp Outlet
                            </a>
                            <button type="button" class="btn-focus-map" onclick="selectStore('sunter', true)">Lihat di Peta</button>
                        </div>
                    </article>

                    <!-- 2. SENOPATI -->
                    <article class="store-card" id="card-senopati" data-id="senopati" data-area="Jakarta Selatan" data-keywords="senopati kebayoran baru jakarta selatan scbd cafe brunch dine-in">
                        <div class="store-card-header">
                            <div>
                                <span class="store-area-tag">Jakarta Selatan</span>
                                <h2 class="store-title">Francis Senopati — Bakery &amp; Cafe</h2>
                            </div>
                            <span class="store-type-badge">Dine-in Cafe</span>
                        </div>
                        <p class="store-address">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Jl. Senopati No. 42, Selong, Kebayoran Baru, Jakarta Selatan 12190</span>
                        </p>
                        <div class="store-info-row">
                            <div class="store-info-col">
                                <span class="store-info-label">Jam Operasional</span>
                                <span class="store-info-val">07.00 – 21.00 WIB (Setiap Hari)</span>
                            </div>
                            <div class="store-info-col">
                                <span class="store-info-label">Telepon / WhatsApp</span>
                                <span class="store-info-val">+62 813-8888-2301</span>
                            </div>
                        </div>
                        <div class="store-facilities">
                            <span class="facility-pill">🪑 45 Kursi Dine-in</span>
                            <span class="facility-pill">🥪 All-Day Brunch</span>
                            <span class="facility-pill">☕ Specialty Coffee</span>
                            <span class="facility-pill">🐕 Pet-friendly Patio</span>
                            <span class="facility-pill">⚡ Stopkontak &amp; Wi-Fi</span>
                        </div>
                        <div class="store-actions">
                            <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Senopati+No.+42+Kebayoran+Baru+Jakarta+Selatan" target="_blank" rel="noopener" class="btn-maps">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                                Buka di Google Maps
                            </a>
                            <a href="https://wa.me/6281388882301?text=Halo%20Francis%20Senopati,%20saya%20ingin%20reservasi%20meja%20atau%20pre-order%20pastry" target="_blank" rel="noopener" class="btn-wa">
                                WhatsApp Outlet
                            </a>
                            <button type="button" class="btn-focus-map" onclick="selectStore('senopati', true)">Lihat di Peta</button>
                        </div>
                    </article>

                    <!-- 3. GRAND INDONESIA -->
                    <article class="store-card" id="card-gi" data-id="gi" data-area="Jakarta Pusat" data-keywords="grand indonesia gi thamrin jakarta pusat mall boutique to-go grab express">
                        <div class="store-card-header">
                            <div>
                                <span class="store-area-tag">Jakarta Pusat</span>
                                <h2 class="store-title">Francis Grand Indonesia</h2>
                            </div>
                            <span class="store-type-badge">Mall Boutique</span>
                        </div>
                        <p class="store-address">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Grand Indonesia East Mall, Lantai LG Unit #18, Jl. M.H. Thamrin No. 1, Jakarta Pusat 10310</span>
                        </p>
                        <div class="store-info-row">
                            <div class="store-info-col">
                                <span class="store-info-label">Jam Operasional</span>
                                <span class="store-info-val">10.00 – 22.00 WIB (Sesuai Jam Mall)</span>
                            </div>
                            <div class="store-info-col">
                                <span class="store-info-label">Telepon / WhatsApp</span>
                                <span class="store-info-val">+62 813-8888-2302</span>
                            </div>
                        </div>
                        <div class="store-facilities">
                            <span class="facility-pill">🥐 Fresh Pastry Counter</span>
                            <span class="facility-pill">🛍️ Grab &amp; Go</span>
                            <span class="facility-pill">🎁 Hampers &amp; Gift Box</span>
                            <span class="facility-pill">💳 Cashless Only</span>
                        </div>
                        <div class="store-actions">
                            <a href="https://www.google.com/maps/search/?api=1&query=Grand+Indonesia+East+Mall+Jakarta+Pusat" target="_blank" rel="noopener" class="btn-maps">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                                Buka di Google Maps
                            </a>
                            <a href="https://wa.me/6281388882302?text=Halo%20Francis%20Grand%20Indonesia,%20apakah%20croissant%20butter%20masih%20tersedia?" target="_blank" rel="noopener" class="btn-wa">
                                WhatsApp Outlet
                            </a>
                            <button type="button" class="btn-focus-map" onclick="selectStore('gi', true)">Lihat di Peta</button>
                        </div>
                    </article>

                    <!-- 4. MALL KELAPA GADING 3 -->
                    <article class="store-card" id="card-mkg" data-id="mkg" data-area="Jakarta Utara" data-keywords="kelapa gading mkg 3 mall jakarta utara boulangerie bakery coffee">
                        <div class="store-card-header">
                            <div>
                                <span class="store-area-tag">Jakarta Utara</span>
                                <h2 class="store-title">Francis Mall Kelapa Gading 3</h2>
                            </div>
                            <span class="store-type-badge">Viennoiserie Bar</span>
                        </div>
                        <p class="store-address">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Mall Kelapa Gading 3, Ground Floor #G-08 (Dekat Lobby Selatan), Kelapa Gading, Jakarta Utara 14240</span>
                        </p>
                        <div class="store-info-row">
                            <div class="store-info-col">
                                <span class="store-info-label">Jam Operasional</span>
                                <span class="store-info-val">10.00 – 22.00 WIB</span>
                            </div>
                            <div class="store-info-col">
                                <span class="store-info-label">Telepon / WhatsApp</span>
                                <span class="store-info-val">+62 813-8888-2303</span>
                            </div>
                        </div>
                        <div class="store-facilities">
                            <span class="facility-pill">🥖 Sourdough Restock 11.00 &amp; 16.00</span>
                            <span class="facility-pill">☕ Coffee To-Go</span>
                            <span class="facility-pill">🔪 Free Bread Slicing</span>
                        </div>
                        <div class="store-actions">
                            <a href="https://www.google.com/maps/search/?api=1&query=Mall+Kelapa+Gading+3+Jakarta+Utara" target="_blank" rel="noopener" class="btn-maps">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                                Buka di Google Maps
                            </a>
                            <a href="https://wa.me/6281388882303?text=Halo%20Francis%20MKG%203,%20saya%20mau%20order%20roti%20hari%20ini" target="_blank" rel="noopener" class="btn-wa">
                                WhatsApp Outlet
                            </a>
                            <button type="button" class="btn-focus-map" onclick="selectStore('mkg', true)">Lihat di Peta</button>
                        </div>
                    </article>

                    <!-- 5. LIPPO MALL PURI -->
                    <article class="store-card" id="card-puri" data-id="puri" data-area="Jakarta Barat" data-keywords="puri indah lippo mall puri kembangan jakarta barat whole loaf artisan">
                        <div class="store-card-header">
                            <div>
                                <span class="store-area-tag">Jakarta Barat</span>
                                <h2 class="store-title">Francis Lippo Mall Puri</h2>
                            </div>
                            <span class="store-type-badge">Fresh Oven Corner</span>
                        </div>
                        <p class="store-address">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Lippo Mall Puri, LG Floor Unit #24, Jl. Puri Indah Raya Blok U1, Kembangan, Jakarta Barat 11610</span>
                        </p>
                        <div class="store-info-row">
                            <div class="store-info-col">
                                <span class="store-info-label">Jam Operasional</span>
                                <span class="store-info-val">10.00 – 22.00 WIB</span>
                            </div>
                            <div class="store-info-col">
                                <span class="store-info-label">Telepon / WhatsApp</span>
                                <span class="store-info-val">+62 813-8888-2304</span>
                            </div>
                        </div>
                        <div class="store-facilities">
                            <span class="facility-pill">🥖 Whole Loaves &amp; Baguettes</span>
                            <span class="facility-pill">🔥 Warm-up Service</span>
                            <span class="facility-pill">🧈 Selai &amp; Butter Organik</span>
                        </div>
                        <div class="store-actions">
                            <a href="https://www.google.com/maps/search/?api=1&query=Lippo+Mall+Puri+Jakarta+Barat" target="_blank" rel="noopener" class="btn-maps">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                                Buka di Google Maps
                            </a>
                            <a href="https://wa.me/6281388882304?text=Halo%20Francis%20Lippo%20Mall%20Puri,%20apakah%20rye%20dark%20tersedia?" target="_blank" rel="noopener" class="btn-wa">
                                WhatsApp Outlet
                            </a>
                            <button type="button" class="btn-focus-map" onclick="selectStore('puri', true)">Lihat di Peta</button>
                        </div>
                    </article>

                    <!-- 6. THE BREEZE BSD -->
                    <article class="store-card" id="card-bsd" data-id="bsd" data-area="Tangerang" data-keywords="the breeze bsd serpong tangerang banten patio outdoor dog pet garden cafe">
                        <div class="store-card-header">
                            <div>
                                <span class="store-area-tag">Tangerang &amp; BSD</span>
                                <h2 class="store-title">Francis Garden Patio — The Breeze BSD</h2>
                            </div>
                            <span class="store-type-badge">Garden Cafe</span>
                        </div>
                        <p class="store-address">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>The Breeze BSD City, GF Unit L-15 (Danau View), Jl. Grand Boulevard, BSD City, Tangerang 15345</span>
                        </p>
                        <div class="store-info-row">
                            <div class="store-info-col">
                                <span class="store-info-label">Jam Operasional</span>
                                <span class="store-info-val">07.30 – 21.00 WIB</span>
                            </div>
                            <div class="store-info-col">
                                <span class="store-info-label">Telepon / WhatsApp</span>
                                <span class="store-info-val">+62 813-8888-2305</span>
                            </div>
                        </div>
                        <div class="store-facilities">
                            <span class="facility-pill">🌳 Area Semi-Outdoor Danau</span>
                            <span class="facility-pill">🐶 Pet &amp; Dog Friendly</span>
                            <span class="facility-pill">🍕 Sourdough Pizza Akhir Pekan</span>
                            <span class="facility-pill">☕ Manual Brew Bar</span>
                        </div>
                        <div class="store-actions">
                            <a href="https://www.google.com/maps/search/?api=1&query=The+Breeze+BSD+City+Tangerang" target="_blank" rel="noopener" class="btn-maps">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                                Buka di Google Maps
                            </a>
                            <a href="https://wa.me/6281388882305?text=Halo%20Francis%20The%20Breeze%20BSD,%20apakah%20area%20patio%20bisa%20bawa%20peliharaan?" target="_blank" rel="noopener" class="btn-wa">
                                WhatsApp Outlet
                            </a>
                            <button type="button" class="btn-focus-map" onclick="selectStore('bsd', true)">Lihat di Peta</button>
                        </div>
                    </article>

                    <!-- EMPTY STATE WHEN FILTER YIELDS NO RESULTS -->
                    <div class="empty-state" id="empty-state">
                        <h3 class="empty-state-title">Gerai Tidak Ditemukan</h3>
                        <p class="empty-state-desc">Kami tidak menemukan gerai yang cocok dengan kata kunci pencarian Anda. Coba kata kunci lain atau pilih filter "Semua Area".</p>
                        <button type="button" class="btn-maps" onclick="resetSearchAndFilter()">Reset Pencarian</button>
                    </div>

                </div>

                <!-- RIGHT COLUMN: INTERACTIVE MAP -->
                <aside class="map-sticky-wrapper" aria-label="Peta Interaktif Lokasi Store">
                    <div class="map-header">
                        <span class="map-header-title">Peta Persebaran Gerai</span>
                        <button type="button" class="map-reset-btn" id="map-reset-view-btn" onclick="resetMapView()">Lihat Semua</button>
                    </div>
                    <div id="store-map"></div>
                </aside>

            </div>

        </div>
    </section>

    <!-- STORE GUIDE & SERVICES SECTION -->
    <section class="store-guide-section" aria-label="Layanan & Panduan Pengunjung">
        <div class="store-guide-inner">
            <div class="guide-header">
                <span class="section-label">Layanan Kami</span>
                <h2 class="section-title">Nikmati Pengalaman <em>Bakery Terbaik</em></h2>
            </div>
            <div class="guide-cards">
                <div class="guide-card">
                    <div class="guide-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    </div>
                    <h3 class="guide-card-title">Pre-Order &amp; Ambil di Toko</h3>
                    <p class="guide-card-text">
                        Agar roti favorit Anda tidak kehabisan sebelum tiba di toko, Anda dapat melakukan reservasi via WhatsApp sehari sebelumnya. Roti akan kami sisihkan dan siap Anda ambil.
                    </p>
                </div>
                <div class="guide-card">
                    <div class="guide-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </div>
                    <h3 class="guide-card-title">Jadwal Fresh From Oven</h3>
                    <p class="guide-card-text">
                        Setiap gerai menerima pasokan batch pagi pada pukul 07.00 WIB. Untuk gerai mall, restock croissant dan pastry hangat kedua dilakukan setiap pukul 15.00 WIB.
                    </p>
                </div>
                <div class="guide-card">
                    <div class="guide-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    </div>
                    <h3 class="guide-card-title">Pengiriman Instan Se-Jabodetabek</h3>
                    <p class="guide-card-text">
                        Tidak sempat datang ke toko? Hubungi gerai terdekat dari rumah Anda, pesanan dapat dikirimkan langsung menggunakan layanan kurir instan seperti GoSend atau GrabExpress.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    // DATA STORE COORDINATES & DETAILS
    var storesData = {
        sunter: {
            id: 'sunter',
            name: 'Francis Sunter (Central Bakehouse)',
            type: 'Flagship Store',
            area: 'Jakarta Utara',
            address: 'Jl. Nusantara Timur 10 Blok D No. 47, Sunter Agung, Jakarta Utara',
            coords: [-6.13845, 106.86210],
            hours: '06.00 – 20.00 WIB',
            wa: '+62 812-3456-7890'
        },
        senopati: {
            id: 'senopati',
            name: 'Francis Senopati — Bakery & Cafe',
            type: 'Dine-in Cafe',
            area: 'Jakarta Selatan',
            address: 'Jl. Senopati No. 42, Kebayoran Baru, Jakarta Selatan',
            coords: [-6.23450, 106.81120],
            hours: '07.00 – 21.00 WIB',
            wa: '+62 813-8888-2301'
        },
        gi: {
            id: 'gi',
            name: 'Francis Grand Indonesia',
            type: 'Mall Boutique',
            area: 'Jakarta Pusat',
            address: 'East Mall LG Floor #18, Jl. M.H. Thamrin No. 1, Jakarta Pusat',
            coords: [-6.19500, 106.82100],
            hours: '10.00 – 22.00 WIB',
            wa: '+62 813-8888-2302'
        },
        mkg: {
            id: 'mkg',
            name: 'Francis Mall Kelapa Gading 3',
            type: 'Viennoiserie Bar',
            area: 'Jakarta Utara',
            address: 'Mall Kelapa Gading 3, GF #G-08, Kelapa Gading, Jakarta Utara',
            coords: [-6.15780, 106.90800],
            hours: '10.00 – 22.00 WIB',
            wa: '+62 813-8888-2303'
        },
        puri: {
            id: 'puri',
            name: 'Francis Lippo Mall Puri',
            type: 'Fresh Oven Corner',
            area: 'Jakarta Barat',
            address: 'Lippo Mall Puri, LG Floor, Kembangan, Jakarta Barat',
            coords: [-6.18660, 106.73600],
            hours: '10.00 – 22.00 WIB',
            wa: '+62 813-8888-2304'
        },
        bsd: {
            id: 'bsd',
            name: 'Francis The Breeze BSD',
            type: 'Garden Cafe',
            area: 'Tangerang',
            address: 'The Breeze BSD City, GF Unit L-15, BSD, Tangerang',
            coords: [-6.30150, 106.65340],
            hours: '07.30 – 21.00 WIB',
            wa: '+62 813-8888-2305'
        }
    };

    // INITIALIZE LEAFLET MAP
    var defaultCenter = [-6.2000, 106.8000];
    var defaultZoom = 11;
    var map = L.map('store-map', {
        center: defaultCenter,
        zoom: defaultZoom,
        scrollWheelZoom: false
    });

    // Standard OpenStreetMap tiles (100% free, no API key required)
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Custom Amber Pin Icon
    var createCustomIcon = function(isSelected) {
        var bg = isSelected ? '#2C1A0E' : '#C8860A';
        var border = isSelected ? '#C8860A' : '#FDFAF5';
        var size = isSelected ? 38 : 32;
        return L.divIcon({
            className: 'custom-pin-marker',
            html: '<div style="background:' + bg + '; border:2.5px solid ' + border + '; width:' + size + 'px; height:' + size + 'px; border-radius:50% 50% 50% 0; transform:rotate(-45deg); box-shadow:0 4px 12px rgba(0,0,0,0.3); display:flex; align-items:center; justify-content:center;">' +
                  '<div style="width:8px; height:8px; background:#FDFAF5; border-radius:50%; transform:rotate(45deg);"></div>' +
                  '</div>',
            iconSize: [size, size],
            iconAnchor: [size / 2, size]
        });
    };

    var markers = {};
    var bounds = L.latLngBounds([]);

    // Populate Markers
    Object.keys(storesData).forEach(function(key) {
        var s = storesData[key];
        var marker = L.marker(s.coords, { icon: createCustomIcon(key === 'sunter') }).addTo(map);
        
        var popupHtml = '<div class="popup-store-name">' + s.name + '</div>' +
                        '<div class="popup-store-sub">' + s.type + ' &bull; ' + s.area + '</div>' +
                        '<div class="popup-store-desc">' + s.address + '<br><strong>Jam:</strong> ' + s.hours + '</div>' +
                        '<a href="https://www.google.com/maps/search/?api=1&query=' + encodeURIComponent(s.address) + '" target="_blank" class="popup-store-link">Petunjuk Arah &rsaquo;</a>';
        marker.bindPopup(popupHtml);

        marker.on('click', function() {
            selectStore(key, false);
        });

        markers[key] = marker;
        bounds.extend(s.coords);
    });

    // Fit map to show all markers
    map.fitBounds(bounds, { padding: [50, 50] });

    function resetMapView() {
        map.fitBounds(bounds, { padding: [50, 50] });
    }

    // SELECT STORE (SYNCHRONIZE CARD & MAP)
    function selectStore(storeId, scrollCard) {
        // Update Card Selected State
        document.querySelectorAll('.store-card').forEach(function(card) {
            card.classList.remove('selected');
        });
        var targetCard = document.getElementById('card-' + storeId);
        if (targetCard) {
            targetCard.classList.add('selected');
            if (scrollCard) {
                targetCard.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }

        // Update Markers Icon
        Object.keys(markers).forEach(function(key) {
            markers[key].setIcon(createCustomIcon(key === storeId));
        });

        // Fly Map to Store
        var s = storesData[storeId];
        if (s && markers[storeId]) {
            map.flyTo(s.coords, 14, { duration: 1 });
            markers[storeId].openPopup();
        }
    }

    // Attach click events to store cards
    document.querySelectorAll('.store-card').forEach(function(card) {
        card.addEventListener('click', function(e) {
            // Ignore if clicking action link/button inside
            if (e.target.closest('a') || e.target.closest('.btn-focus-map')) return;
            var id = this.getAttribute('data-id');
            selectStore(id, false);
        });
    });

    // FILTER & SEARCH LOGIC
    var searchInput = document.getElementById('store-search-input');
    var clearBtn = document.getElementById('search-clear-btn');
    var filterChips = document.querySelectorAll('.filter-chip');
    var resultsText = document.getElementById('results-count-text');
    var emptyState = document.getElementById('empty-state');
    var mobileListCount = document.getElementById('mobile-list-count');

    var currentArea = 'all';
    var currentQuery = '';

    function filterStores() {
        var visibleCount = 0;
        var cards = document.querySelectorAll('.store-card');

        cards.forEach(function(card) {
            var cardArea = card.getAttribute('data-area');
            var cardKeywords = (card.getAttribute('data-keywords') || '') + ' ' + card.innerText.toLowerCase();
            
            var matchArea = (currentArea === 'all' || cardArea === currentArea);
            var matchQuery = (!currentQuery || cardKeywords.indexOf(currentQuery.toLowerCase()) !== -1);

            var id = card.getAttribute('data-id');

            if (matchArea && matchQuery) {
                card.style.display = 'block';
                visibleCount++;
                if (markers[id] && !map.hasLayer(markers[id])) {
                    markers[id].addTo(map);
                }
            } else {
                card.style.display = 'none';
                if (markers[id] && map.hasLayer(markers[id])) {
                    map.removeLayer(markers[id]);
                }
            }
        });

        // Update results counter
        resultsText.textContent = 'Menampilkan ' + visibleCount + ' lokasi gerai';
        if (mobileListCount) mobileListCount.textContent = visibleCount;

        // Toggle Empty State
        if (visibleCount === 0) {
            emptyState.classList.add('visible');
        } else {
            emptyState.classList.remove('visible');
        }
    }

    // Search Input Listener
    searchInput.addEventListener('input', function() {
        currentQuery = this.value.trim();
        clearBtn.classList.toggle('visible', currentQuery.length > 0);
        filterStores();
    });

    // Clear Search Button
    clearBtn.addEventListener('click', function() {
        searchInput.value = '';
        currentQuery = '';
        this.classList.remove('visible');
        filterStores();
        searchInput.focus();
    });

    // Filter Chips
    filterChips.forEach(function(chip) {
        chip.addEventListener('click', function() {
            filterChips.forEach(function(c) { c.classList.remove('active'); });
            this.classList.add('active');
            currentArea = this.getAttribute('data-area');
            filterStores();
        });
    });

    function resetSearchAndFilter() {
        searchInput.value = '';
        currentQuery = '';
        clearBtn.classList.remove('visible');
        currentArea = 'all';
        filterChips.forEach(function(c) {
            c.classList.toggle('active', c.getAttribute('data-area') === 'all');
        });
        filterStores();
        resetMapView();
    }

    // MOBILE VIEW TOGGLE (LIST VS MAP)
    var btnToggleList = document.getElementById('btn-toggle-list');
    var btnToggleMap = document.getElementById('btn-toggle-map');
    var locatorGrid = document.getElementById('locator-grid');

    if (btnToggleList && btnToggleMap && locatorGrid) {
        btnToggleList.addEventListener('click', function() {
            btnToggleList.classList.add('active');
            btnToggleMap.classList.remove('active');
            locatorGrid.classList.remove('view-map-mode');
            locatorGrid.classList.add('view-list-mode');
        });

        btnToggleMap.addEventListener('click', function() {
            btnToggleMap.classList.add('active');
            btnToggleList.classList.remove('active');
            locatorGrid.classList.remove('view-list-mode');
            locatorGrid.classList.add('view-map-mode');
            setTimeout(function() {
                map.invalidateSize();
                resetMapView();
            }, 200);
        });
    }
</script>
@endpush