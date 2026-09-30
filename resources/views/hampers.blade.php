@extends('layouts.app')

@section('title', 'Hampers & Pre-Order - Francis Artisan Bakery')

@push('styles')
<style>
    .hampers-hero {
        background: var(--brown-deep);
        padding: 9rem 2rem 4.5rem;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(200, 134, 10, 0.25);
        text-align: center;
    }
    .hampers-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: repeating-linear-gradient(-45deg, transparent, transparent 20px, rgba(200,134,10,0.035) 20px, rgba(200,134,10,0.035) 21px);
        pointer-events: none;
    }
    .hampers-hero-inner {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }
    .hampers-title {
        font-family: var(--ff-serif);
        font-size: clamp(2.5rem, 5vw, 4rem);
        color: var(--amber);
        margin-bottom: 1rem;
    }
    .hampers-subtitle {
        font-size: 1.15rem;
        color: var(--cream);
        line-height: 1.8;
    }
    
    .hampers-section {
        padding: 5rem 2rem;
        background: var(--white);
    }
    .hampers-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 3rem;
    }
    
    .hamper-card {
        background: var(--cream);
        border: 1px solid var(--cream-dark);
        border-radius: 4px;
        padding: 2.5rem;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hamper-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(44,26,14,0.1);
        border-color: var(--amber);
    }
    
    .hamper-icon {
        font-size: 3rem;
        margin-bottom: 1.5rem;
    }
    .hamper-name {
        font-family: var(--ff-serif);
        font-size: 2rem;
        color: var(--brown-deep);
        margin-bottom: 1rem;
    }
    .hamper-price {
        font-size: 1.5rem;
        color: var(--brown-mid);
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
    .hamper-desc {
        font-size: 1rem;
        color: var(--brown-mid);
        line-height: 1.6;
        margin-bottom: 2rem;
    }
    .hamper-list {
        list-style: none;
        text-align: left;
        margin-bottom: 2.5rem;
        border-top: 1px solid var(--cream-dark);
        padding-top: 1.5rem;
    }
    .hamper-list li {
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .hamper-list li::before {
        content: '✓';
        color: var(--amber);
        font-weight: bold;
    }
    
    .btn-outline {
        display: inline-block;
        padding: 0.85rem 2rem;
        border: 2px solid var(--brown-deep);
        color: var(--brown-deep);
        font-weight: 700;
        text-transform: uppercase;
        text-decoration: none;
        letter-spacing: 0.05em;
        transition: all 0.2s ease;
    }
    .btn-outline:hover {
        background: var(--brown-deep);
        color: var(--cream);
    }
</style>
@endpush

@section('content')
<header class="hampers-hero">
    <div class="hampers-hero-inner">
        <h1 class="hampers-title">Bingkisan &amp; Hampers</h1>
        <p class="hampers-subtitle">Bagikan kehangatan roti artisan kami kepada keluarga, sahabat, atau rekan kerja. Dirangkai dengan elegan menggunakan kotak premium ramah lingkungan.</p>
    </div>
</header>

<section class="hampers-section">
    <div class="hampers-container">
        
        <article class="hamper-card">
            <div class="hamper-icon">🍞</div>
            <h2 class="hamper-name">Artisan Box</h2>
            <p class="hamper-price">Rp 150.000</p>
            <p class="hamper-desc">Koleksi pastry dan roti ringan, cocok untuk kunjungan ke kerabat di pagi hari.</p>
            <ul class="hamper-list">
                <li>2x Croissant Butter</li>
                <li>2x Pain au Chocolat</li>
                <li>1x Cinnamon Roll</li>
                <li>Kartu Ucapan Kustom</li>
            </ul>
            <a href="https://wa.me/6281234567890" class="btn-outline">Pre-Order</a>
        </article>

        <article class="hamper-card" style="background: var(--brown-deep); color: var(--cream); border-color: var(--brown-deep);">
            <div class="hamper-icon">🥖</div>
            <h2 class="hamper-name" style="color: var(--amber);">Sourdough Feast</h2>
            <p class="hamper-price" style="color: var(--cream);">Rp 275.000</p>
            <p class="hamper-desc" style="color: rgba(245,236,215,0.8);">Paket lengkap bagi para penikmat roti keras khas Eropa (Hard crust bread).</p>
            <ul class="hamper-list" style="border-color: rgba(245,236,215,0.2);">
                <li>1x Sourdough Classic Loaf</li>
                <li>1x Dark Rye Loaf</li>
                <li>1x Baguette Traditionnelle</li>
                <li>1x Artisan Butter Jar</li>
                <li>Premium Gift Box</li>
            </ul>
            <a href="https://wa.me/6281234567890" class="btn-outline" style="border-color: var(--amber); color: var(--amber);">Pre-Order</a>
        </article>

        <article class="hamper-card">
            <div class="hamper-icon">☕</div>
            <h2 class="hamper-name">Morning Set</h2>
            <p class="hamper-price">Rp 210.000</p>
            <p class="hamper-desc">Pasangan sempurna antara kopi artisan dingin dan viennoiserie hangat kami.</p>
            <ul class="hamper-list">
                <li>2x Signature Cold Brew</li>
                <li>2x Almond Croissant</li>
                <li>1x Focaccia Slice</li>
                <li>Kartu Ucapan Kustom</li>
            </ul>
            <a href="https://wa.me/6281234567890" class="btn-outline">Pre-Order</a>
        </article>
        
    </div>
</section>
@endsection
