<!-- FOOTER -->
<footer class="footer" aria-label="Footer">
    <div class="footer-inner">
        <div>
            <p class="footer-logo">Karta Roti</p>
            <p class="footer-tagline">Roti artisan buatan tangan sejak 2019. Buka Selasa sampai Minggu, dari pagi sampai roti habis.</p>
        </div>
        <nav class="footer-nav" aria-label="Navigasi footer">
            <div class="footer-nav-col">
                <p class="footer-nav-col-title">Toko</p>
                <ul>
                    <li><a href="{{ url('/') }}#menu" id="footer-menu">Menu</a></li>
                    <li><a href="{{ url('/') }}#proses" id="footer-proses">Cara Kami</a></li>
                    <li><a href="{{ url('/') }}#pesan" id="footer-pesan">Pesan</a></li>
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
        <p class="footer-copy">&copy; {{ date('Y') }} Karta Roti. Dibuat dengan <span>&hearts;</span> di Jakarta.</p>
        <p class="footer-copy">Jl. Kemang Raya No. 12, Jakarta Selatan</p>
    </div>
</footer>
