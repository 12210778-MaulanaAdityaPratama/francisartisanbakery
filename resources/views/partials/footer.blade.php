<!-- FOOTER -->
<footer class="footer" aria-label="Footer">
    <div class="footer-inner">
        <div>
            <p class="footer-logo">Francis Artisan Bakery</p>
            <p class="footer-tagline">Roti artisan buatan tangan sejak 2019. Buka Selasa sampai Minggu, dari pagi sampai roti habis.</p>
        </div>
        <nav class="footer-nav" aria-label="Navigasi footer">
            <div class="footer-nav-col">
                <p class="footer-nav-col-title">Toko</p>
                <ul>
                    <li><a href="{{ url('/') }}#beranda" id="footer-beranda">Home</a></li>
                    <li><a href="{{ url('/menu') }}" id="footer-menu">Menu</a></li>
                    <li><a href="{{ url('/store') }}" id="footer-store">Store & Lokasi</a></li>
                    <li><a href="{{ url('/about') }}" id="footer-about">Tentang Kami</a></li>
                   
                </ul>
            </div>
            <div class="footer-nav-col">
                <p class="footer-nav-col-title">Kontak</p>
                <ul>
                    <li><a href="https://wa.me/6281234567890" target="_blank" rel="noopener" id="footer-wa">WhatsApp</a></li>
                    <li><a href="https://instagram.com" target="_blank" rel="noopener" id="footer-ig">Instagram</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="footer-bottom">
        <p class="footer-copy">&copy; {{ date('Y') }} Francis Artisan Bakery</p>
        <p class="footer-copy">Jl. Nusantara Timur 10 Blok d No.47, RT.3/RW.17, Sunter Agung, Kec. Tj. Priok, Jkt Utara, Daerah Khusus Ibukota Jakarta 14350</p>
    </div>
</footer>
