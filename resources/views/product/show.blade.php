@extends('layouts.app')

@section('title', 'Detail Produk - Francis Artisan Bakery')

@push('styles')
<style>
    .product-detail-hero {
        padding: 9rem 2rem 4.5rem;
        background: var(--white);
        min-height: 80vh;
    }
    .product-detail-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: start;
    }
    
    .product-image-wrapper {
        background: var(--brown-deep);
        border-radius: 4px;
        aspect-ratio: 4/5;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .product-image-wrapper::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, transparent 50%, rgba(44, 26, 14, 0.8) 100%);
    }
    
    .product-info {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        position: sticky;
        top: 6rem;
    }
    
    .breadcrumbs {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.8rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--brown-light);
    }
    .breadcrumbs a {
        color: var(--amber);
        text-decoration: none;
    }
    
    .product-category {
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--amber);
    }
    
    .product-title {
        font-family: var(--ff-serif);
        font-size: clamp(2.5rem, 4vw, 3.5rem);
        color: var(--brown-deep);
        line-height: 1.1;
    }
    
    .product-price {
        font-family: var(--ff-sans);
        font-size: 1.75rem;
        color: var(--brown-mid);
        font-weight: 700;
    }
    
    .product-desc {
        font-size: 1.1rem;
        color: var(--brown-mid);
        line-height: 1.8;
        padding-bottom: 2rem;
        border-bottom: 1px solid var(--cream-dark);
    }
    
    .product-attributes {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-top: 1rem;
    }
    .attr-item {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }
    .attr-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--brown-light);
        font-weight: 700;
    }
    .attr-value {
        font-size: 1rem;
        color: var(--brown-deep);
    }
    
    .btn-buy {
        margin-top: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        padding: 1.15rem;
        background: var(--amber);
        color: var(--brown-deep);
        font-weight: 700;
        text-transform: uppercase;
        text-decoration: none;
        letter-spacing: 0.05em;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        width: 100%;
        border-radius: 4px;
    }
    .btn-buy:hover {
        background: var(--amber-light);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(200,134,10,0.2);
    }
    
    @media (max-width: 900px) {
        .product-detail-container {
            grid-template-columns: 1fr;
            gap: 3rem;
        }
        .product-info {
            position: static;
        }
    }
</style>
@endpush

@section('content')
<section class="product-detail-hero">
    <div class="product-detail-container">
        
        <div class="product-image-wrapper">
            <!-- Simulated Image / Pattern -->
            <div style="width: 100%; height: 100%; background-image: repeating-linear-gradient(45deg, rgba(200,134,10,0.1), rgba(200,134,10,0.1) 20px, transparent 20px, transparent 40px);"></div>
        </div>
        
        <div class="product-info">
            <nav class="breadcrumbs">
                <a href="{{ route('index') }}">Beranda</a>
                <span>&rsaquo;</span>
                <a href="{{ route('menu') }}">Menu</a>
                <span>&rsaquo;</span>
                <span>Detail</span>
            </nav>
            
            <div>
                <p class="product-category">Artisan Sourdough</p>
                <h1 class="product-title">Sourdough Classic Loaf</h1>
            </div>
            
            <p class="product-price">Rp 75.000</p>
            
            <p class="product-desc">
                Loaf signature Francis Artisan Bakery. Difermentasi perlahan selama 18 jam dengan starter levain berumur dua tahun, lalu dipanggang di atas batu vulkanik 240&deg;C dengan semburan uap air. Menghasilkan kerak cokelat berkilau yang renyah dan bagian dalam berongga terbuka yang elastis dengan aroma ragi asam buah yang kaya.
            </p>
            
            <div class="product-attributes">
                <div class="attr-item">
                    <span class="attr-label">Bahan Pokok</span>
                    <span class="attr-value">Tepung gandum, air, levain, garam</span>
                </div>
                <div class="attr-item">
                    <span class="attr-label">Fermentasi</span>
                    <span class="attr-value">18 Jam Cold Retard</span>
                </div>
                <div class="attr-item">
                    <span class="attr-label">Berat Bersih</span>
                    <span class="attr-value">850 gram</span>
                </div>
                <div class="attr-item">
                    <span class="attr-label">Ketahanan</span>
                    <span class="attr-value">3 hari suhu ruang</span>
                </div>
            </div>
            
            <a href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20memesan%20Sourdough%20Classic%20Loaf" target="_blank" rel="noopener" class="btn-buy">
                Pesan via WhatsApp
            </a>
        </div>
        
    </div>
</section>
@endsection
