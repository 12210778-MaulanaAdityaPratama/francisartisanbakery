@extends('layouts.app')

@section('title', 'Bread Care Guide - Francis Artisan Bakery')

@push('styles')
<style>
    .care-hero {
        background: var(--brown-deep);
        padding: 9rem 2rem 4.5rem;
        text-align: center;
        border-bottom: 1px solid rgba(200, 134, 10, 0.25);
    }
    .care-title {
        font-family: var(--ff-serif);
        font-size: clamp(3rem, 6vw, 4.5rem);
        color: var(--cream);
        margin-bottom: 1rem;
    }
    .care-title em {
        color: var(--amber-light);
        font-style: italic;
    }
    .care-subtitle {
        font-size: 1.15rem;
        color: rgba(245, 236, 215, 0.7);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.8;
    }

    .care-content {
        max-width: 800px;
        margin: 0 auto;
        padding: 5rem 2rem;
    }
    
    .care-step {
        display: flex;
        gap: 2rem;
        margin-bottom: 4rem;
    }
    .care-step-num {
        font-family: var(--ff-serif);
        font-size: 4rem;
        color: var(--cream-dark);
        line-height: 1;
        font-weight: 700;
    }
    .care-step-info h3 {
        font-family: var(--ff-serif);
        font-size: 2rem;
        color: var(--brown-deep);
        margin-bottom: 1rem;
    }
    .care-step-info p {
        font-size: 1.1rem;
        color: var(--brown-mid);
        line-height: 1.7;
    }
    
    @media (max-width: 768px) {
        .care-step {
            flex-direction: column;
            gap: 1rem;
        }
    }
</style>
@endpush

@section('content')
<header class="care-hero">
    <h1 class="care-title">Bread <em>Care Guide</em></h1>
    <p class="care-subtitle">Roti artisan sejati tidak mengandung pengawet buatan. Ikuti panduan ini agar roti Anda tetap segar, bertekstur baik, dan nikmat hingga gigitan terakhir.</p>
</header>

<section class="care-content">
    
    <div class="care-step">
        <div class="care-step-num">01</div>
        <div class="care-step-info">
            <h3>Suhu Ruang (1-3 Hari Pertama)</h3>
            <p>Simpan roti sourdough utuh atau setengah terpotong di suhu ruang. Letakkan di dalam paper bag (kantong kertas) atau bungkus dengan kain katun bersih. <strong>Hindari kulkas (chiller)</strong> karena udara dingin chiller akan menarik kelembapan dan membuat roti cepat kering dan keras.</p>
        </div>
    </div>
    
    <div class="care-step">
        <div class="care-step-num">02</div>
        <div class="care-step-info">
            <h3>Freezer (Untuk Jangka Panjang)</h3>
            <p>Jika Anda tidak berencana menghabiskannya dalam 3 hari, iris roti terlebih dahulu (sliced). Masukkan irisan ke dalam kantong plastik ziplock yang kedap udara, lalu simpan di dalam freezer. Roti beku bisa bertahan dengan kualitas sangat baik hingga 1 bulan.</p>
        </div>
    </div>
    
    <div class="care-step">
        <div class="care-step-num">03</div>
        <div class="care-step-info">
            <h3>Cara Menghangatkan (Reheat)</h3>
            <p>Keluarkan irisan dari freezer (tidak perlu di-thawing/dicairkan dulu). Percikkan sedikit air pada permukaannya, lalu panggang di toaster, oven (180&deg;C selama 4-5 menit), atau di atas teflon tanpa minyak. Roti akan kembali hangat dengan kerak luar yang renyah sempurna, layaknya baru keluar dari oven kami.</p>
        </div>
    </div>

</section>
@endsection
