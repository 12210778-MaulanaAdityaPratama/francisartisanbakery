<!-- NAV -->
<nav class="nav" id="main-nav" role="navigation" aria-label="Navigasi utama">
    <a href="{{ url('/') }}#beranda" class="nav-logo" id="nav-logo">
    <img src="{{ asset('/img/logo.png') }}" class="logo-img" alt="Logo">
</a>
    <ul class="nav-links" id="nav-links-desktop">
        <li><a href="{{ url('/') }}#menu" id="nav-menu">Menu</a></li>
        <li><a href="{{ url('/') }}#proses" id="nav-proses">Cara Kami</a></li>
        <li><a href="{{ url('/') }}#pesan" id="nav-pesan">Pesan</a></li>
    </ul>
    <button class="nav-hamburger" id="hamburger-btn" aria-label="Buka menu" aria-expanded="false" aria-controls="mobile-menu">
        <span></span><span></span><span></span>
    </button>
</nav>

<!-- MOBILE MENU -->
<div class="mobile-menu" id="mobile-menu" role="dialog" aria-modal="true" aria-label="Menu navigasi">
    <button class="mobile-menu-close" id="mobile-menu-close" aria-label="Tutup menu">&times;</button>
    <a href="{{ url('/') }}#menu" class="mobile-nav-link" id="mobile-nav-menu">Menu</a>
    <a href="{{ url('/') }}#proses" class="mobile-nav-link" id="mobile-nav-proses">Cara Kami</a>
    <a href="{{ url('/') }}#pesan" class="mobile-nav-link" id="mobile-nav-pesan">Pesan</a>
</div>
