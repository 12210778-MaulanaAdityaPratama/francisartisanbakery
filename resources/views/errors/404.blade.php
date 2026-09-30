@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan - Francis Artisan Bakery')

@push('styles')
<style>
    .error-hero {
        background: var(--brown-deep);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 4rem 2rem;
        position: relative;
        overflow: hidden;
    }
    .error-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: repeating-linear-gradient(-45deg, transparent, transparent 20px, rgba(200,134,10,0.035) 20px, rgba(200,134,10,0.035) 21px);
        pointer-events: none;
    }
    .error-content {
        position: relative;
        z-index: 2;
    }
    .error-content h1 {
        font-family: var(--ff-serif);
        font-size: clamp(6rem, 15vw, 10rem);
        color: var(--amber);
        margin-bottom: 0.5rem;
        line-height: 1;
    }
    .error-content h2 {
        font-family: var(--ff-serif);
        font-size: clamp(2rem, 5vw, 3rem);
        color: var(--cream);
        margin-bottom: 1.5rem;
        font-weight: 400;
        font-style: italic;
    }
    .error-content p {
        color: rgba(245,236,215,0.7);
        max-width: 500px;
        margin: 0 auto 2.5rem;
        font-size: 1.1rem;
    }
    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 2.5rem;
        background: var(--amber);
        color: var(--brown-deep);
        font-weight: 700;
        text-transform: uppercase;
        text-decoration: none;
        letter-spacing: 0.05em;
        transition: all 0.25s ease;
        border-radius: 2px;
    }
    .btn-primary:hover {
        background: var(--amber-light);
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
</style>
@endpush

@section('content')
<section class="error-hero">
    <div class="error-content">
        <h1>404</h1>
        <h2>Ups! Roti Sudah Ludes</h2>
        <p>Halaman yang Anda cari mungkin telah dipindahkan atau sudah tidak ada. Mari kembali ke beranda dan melihat koleksi roti segar kami hari ini.</p>
        <a href="{{ route('index') }}" class="btn-primary">Kembali ke Beranda &rarr;</a>
    </div>
</section>
@endsection
