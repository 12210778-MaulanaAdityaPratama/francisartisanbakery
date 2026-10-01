@extends('layouts.app')

@section('title', 'Career - Francis Artisan Bakery')

@push('styles')
<style>
    .career-hero {
        background: var(--brown-deep);
        padding: 9rem 2rem 4.5rem;
        text-align: center;
        border-bottom: 1px solid rgba(200, 134, 10, 0.25);
    }
    .career-title {
        font-family: var(--ff-serif);
        font-size: clamp(3rem, 6vw, 4.5rem);
        color: var(--cream);
        margin-bottom: 1rem;
    }
    .career-title em {
        color: var(--amber-light);
        font-style: italic;
    }
    .career-subtitle {
        font-size: 1.15rem;
        color: rgba(245, 236, 215, 0.7);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.8;
    }

    .career-content {
        max-width: 800px;
        margin: 0 auto;
        padding: 5rem 2rem;
    }
    
    .job-card {
        background: var(--white);
        border: 1px solid var(--cream-dark);
        padding: 2rem;
        margin-bottom: 2rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(44, 26, 14, 0.08);
    }
    .job-title {
        font-family: var(--ff-serif);
        font-size: 1.8rem;
        color: var(--brown-deep);
        margin-bottom: 0.5rem;
    }
    .job-meta {
        font-size: 0.85rem;
        color: var(--amber);
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
    .job-desc {
        font-size: 1rem;
        color: var(--brown-mid);
        line-height: 1.7;
        margin-bottom: 2rem;
    }
    .job-apply {
        display: inline-block;
        padding: 0.8rem 2rem;
        background: var(--brown-deep);
        color: var(--white);
        text-decoration: none;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        transition: background 0.3s ease;
    }
    .job-apply:hover {
        background: var(--amber);
        color: var(--brown-deep);
    }
    .no-jobs {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--brown-mid);
        font-style: italic;
        font-family: var(--ff-serif);
        font-size: 1.25rem;
    }
</style>
@endpush

@section('content')
<header class="career-hero">
    <h1 class="career-title">Bergabung <em>Bersama Kami</em></h1>
    <p class="career-subtitle">Jadilah bagian dari tim Francis Artisan Bakery dan bantu kami menyajikan produk berkualitas setiap harinya.</p>
</header>

<section class="career-content">
    
    <div class="job-card">
        <h2 class="job-title">Baker Artisan</h2>
        <div class="job-meta">Full Time • Jakarta</div>
        <p class="job-desc">Kami mencari baker yang bersemangat dan berpengalaman dalam pembuatan roti artisan (sourdough, croissant, dsb). Anda akan bertanggung jawab mulai dari persiapan bahan, proses fermentasi, hingga pemanggangan.</p>
        <a href="mailto:hrd@francisartisanbakery.com?subject=Lamaran%20Baker%20Artisan" class="job-apply">Kirim Lamaran</a>
    </div>

    <div class="job-card">
        <h2 class="job-title">Store Assistant / Kasir</h2>
        <div class="job-meta">Full Time / Part Time • Jakarta</div>
        <p class="job-desc">Membantu melayani pelanggan dengan ramah, menjelaskan varian produk, mengatur display roti, dan menangani transaksi. Dibutuhkan kemampuan komunikasi yang baik dan teliti.</p>
        <a href="mailto:hrd@francisartisanbakery.com?subject=Lamaran%20Store%20Assistant" class="job-apply">Kirim Lamaran</a>
    </div>

</section>
@endsection
