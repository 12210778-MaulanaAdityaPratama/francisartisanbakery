@extends('layouts.app')

@section('title', 'Francis Artisan Bakery')

@section('content')
    <!-- HERO -->
    <section class="hero" id="beranda" aria-label="Hero section">
        <div class="hero-left">
            <p class="hero-eyebrow" id="hero-eyebrow-date">Artisan Bakery, Jakarta</p>
            <h1 class="hero-headline">
                Dibuat Tangan,<br>
                <em>Setiap Pagi.</em>
            </h1>
            <p class="hero-desc">
                Roti kami keluar dari oven pukul 05.30. Dibuat dari tepung lokal, air, garam, dan waktu.
                Tidak ada pengawet. Tidak ada kompromi.
            </p>
            <a href="#menu" class="hero-cta" id="hero-cta">Lihat Menu Hari Ini</a>
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
                <span class="hero-detail-label">Mulai dari</span>
                <span class="hero-detail-value">Rp 35.000</span>
            </div>
        </div>
        <div class="hero-divider" aria-hidden="true"></div>
    </section>

    <!-- SECTION: HARI INI -->
    <section class="section-daily" id="harian" aria-label="Produk hari ini">
        <div class="daily-left">
            <span class="section-label">Selalu Segar</span>
            <h2 class="daily-headline">
                Roti dari<br>
                <em>Pagi Ini.</em>
            </h2>
            <p class="daily-desc">
                Kami memanggang dalam batch kecil. Setiap loaf diperiksa sebelum masuk rak.
                Kalau sudah habis, tidak ada tambahan hari itu.
            </p>
            <div class="daily-hours">
                <div class="daily-hours-item">
                    <span class="daily-hours-label">Buka</span>
                    <span class="daily-hours-value">06.00 WIB</span>
                </div>
                <div class="daily-hours-item">
                    <span class="daily-hours-label">Tutup</span>
                    <span class="daily-hours-value">14.00 WIB</span>
                </div>
                <div class="daily-hours-item">
                    <span class="daily-hours-label">Senin</span>
                    <span class="daily-hours-value">Libur</span>
                </div>
            </div>
        </div>

        <div class="daily-right">
            <button class="product-item" id="daily-1" onclick="openModal('sourdough')" aria-label="Lihat detail Sourdough Classic">
                <span class="product-item-num">01</span>
                <div class="product-item-info">
                    <span class="product-item-name">Sourdough Classic</span>
                    <span class="product-item-sub">Fermentasi 18 jam, krust tebal</span>
                </div>
                <span class="product-item-tag tag-amber">Tersedia</span>
            </button>
            <button class="product-item" id="daily-2" onclick="openModal('croissant')" aria-label="Lihat detail Croissant Butter">
                <span class="product-item-num">02</span>
                <div class="product-item-info">
                    <span class="product-item-name">Croissant Butter</span>
                    <span class="product-item-sub">Butter Prancis, 27 lipatan</span>
                </div>
                <span class="product-item-tag tag-amber">Tersedia</span>
            </button>
            <button class="product-item" id="daily-3" onclick="openModal('rye')" aria-label="Lihat detail Rye Dark">
                <span class="product-item-num">03</span>
                <div class="product-item-info">
                    <span class="product-item-name">Rye Dark</span>
                    <span class="product-item-sub">Gandum hitam, dense, sedikit asam</span>
                </div>
                <span class="product-item-tag tag-amber">Tersedia</span>
            </button>
            <button class="product-item" id="daily-4" onclick="openModal('focaccia')" aria-label="Lihat detail Focaccia Rosemary">
                <span class="product-item-num">04</span>
                <div class="product-item-info">
                    <span class="product-item-name">Focaccia Rosemary</span>
                    <span class="product-item-sub">Minyak zaitun extra virgin, rosemary segar</span>
                </div>
                <span class="product-item-tag">Habis Hari Ini</span>
            </button>
            <button class="product-item" id="daily-5" onclick="openModal('cinnamon')" aria-label="Lihat detail Cinnamon Roll">
                <span class="product-item-num">05</span>
                <div class="product-item-info">
                    <span class="product-item-name">Cinnamon Roll</span>
                    <span class="product-item-sub">Kayu manis Cassia, glazur susu</span>
                </div>
                <span class="product-item-tag tag-amber">Tersedia</span>
            </button>
        </div>
    </section>

    <!-- SECTION: PROSES -->
    <section class="section-process" id="proses" aria-label="Proses pembuatan">
        <div class="process-header">
            <span class="section-label">Dari Tangan ke Meja Anda</span>
            <h2 class="section-title">Begini Cara <em>Kami Bekerja</em></h2>
        </div>
        <div class="process-track" id="process-track" role="list" aria-label="Tahap proses pembuatan">
            <article class="process-card reveal" role="listitem">
                <span class="process-card-num" aria-hidden="true">01</span>
                <p class="process-card-time">Pukul 20.00, malam sebelumnya</p>
                <h3 class="process-card-title">Starter Dibangunkan</h3>
                <p class="process-card-desc">Levain kami berumur lebih dari dua tahun. Setiap malam ia diberi makan campuran tepung terigu dan gandum hitam sebelum bekerja keesokan harinya.</p>
            </article>
            <article class="process-card reveal reveal-delay-1" role="listitem">
                <span class="process-card-num" aria-hidden="true">02</span>
                <p class="process-card-time">Pukul 02.00</p>
                <h3 class="process-card-title">Autolyse dan Mixing</h3>
                <p class="process-card-desc">Tepung dan air dicampur, dibiarkan istirahat, lalu levain dan garam dimasukkan. Tidak ada mixer mesin untuk adonan sourdough kami.</p>
            </article>
            <article class="process-card reveal reveal-delay-2" role="listitem">
                <span class="process-card-num" aria-hidden="true">03</span>
                <p class="process-card-time">Pukul 02.00 sampai 05.00</p>
                <h3 class="process-card-title">Bulk Fermentation</h3>
                <p class="process-card-desc">Adonan difermentasi tiga jam dalam suhu ruang, dengan stretch-and-fold tiap 30 menit. Di sinilah rasa asam berkembang pelan.</p>
            </article>
            <article class="process-card reveal reveal-delay-3" role="listitem">
                <span class="process-card-num" aria-hidden="true">04</span>
                <p class="process-card-time">Pukul 05.00</p>
                <h3 class="process-card-title">Shaping dan Scoring</h3>
                <p class="process-card-desc">Setiap loaf dibentuk tangan, ditaruh di banneton, lalu diskor dengan lame. Pola skor bukan dekorasi, ia mengontrol arah pengembangan krust.</p>
            </article>
            <article class="process-card reveal reveal-delay-4" role="listitem">
                <span class="process-card-num" aria-hidden="true">05</span>
                <p class="process-card-time">Pukul 05.30</p>
                <h3 class="process-card-title">Panggang dan Dinginkan</h3>
                <p class="process-card-desc">Oven batu pada 240 derajat Celsius dengan uap. Setelah keluar, roti tidak boleh dipotong minimal satu jam. Proses matang berlanjut di dalam krust.</p>
            </article>
        </div>
        <p class="process-scroll-hint" aria-label="Geser untuk lanjut">geser untuk lanjut &rsaquo;</p>
    </section>

    <!-- SECTION: IDENTITAS -->
    <section class="section-identity" aria-label="Tentang toko kami">
        <div class="identity-visual">
            <span class="identity-word" aria-hidden="true">Artisan</span>
            <div class="identity-box">
                <span class="identity-box-year">2019</span>
                <span class="identity-box-label">Berdiri sejak</span>
                <span class="identity-box-sub">Jakarta Selatan</span>
            </div>
        </div>
        <div class="identity-content">
            <span class="section-label">Komitmen Kami</span>
            <h2 class="section-title">Bahan Asli, <em>Proses Jujur.</em></h2>
            <ul class="identity-points" aria-label="Nilai-nilai kami">
                <li class="identity-point reveal">
                    <div class="identity-point-marker" aria-hidden="true"></div>
                    <div class="identity-point-text">
                        <strong>Tepung dari Penggilingan Lokal</strong>
                        <span>Kami bekerja langsung dengan penggiling di Jawa Tengah yang mengirim setiap dua minggu.</span>
                    </div>
                </li>
                <li class="identity-point reveal reveal-delay-1">
                    <div class="identity-point-marker" aria-hidden="true"></div>
                    <div class="identity-point-text">
                        <strong>Tanpa Pengawet, Tanpa Improver</strong>
                        <span>Hanya empat bahan: tepung, air, garam, starter. Roti tahan dua hari di suhu ruang jika disimpan benar.</span>
                    </div>
                </li>
                <li class="identity-point reveal reveal-delay-2">
                    <div class="identity-point-marker" aria-hidden="true"></div>
                    <div class="identity-point-text">
                        <strong>Batch Kecil Setiap Hari</strong>
                        <span>Kami tidak memanggang cadangan. Jumlah yang dipanggang sama dengan yang kami perkirakan terjual hari itu.</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- SECTION: MENU UNGGULAN -->
    <section class="section-menu" id="menu" aria-label="Menu unggulan">
        <div class="menu-header">
            <div class="menu-header-left">
                <span class="section-label">Pilihan Pelanggan</span>
                <h2 class="section-title">Menu Unggulan</h2>
            </div>
            <a href="#pesan" class="menu-header-link" id="menu-order-link">Pesan Sekarang</a>
        </div>
        <div class="menu-grid" role="list" aria-label="Daftar produk unggulan">
            <article class="menu-card menu-card--large" role="listitem">
                <div class="menu-card-visual">
                    <div class="menu-card-visual-bg visual-sourdough"></div>
                    <span class="menu-card-icon">SD</span>
                </div>
                <div class="menu-card-body">
                    <span class="menu-card-category">Roti Utama</span>
                    <h3 class="menu-card-name">Sourdough Classic</h3>
                    <p class="menu-card-desc">Krust gelap, crumb terbuka, rasa asam ringan. Cocok dengan mentega, keju, atau dimakan langsung.</p>
                </div>
                <div class="menu-card-footer">
                    <span class="menu-card-price">Rp 75.000</span>
                    <button class="menu-card-order" id="order-sourdough" onclick="openModal('sourdough')">Detail</button>
                </div>
            </article>
            <article class="menu-card menu-card--medium" role="listitem">
                <div class="menu-card-visual">
                    <div class="menu-card-visual-bg visual-croissant"></div>
                    <span class="menu-card-icon">CR</span>
                </div>
                <div class="menu-card-body">
                    <span class="menu-card-category">Pastry</span>
                    <h3 class="menu-card-name">Croissant Butter</h3>
                    <p class="menu-card-desc">27 lapisan, butter Prancis, renyah di luar lembut di dalam.</p>
                </div>
                <div class="menu-card-footer">
                    <span class="menu-card-price">Rp 35.000</span>
                    <button class="menu-card-order" id="order-croissant" onclick="openModal('croissant')">Detail</button>
                </div>
            </article>
            <article class="menu-card menu-card--small" role="listitem">
                <div class="menu-card-visual">
                    <div class="menu-card-visual-bg visual-rye"></div>
                    <span class="menu-card-icon">RY</span>
                </div>
                <div class="menu-card-body">
                    <span class="menu-card-category">Whole Grain</span>
                    <h3 class="menu-card-name">Rye Dark</h3>
                    <p class="menu-card-desc">Gandum hitam penuh, untuk mereka yang serius soal rasa.</p>
                </div>
                <div class="menu-card-footer">
                    <span class="menu-card-price">Rp 85.000</span>
                    <button class="menu-card-order" id="order-rye" onclick="openModal('rye')">Detail</button>
                </div>
            </article>
            <article class="menu-card menu-card--wide" role="listitem">
                <div class="menu-card-visual">
                    <div class="menu-card-visual-bg visual-focaccia"></div>
                    <span class="menu-card-icon">FC</span>
                </div>
                <div class="menu-card-body">
                    <span class="menu-card-category">Flatbread</span>
                    <h3 class="menu-card-name">Focaccia Rosemary</h3>
                    <p class="menu-card-desc">Direndam minyak zaitun extra virgin semalam. Rosemary segar. Dijual per potong besar.</p>
                </div>
                <div class="menu-card-footer">
                    <span class="menu-card-price">Rp 40.000 / potong</span>
                    <button class="menu-card-order" id="order-focaccia" onclick="openModal('focaccia')">Detail</button>
                </div>
            </article>
            <article class="menu-card menu-card--slim" role="listitem">
                <div class="menu-card-visual">
                    <div class="menu-card-visual-bg visual-cinnamon"></div>
                    <span class="menu-card-icon">CN</span>
                </div>
                <div class="menu-card-body">
                    <span class="menu-card-category">Pastry Manis</span>
                    <h3 class="menu-card-name">Cinnamon Roll</h3>
                    <p class="menu-card-desc">Kayu manis Cassia dari Sumatra, glazur susu tipis. Tidak terlalu manis.</p>
                </div>
                <div class="menu-card-footer">
                    <span class="menu-card-price">Rp 42.000</span>
                    <button class="menu-card-order" id="order-cinnamon" onclick="openModal('cinnamon')">Detail</button>
                </div>
            </article>
        </div>
    </section>

    <!-- SECTION: PESAN -->
    <section class="section-order" id="pesan" aria-label="Form pemesanan">
        <div class="order-left">
            <span class="section-label">Pesan Lebih Mudah</span>
            <h2 class="section-title">Reservasi untuk<br><em>Besok.</em></h2>
            <p class="order-left-desc">
                Untuk memastikan roti tersedia, Anda bisa memesan sehari sebelumnya.
                Pesanan dikonfirmasi via WhatsApp sebelum pukul 21.00 malam.
            </p>
            <ul class="order-contact-list">
                <li class="order-contact-item">
                    <span class="order-contact-label">WhatsApp</span>
                    <span class="order-contact-value"><a href="https://wa.me/6281234567890" target="_blank" rel="noopener" id="wa-link">+62 812-3456-7890</a></span>
                </li>
                <li class="order-contact-item">
                    <span class="order-contact-label">Lokasi</span>
                    <span class="order-contact-value">Jl. Kemang Raya No. 12, Jakarta Selatan</span>
                </li>
                <li class="order-contact-item">
                    <span class="order-contact-label">Jam Buka</span>
                    <span class="order-contact-value">Selasa - Minggu, 06.00 - 14.00</span>
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
                        <option value="sourdough">Sourdough Classic (Rp 75.000)</option>
                        <option value="croissant">Croissant Butter (Rp 35.000)</option>
                        <option value="rye">Rye Dark (Rp 85.000)</option>
                        <option value="focaccia">Focaccia Rosemary (Rp 40.000/potong)</option>
                        <option value="cinnamon">Cinnamon Roll (Rp 42.000)</option>
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

        var modalOverlay = document.getElementById('modal-overlay');
        var modalClose   = document.getElementById('modal-close');

        function openModal(key) {
            var p = products[key];
            if (!p) return;
            document.getElementById('modal-product-category').textContent = p.category;
            document.getElementById('modal-product-name').textContent     = p.name;
            document.getElementById('modal-product-desc').textContent     = p.desc;
            document.getElementById('modal-product-price').textContent    = p.price;
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
            if (eyebrow) eyebrow.textContent = 'Artisan Bakery, Jakarta \u2014 ' + label;
        })();
</script>
@endpush
