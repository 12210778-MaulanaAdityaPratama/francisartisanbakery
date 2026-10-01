@extends('layouts.app')

@section('title', 'Francis Artisan Bakery')

@section('content')
    @php
        $heroTitleLines = array_pad(preg_split('/\r\n|\r|\n/', $home['hero']['title'], 2), 2, null);
        $dailyTitleLines = array_pad(preg_split('/\r\n|\r|\n/', $home['daily']['title'], 2), 2, null);
        $orderTitleLines = array_pad(preg_split('/\r\n|\r|\n/', $home['order_section']['title'], 2), 2, null);
        $menuCardSizes = ['large', 'medium', 'small', 'wide', 'slim'];
        $whatsappNumber = preg_replace('/\D+/', '', $home['order_section']['whatsapp']);
    @endphp

    <!-- HERO -->
    <section class="hero" id="beranda" aria-label="Hero section">
        <div class="hero-left">
            <p class="hero-eyebrow" id="hero-eyebrow-date" data-base-label="{{ $home['hero']['eyebrow'] }}">{{ $home['hero']['eyebrow'] }}</p>
            <h1 class="hero-headline">
                {{ $heroTitleLines[0] }}
                @if (filled($heroTitleLines[1]))
                    <br><em>{{ $heroTitleLines[1] }}</em>
                @endif
            </h1>
            <p class="hero-desc">{{ $home['hero']['description'] }}</p>
            <a href="{{ $home['hero']['cta_url'] }}" class="hero-cta" id="hero-cta">{{ $home['hero']['cta_label'] }}</a>
        </div>

        <div class="hero-right" aria-hidden="true">
            <div class="bread-visual">
                <div class="bread-scene">
                    <div class="bread-table"></div>
                    <div class="bread-loaf"></div>
                    <div class="bread-baguette"></div>
                    <div class="flour" style="width:9px;height:9px;top:72%;left:18%;opacity:0.5;"></div>
                    <div class="flour" style="width:5px;height:5px;top:74%;left:28%;opacity:0.35;"></div>
                    <div class="flour" style="width:13px;height:13px;top:70%;left:63%;opacity:0.4;"></div>
                    <div class="flour" style="width:6px;height:6px;top:71%;left:75%;opacity:0.3;"></div>
                    <div class="flour" style="width:4px;height:4px;top:68%;left:50%;opacity:0.25;"></div>
                </div>
            </div>
            <div class="hero-detail">
                <span class="hero-detail-label">{{ $home['hero']['price_label'] }}</span>
                <span class="hero-detail-value">{{ $home['hero']['price_value'] }}</span>
            </div>
        </div>
        <div class="hero-divider" aria-hidden="true"></div>
    </section>

    <!-- SECTION: HARI INI -->
    <section class="section-daily" id="harian" aria-label="Produk hari ini">
        <div class="daily-left">
            <span class="section-label">{{ $home['daily']['eyebrow'] }}</span>
            <h2 class="daily-headline">
                {{ $dailyTitleLines[0] }}
                @if (filled($dailyTitleLines[1]))
                    <br><em>{{ $dailyTitleLines[1] }}</em>
                @endif
            </h2>
            <p class="daily-desc">
                {{ $home['daily']['description'] }}
            </p>
            <div class="daily-hours">
                <div class="daily-hours-item">
                    <span class="daily-hours-label">Buka</span>
                    <span class="daily-hours-value">{{ $home['daily']['open_time'] }}</span>
                </div>
                <div class="daily-hours-item">
                    <span class="daily-hours-label">Tutup</span>
                    <span class="daily-hours-value">{{ $home['daily']['close_time'] }}</span>
                </div>
                <div class="daily-hours-item">
                    <span class="daily-hours-label">{{ $home['daily']['closed_day'] }}</span>
                    <span class="daily-hours-value">Libur</span>
                </div>
            </div>
        </div>

        <div class="daily-right">
            @foreach ($home['daily']['products'] as $product)
                <button class="product-item" id="daily-{{ $loop->iteration }}" data-product="{{ $product['slug'] ?? '' }}" aria-label="Lihat detail {{ $product['name'] ?? '' }}">
                    <span class="product-item-num">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="product-item-info">
                        <span class="product-item-name">{{ $product['name'] ?? '' }}</span>
                        <span class="product-item-sub">{{ $product['description'] ?? '' }}</span>
                    </div>
                    <span class="product-item-tag {{ str_contains(strtolower($product['status'] ?? ''), 'tersedia') ? 'tag-amber' : '' }}">{{ $product['status'] ?? '' }}</span>
                </button>
            @endforeach
        </div>
    </section>

    <!-- SECTION: PROSES -->
    <section class="section-process" id="proses" aria-label="Proses pembuatan">
        <div class="process-header">
            <span class="section-label">{{ $home['process']['eyebrow'] }}</span>
            <h2 class="section-title">{{ $home['process']['title'] }}</h2>
        </div>
        <div class="process-track" id="process-track" role="list" aria-label="Tahap proses pembuatan">
            @foreach ($home['process']['steps'] as $step)
                <article class="process-card reveal" role="listitem">
                    <span class="process-card-num" aria-hidden="true">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <p class="process-card-time">{{ $step['time'] ?? '' }}</p>
                    <h3 class="process-card-title">{{ $step['title'] ?? '' }}</h3>
                    <p class="process-card-desc">{{ $step['description'] ?? '' }}</p>
                </article>
            @endforeach
        </div>
        <p class="process-scroll-hint" aria-label="Geser untuk lanjut">geser untuk lanjut &rsaquo;</p>
    </section>

    <!-- SECTION: IDENTITAS -->
    <section class="section-identity" aria-label="Tentang toko kami">
        <div class="identity-visual">
            <span class="identity-word" aria-hidden="true">Artisan</span>
            <div class="identity-box">
                <span class="identity-box-year">{{ $home['identity']['since_year'] }}</span>
                <span class="identity-box-label">Berdiri sejak</span>
                <span class="identity-box-sub">{{ $home['identity']['location'] }}</span>
            </div>
        </div>
        <div class="identity-content">
            <span class="section-label">{{ $home['identity']['eyebrow'] }}</span>
            <h2 class="section-title">{{ $home['identity']['title'] }}</h2>
            <ul class="identity-points" aria-label="Nilai-nilai kami">
                @foreach ($home['identity']['points'] as $point)
                    <li class="identity-point reveal">
                        <div class="identity-point-marker" aria-hidden="true"></div>
                        <div class="identity-point-text">
                            <strong>{{ $point['title'] ?? '' }}</strong>
                            <span>{{ $point['description'] ?? '' }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <!-- SECTION: MENU UNGGULAN -->
    <section class="section-menu" id="menu" aria-label="Menu unggulan">
        <div class="menu-header">
            <div class="menu-header-left">
                <span class="section-label">{{ $home['featured_menu']['eyebrow'] }}</span>
                <h2 class="section-title">{{ $home['featured_menu']['title'] }}</h2>
            </div>
            <a href="{{ $home['featured_menu']['cta_url'] }}" class="menu-header-link" id="menu-order-link">{{ $home['featured_menu']['cta_label'] }}</a>
        </div>
        <div class="menu-grid" role="list" aria-label="Daftar produk unggulan">
                @foreach ($home['featured_menu']['products'] as $product)
                    @php($slug = $product['slug'] ?? '')
                    <article class="menu-card menu-card--{{ $menuCardSizes[$loop->index % count($menuCardSizes)] }}" role="listitem">
                        <div class="menu-card-visual">
                            @if (filled($product['image'] ?? null))
                                <img class="menu-card-image" src="{{ asset('storage/' . $product['image']) }}" alt="{{ $product['name'] ?? '' }}" loading="lazy">
                            @else
                                <div class="menu-card-visual-bg visual-{{ \Illuminate\Support\Str::slug($slug) }}"></div>
                                <span class="menu-card-icon">{{ strtoupper(substr(preg_replace('/[^a-zA-Z0-9]/', '', $product['name'] ?? ''), 0, 2)) }}</span>
                            @endif
                        </div>
                        <div class="menu-card-body">
                            <span class="menu-card-category">{{ $product['category'] ?? '' }}</span>
                            <h3 class="menu-card-name">{{ $product['name'] ?? '' }}</h3>
                            <p class="menu-card-desc">{{ $product['description'] ?? '' }}</p>
                        </div>
                        <div class="menu-card-footer">
                            <span class="menu-card-price">Rp.{{ number_format($product['price'] ?? 0, 0, ',', '.') }}</span>
                            <button class="menu-card-order" id="order-{{ $slug }}" data-product="{{ $slug }}">Detail</button>
                        </div>
                    </article>
                @endforeach
        </div>
    </section>

    <!-- SECTION: PESAN -->
    <section class="section-order" id="pesan" aria-label="Form pemesanan">
        <div class="order-left">
            <span class="section-label">{{ $home['order_section']['eyebrow'] }}</span>
            <h2 class="section-title">
                {{ $orderTitleLines[0] }}
                @if (filled($orderTitleLines[1]))
                    <br><em>{{ $orderTitleLines[1] }}</em>
                @endif
            </h2>
            <p class="order-left-desc">
                {{ $home['order_section']['description'] }}
            </p>
            <ul class="order-contact-list">
                <li class="order-contact-item">
                    <span class="order-contact-label">WhatsApp</span>
                    <span class="order-contact-value"><a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" rel="noopener" id="wa-link">{{ $home['order_section']['whatsapp'] }}</a></span>
                </li>
                <li class="order-contact-item">
                    <span class="order-contact-label">Lokasi</span>
                    <span class="order-contact-value">{{ $home['order_section']['address'] }}</span>
                </li>
                <li class="order-contact-item">
                    <span class="order-contact-label">Jam Buka</span>
                    <span class="order-contact-value">{{ $home['order_section']['business_hours'] }}</span>
                </li>
            </ul>
        </div>

        <div class="order-right">
            <p class="order-form-title">Kirim pesanan Anda</p>
            <form id="order-form" novalidate aria-label="Formulir pemesanan roti">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="form-name">Nama</label>
                        <input class="form-input" type="text" id="form-name" name="name" placeholder="Nama Anda" required autocomplete="name">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="form-phone">WhatsApp</label>
                        <input class="form-input" type="tel" id="form-phone" name="phone" placeholder="08xx-xxxx-xxxx" required autocomplete="tel">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="form-product">Produk</label>
                    <select class="form-select" id="form-product" name="product" required>
                        <option value="" disabled selected>Pilih produk</option>
                        @foreach ($home['featured_menu']['products'] as $product)
                            <option value="{{ $product['slug'] ?? '' }}">{{ $product['name'] ?? '' }} ({{ $product['price'] ?? '' }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="form-date">Tanggal Ambil</label>
                    <input class="form-input" type="date" id="form-date" name="date" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="form-note">Catatan (opsional)</label>
                    <textarea class="form-textarea" id="form-note" name="note" placeholder="Misalnya: 2 loaf, minta diiris, atau alergi tertentu"></textarea>
                </div>
                <button type="submit" class="form-submit" id="form-submit-btn">Kirim Pesanan</button>
                <div class="form-feedback" id="form-feedback" role="alert" aria-live="polite">
                    <p id="form-feedback-msg"></p>
                </div>
            </form>
        </div>
    </section>

    <!-- MODAL -->
    <div class="modal-overlay" id="modal-overlay" role="dialog" aria-modal="true" aria-labelledby="modal-product-name">
        <div class="modal" id="modal-box">
            <button class="modal-close" id="modal-close" aria-label="Tutup detail produk">&times;</button>
            <p class="modal-category" id="modal-product-category"></p>
            <h2 class="modal-name" id="modal-product-name"></h2>
            <p class="modal-desc" id="modal-product-desc"></p>
            <div class="modal-details" id="modal-product-details"></div>
            <p class="modal-price" id="modal-product-price"></p>
            <a href="#pesan" class="modal-cta" id="modal-order-cta">Pesan Produk Ini</a>
        </div>
    </div>
@endsection

@push('scripts')
<script>
        var products = {
            sourdough: {
                category: 'Roti Utama',
                name: 'Sourdough Classic',
                desc: 'Loaf andalan kami sejak pertama buka. Dibuat dengan starter levain berumur dua tahun, fermentasi bulk 18 jam, dipanggang di atas batu. Krust tebal, crumb terbuka, rasa asam ringan. Cocok dimakan dengan mentega tawar, selai almond, atau irisan tomat segar.',
                details: [
                    { label: 'Bahan', value: 'Tepung, air, garam, starter' },
                    { label: 'Fermentasi', value: '18 jam total' },
                    { label: 'Berat', value: '800-900 gram' },
                    { label: 'Tahan', value: '2-3 hari suhu ruang' }
                ],
                price: 'Rp 75.000 per loaf'
            },
            croissant: {
                category: 'Pastry',
                name: 'Croissant Butter',
                desc: 'Dibuat dengan teknik laminating: 27 lapisan adonan dan butter ditumpuk pelan. Butter yang kami pakai adalah Prancis, kandungan lemak tinggi. Lembaran krust renyah, interior berongga dan lembut, aroma butter yang tidak pelit.',
                details: [
                    { label: 'Bahan', value: 'Tepung, butter Prancis, susu, ragi, gula, garam' },
                    { label: 'Lapisan', value: '27 lapisan' },
                    { label: 'Berat', value: '90-110 gram per buah' },
                    { label: 'Tahan', value: 'Terbaik dimakan hari yang sama' }
                ],
                price: 'Rp 35.000 per buah'
            },
            rye: {
                category: 'Whole Grain',
                name: 'Rye Dark',
                desc: 'Roti gandum hitam dengan proporsi gandum hingga 70%. Teksturnya padat dan lembab, rasa asam lebih kuat. Ini bukan roti untuk semua orang, tapi untuk mereka yang menghargai karakter. Bagus dipasangkan dengan keju keras atau ikan asap.',
                details: [
                    { label: 'Bahan', value: 'Tepung gandum hitam, tepung terigu, air, garam, starter' },
                    { label: 'Gandum hitam', value: '70%' },
                    { label: 'Berat', value: '700-750 gram' },
                    { label: 'Tahan', value: '4-5 hari suhu ruang' }
                ],
                price: 'Rp 85.000 per loaf'
            },
            focaccia: {
                category: 'Flatbread',
                name: 'Focaccia Rosemary',
                desc: 'Adonan direndam minyak zaitun semalam, membuat krust bawah renyah dan wangi. Rosemary segar dari tanaman di depan toko. Ditaburi fleur de sel sebelum masuk oven. Dijual per potong besar, cukup untuk sarapan dua orang.',
                details: [
                    { label: 'Bahan', value: 'Tepung, air, minyak zaitun, rosemary, fleur de sel, ragi' },
                    { label: 'Minyak', value: 'Extra virgin, cold press' },
                    { label: 'Ukuran', value: 'Potong 15x15 cm' },
                    { label: 'Terbaik', value: 'Hangat, hari yang sama' }
                ],
                price: 'Rp 40.000 per potong'
            },
            cinnamon: {
                category: 'Pastry Manis',
                name: 'Cinnamon Roll',
                desc: 'Menggunakan kayu manis Cassia dari Sumatra, bukan kayu manis impor yang rasanya lebih tipis. Lapisan dalam tebal dengan gula merah dan kayu manis, ditutupi glazur susu. Tidak terlalu manis, cocok menemani kopi hitam pagi.',
                details: [
                    { label: 'Bahan', value: 'Tepung, butter, susu, telur, kayu manis, gula merah' },
                    { label: 'Kayu manis', value: 'Cassia dari Sumatra' },
                    { label: 'Berat', value: '130-150 gram per buah' },
                    { label: 'Tahan', value: '1 hari suhu ruang' }
                ],
                price: 'Rp 42.000 per buah'
            }
        };

        @foreach ($home['featured_menu']['products'] as $menuProduct)
            var menuProductSlug = @js($menuProduct['slug'] ?? '');
            products[menuProductSlug] = Object.assign({}, products[menuProductSlug] || { details: [] }, {
                category: @js($menuProduct['category'] ?? ''),
                name: @js($menuProduct['name'] ?? ''),
                desc: @js($menuProduct['description'] ?? ''),
                price: @js($menuProduct['price'] ?? ''),
            });
        @endforeach

        var modalOverlay = document.getElementById('modal-overlay');
        var modalClose   = document.getElementById('modal-close');

        function openModal(key) {
            var p = products[key];
            if (!p) return;
            document.getElementById('modal-product-category').textContent = p.category;
            document.getElementById('modal-product-name').textContent     = p.name;
            document.getElementById('modal-product-desc').textContent     = p.desc;
            document.getElementById('modal-product-price').textContent    = 'Rp ' + p.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            var detailsEl = document.getElementById('modal-product-details');
            detailsEl.innerHTML = p.details.map(function(d) {
                return '<div class="modal-detail-item"><p class="modal-detail-label">' + d.label + '</p><p class="modal-detail-value">' + d.value + '</p></div>';
            }).join('');
            modalOverlay.classList.add('open');
            modalClose.focus();
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modalOverlay.classList.remove('open');
            document.body.style.overflow = '';
        }

        document.querySelectorAll('[data-product]').forEach(function(button) {
            button.addEventListener('click', function() {
                openModal(button.dataset.product);
            });
        });

        modalClose.addEventListener('click', closeModal);
        modalOverlay.addEventListener('click', function(e) {
            if (e.target === modalOverlay) closeModal();
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modalOverlay.classList.contains('open')) closeModal();
        });

        var orderForm     = document.getElementById('order-form');
        var formFeedback  = document.getElementById('form-feedback');
        var formMsg       = document.getElementById('form-feedback-msg');
        var formSubmitBtn = document.getElementById('form-submit-btn');
        var dateInput     = document.getElementById('form-date');

        var tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        dateInput.min = tomorrow.toISOString().split('T')[0];

        orderForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var name    = document.getElementById('form-name').value.trim();
            var phone   = document.getElementById('form-phone').value.trim();
            var product = document.getElementById('form-product').value;
            var date    = dateInput.value;

            if (!name || !phone || !product || !date) {
                formFeedback.classList.add('visible');
                formMsg.textContent = 'Mohon isi semua kolom yang wajib diisi sebelum mengirim.';
                formMsg.style.color = '#FF9966';
                return;
            }

            formSubmitBtn.textContent = 'Mengirim...';
            formSubmitBtn.disabled    = true;

            setTimeout(function() {
                formFeedback.classList.add('visible');
                formMsg.textContent = 'Pesanan Anda diterima. Kami akan konfirmasi via WhatsApp sebelum pukul 21.00 malam ini.';
                formMsg.style.color = 'var(--cream)';
                formSubmitBtn.textContent = 'Pesanan Terkirim';
                formSubmitBtn.style.background = 'rgba(200,134,10,0.5)';
                orderForm.reset();
            }, 1200);
        });

        // TANGGAL DI HERO
        (function() {
            var days   = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
            var months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
            var now    = new Date();
            var label  = days[now.getDay()] + ', ' + now.getDate() + ' ' + months[now.getMonth()] + ' ' + now.getFullYear();
            var eyebrow = document.getElementById('hero-eyebrow-date');
            if (eyebrow) {
                var baseLabel = eyebrow.dataset.baseLabel || eyebrow.textContent;
                eyebrow.textContent = baseLabel + ' \u2014 ' + label;
            }
        })();
</script>
@endpush
