<!-- NAV -->
<nav class="nav" id="main-nav" role="navigation" aria-label="Navigasi utama">
    <a href="{{ url('/') }}#beranda" class="nav-logo" id="nav-logo">
        <img src="{{ asset('/img/logo.png') }}" class="logo-img" alt="Logo">
    </a>
    <ul class="nav-links" id="nav-links-desktop">
        <li><a href="{{ url('/') }}#beranda" id="nav-beranda" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ url('/menu') }}" id="nav-menu" class="{{ request()->is('menu') ? 'active' : '' }}">Menu</a></li>
        <li><a href="{{ url('/hampers') }}" id="nav-hampers" class="{{ request()->is('hampers') ? 'active' : '' }}">Hampers</a></li>
        <li><a href="{{ url('/wholesale') }}" id="nav-wholesale" class="{{ request()->is('wholesale') ? 'active' : '' }}">Wholesale</a></li>
        <li><a href="{{ url('/about') }}" id="nav-about" class="{{ request()->is('about') ? 'active' : '' }}">Tentang Kami</a></li>
        <li>
            <button class="nav-btn" onclick="window.openCart && window.openCart()" aria-label="Buka Keranjang">
                🛒 Cart
            </button>
        </li>
    </ul>
    <button class="nav-hamburger" id="hamburger-btn" aria-label="Buka menu" aria-expanded="false" aria-controls="mobile-menu">
        <span></span><span></span><span></span>
    </button>
</nav>

<!-- MOBILE MENU -->
<div class="mobile-menu" id="mobile-menu" role="dialog" aria-modal="true" aria-label="Menu navigasi">
    <button class="mobile-menu-close" id="mobile-menu-close" aria-label="Tutup menu">&times;</button>
    <a href="{{ url('/') }}#beranda" class="mobile-nav-link" id="mobile-nav-beranda">Home</a>
    <a href="{{ url('/menu') }}" class="mobile-nav-link" id="mobile-nav-menu">Menu</a>
    <a href="{{ url('/store') }}" class="mobile-nav-link" id="mobile-nav-store">Store</a>
    <a href="{{ url('/about') }}" class="mobile-nav-link" id="mobile-nav-about">Tentang Kami</a>
</div>

