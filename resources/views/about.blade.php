@extends('layouts.app')

@section('title', 'Tentang Kami - Francis Artisan Bakery')

@section('content')

    <!-- HERO SECTION -->
    <header class="hero" aria-label="Header Tentang Kami">
        <div class="hero-left">
            <!-- Breadcrumbs -->
            <nav class="store-breadcrumbs" aria-label="Breadcrumb" style="font-size: 0.75rem; color: var(--amber); margin-bottom: 2rem; letter-spacing: 0.1em; text-transform: uppercase;">
                <a href="{{ url('/') }}" style="color: var(--amber); text-decoration: none;">Beranda</a>
                <span style="margin: 0 0.5rem;">&rsaquo;</span>
                <span style="color: rgba(245,236,215,0.7);">Tentang Kami</span>
            </nav>

            <span class="hero-eyebrow reveal">Cerita Kami</span>
            <h1 class="hero-headline reveal reveal-delay-1">
                Kembali ke <em>Akar</em> Tradisi Baking.
            </h1>
            <p class="hero-desc reveal reveal-delay-2">
                Setiap potongan roti Francis Artisan Bakery adalah hasil dari kesabaran, waktu, dan dedikasi. Kami percaya bahwa roti terbaik tidak pernah dibuat dengan terburu-buru.
            </p>
            <a href="{{ route('menu') ?? '#' }}" class="hero-cta reveal reveal-delay-3">Lihat Menu Kami</a>
        </div>
        
        <div class="hero-right">
            <!-- Memanfaatkan animasi/ilustrasi roti dari CSS yang sudah ada -->
            <div class="bread-visual">
                <div class="bread-scene">
                    <div class="bread-table"></div>
                    <div class="bread-loaf"></div>
                    <div class="bread-baguette"></div>
                    <div class="flour" style="top:20%; left:30%; width:8px; height:8px;"></div>
                    <div class="flour" style="top:40%; left:80%; width:12px; height:12px;"></div>
                    <div class="flour" style="top:70%; left:15%; width:10px; height:10px;"></div>
                </div>
            </div>
        </div>
    </header>

    <!-- IDENTITAS & FILOSOFI SECTION -->
    <section class="section-identity">
        <div class="identity-visual reveal">
            <span class="identity-word">ARTISAN</span>
            <div class="identity-box">
                <span class="identity-box-year">100%</span>
                <span class="identity-box-label">Natural</span>
                <span class="identity-box-sub">Tanpa Pengawet</span>
            </div>
        </div>
        <div class="identity-content reveal reveal-delay-2">
            <span class="section-label">Filosofi Kami</span>
            <h2 class="section-title">Lebih Dari Sekadar Terigu & Air</h2>
            <ul class="identity-points">
                <li class="identity-point">
                    <div class="identity-point-marker"></div>
                    <div class="identity-point-text">
                        <strong>Fermentasi Lambat (Sourdough)</strong>
                        <span>Kami memberikan waktu berjam-jam untuk adonan beristirahat. Proses ini menghasilkan tekstur yang kenyal, rasa asam yang khas, dan membuat roti jauh lebih mudah dicerna oleh tubuh.</span>
                    </div>
                </li>
                <li class="identity-point">
                    <div class="identity-point-marker"></div>
                    <div class="identity-point-text">
                        <strong>Dibentuk Oleh Tangan Terampil</strong>
                        <span>Mesin tidak bisa merasakan kelembapan dan elastisitas adonan. Artisan baker kami melipat dan membentuk setiap roti secara manual dengan penuh perasaan.</span>
                    </div>
                </li>
                <li class="identity-point">
                    <div class="identity-point-marker"></div>
                    <div class="identity-point-text">
                        <strong>Freshly Baked Daily</strong>
                        <span>Oven batu kami mulai menyala sejak dini hari. Kami selalu memastikan roti yang Anda nikmati hari ini, adalah roti yang dipanggang hari ini.</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- PROSES SECTION -->
    <section class="section-process">
        <div class="process-header reveal">
            <h2 class="section-title">Perjalanan <em>Sebuah Loaf</em></h2>
            <p class="process-scroll-hint">GESER UNTUK MELIHAT PROSES KAMI &rarr;</p>
        </div>
        <div class="process-track reveal reveal-delay-2">
            <!-- Langkah 1 -->
            <div class="process-card">
                <span class="process-card-num">01</span>
                <div class="process-card-time">Hari 1 - Persiapan</div>
                <h3 class="process-card-title">Memberi Makan "Starter"</h3>
                <p class="process-card-desc">Semuanya berawal dari ragi alami (mother dough) kami yang dirawat setiap hari. Inilah jiwa dari setiap roti sourdough kami yang memberikan karakter dan aroma unik.</p>
            </div>
            
            <!-- Langkah 2 -->
            <div class="process-card">
                <span class="process-card-num">02</span>
                <div class="process-card-time">Hari 1 - Malam</div>
                <h3 class="process-card-title">Fermentasi Dingin</h3>
                <p class="process-card-desc">Adonan diistirahatkan dalam suhu dingin selama 18 hingga 24 jam. Waktu yang panjang ini memecah gluten dan memunculkan profil rasa yang sangat kompleks.</p>
            </div>
            
            <!-- Langkah 3 -->
            <div class="process-card">
                <span class="process-card-num">03</span>
                <div class="process-card-time">Hari 2 - Dini Hari</div>
                <h3 class="process-card-title">Shaping & Scoring</h3>
                <p class="process-card-desc">Setiap roti disentuh, dilipat, dan disayat (scoring) di bagian atasnya secara manual untuk mengontrol rongga udara (crumb) saat dipanggang.</p>
            </div>
            
            <!-- Langkah 4 -->
            <div class="process-card">
                <span class="process-card-num">04</span>
                <div class="process-card-time">Hari 2 - 05.30 Pagi</div>
                <h3 class="process-card-title">Stone Baking</h3>
                <p class="process-card-desc">Dipanggang di atas oven batu panas dengan semburan uap air (steam) presisi. Proses ini menciptakan kerak (crust) yang renyah dengan karamelisasi yang sempurna.</p>
            </div>
        </div>
    </section>

@endsection