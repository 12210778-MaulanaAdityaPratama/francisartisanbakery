@extends('layouts.app')

@section('title', 'Wholesale & Katering - Francis Artisan Bakery')

@push('styles')
<style>
    .ws-hero {
        background: var(--brown-deep);
        padding: 9rem 2rem 4.5rem;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(200, 134, 10, 0.25);
    }
    .ws-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: repeating-linear-gradient(-45deg, transparent, transparent 20px, rgba(200,134,10,0.035) 20px, rgba(200,134,10,0.035) 21px);
        pointer-events: none;
    }
    .ws-hero-inner {
        position: relative;
        z-index: 2;
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
    }
    .ws-title {
        font-family: var(--ff-serif);
        font-size: clamp(2.5rem, 5vw, 4.5rem);
        color: var(--amber);
        margin-bottom: 1rem;
    }
    .ws-subtitle {
        font-size: 1.15rem;
        color: var(--cream);
        line-height: 1.8;
    }

    .ws-content {
        padding: 5rem 2rem;
        background: var(--white);
        max-width: 800px;
        margin: 0 auto;
    }

    .ws-intro {
        font-size: 1.25rem;
        color: var(--brown-mid);
        line-height: 1.8;
        margin-bottom: 4rem;
        text-align: center;
        font-family: var(--ff-serif);
        font-style: italic;
    }

    .ws-benefits {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2.5rem;
        margin-bottom: 4rem;
    }
    .benefit-item h3 {
        font-size: 1.25rem;
        color: var(--brown-deep);
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .benefit-item h3::before {
        content: '❖';
        color: var(--amber);
    }
    .benefit-item p {
        color: var(--brown-mid);
        line-height: 1.6;
    }

    .ws-cta-box {
        background: #FDF7ED;
        border: 1px solid var(--cream-dark);
        padding: 3rem 2rem;
        text-align: center;
        border-radius: 4px;
    }
    .ws-cta-box h2 {
        font-family: var(--ff-serif);
        font-size: 2rem;
        color: var(--brown-deep);
        margin-bottom: 1rem;
    }
    .ws-cta-box p {
        color: var(--brown-mid);
        margin-bottom: 2rem;
    }
    .btn-solid {
        display: inline-block;
        padding: 1rem 2.5rem;
        background: var(--amber);
        color: var(--brown-deep);
        font-weight: 700;
        text-transform: uppercase;
        text-decoration: none;
        letter-spacing: 0.05em;
        transition: all 0.2s ease;
    }
    .btn-solid:hover {
        background: var(--amber-light);
        transform: translateY(-2px);
    }
    
    @media (max-width: 600px) {
        .ws-benefits {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<header class="ws-hero">
    <div class="ws-hero-inner">
        <h1 class="ws-title">Kerjasama (Wholesale)</h1>
        <p class="ws-subtitle">Kami bermitra dengan cafe, restoran, dan hotel terbaik untuk menyajikan roti artisan kualitas premium kepada pelanggan Anda.</p>
    </div>
</header>

<section class="ws-content">
    <p class="ws-intro">
        "Kualitas makanan yang hebat dimulai dari fondasi yang tepat. Lengkapi sajian kuliner Anda dengan roti buatan tangan yang dibuat dengan dedikasi tinggi."
    </p>

    <div class="ws-benefits">
        <div class="benefit-item">
            <h3>Konsistensi Kualitas</h3>
            <p>Standar produksi artisan kami memastikan setiap batch memiliki tekstur, rongga (crumb), dan kerak (crust) yang konsisten.</p>
        </div>
        <div class="benefit-item">
            <h3>Custom Sizing</h3>
            <p>Kami dapat menyesuaikan ukuran roti (burger bun, brioche slider, baguette panjang tertentu) sesuai dengan kebutuhan menu Anda.</p>
        </div>
        <div class="benefit-item">
            <h3>Pengiriman Harian</h3>
            <p>Roti dipanggang dini hari dan dikirim langsung ke lokasi Anda di pagi hari, menjamin kesegaran maksimal untuk operasional harian.</p>
        </div>
        <div class="benefit-item">
            <h3>Konsultasi Menu</h3>
            <p>Tim baker kami siap berdiskusi untuk merekomendasikan jenis roti (pairing) yang paling cocok dengan hidangan atau kopi Anda.</p>
        </div>
    </div>

    <div class="ws-cta-box">
        <h2>Mari Berkolaborasi</h2>
        <p>Hubungi tim B2B kami untuk meminta sampel gratis (tasting session) atau mendiskusikan kebutuhan suplai roti untuk bisnis Anda.</p>
        <a href="mailto:hello@francisbakery.com" class="btn-solid">Email Kami</a>
    </div>
</section>
@endsection
