<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Francis Artisan Bakery')</title>
    <meta name="description" content="@yield('meta_description', 'Roti artisan buatan tangan setiap hari sejak pukul 5 pagi. Dibuat dari tepung pilihan, tanpa pengawet, dengan teknik fermentasi alami.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --brown-deep:  #2C1A0E;
            --brown-mid:   #4A2E1A;
            --brown-light: #7A4F30;
            --cream:       #F5ECD7;
            --cream-dark:  #E8D5B0;
            --amber:       #C8860A;
            --amber-light: #E8A020;
            --white:       #FDFAF5;
            --ff-serif: 'Playfair Display', Georgia, serif;
            --ff-sans:  'Lato', system-ui, sans-serif;
        }

        html { scroll-behavior: smooth; }

        body {
            background: var(--white);
            color: var(--brown-deep);
            font-family: var(--ff-sans);
            font-size: 1rem;
            line-height: 1.7;
            overflow-x: hidden;
        }

        :focus-visible { outline: 2.5px solid var(--amber); outline-offset: 3px; }

        /* logo-img */
        .logo-img {
            height: 70px;
            width: auto;
            object-fit: contain;
            display: block;
            transition: height 0.3s ease;
            mix-blend-mode: multiply; /* Menghilangkan background putih bawaan gambar logo */
        }
        /* NAV */
        .nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 2rem;
            background: transparent;
            box-shadow: none;
            backdrop-filter: blur(0px);
            -webkit-backdrop-filter: blur(0px);
            transition: background 0.3s ease, padding 0.3s ease, box-shadow 0.3s ease, backdrop-filter 0.3s ease;
        }
        .nav.scrolled {
            background: rgba(253, 250, 245, 0.95);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            box-shadow: 0 1px 0 var(--cream-dark);
            padding: 0.6rem 2rem;
        }
        .nav.scrolled .logo-img {
            height: 32px;
        }
        .nav-logo {
            font-family: var(--ff-serif); font-size: 1.35rem; font-weight: 700;
            color: var(--white); text-decoration: none; letter-spacing: 0.02em;
            transition: color 0.4s;
        }
        .nav.scrolled .nav-logo { color: var(--brown-deep); }
        .nav-links { display: flex; list-style: none; gap: 2rem; }
        .nav-links a, .nav-links .nav-btn {
            font-family: inherit; font-size: 0.8rem; font-weight: 700; letter-spacing: 0.1em;
            text-transform: uppercase; color: rgba(253,250,245,0.85);
            text-decoration: none; position: relative; transition: color 0.3s;
            background: none; border: none; cursor: pointer; padding: 0;
            display: flex; align-items: center; gap: 0.5rem;
        }
        .nav-links a.active, .nav-links .nav-btn.active {
            color: var(--amber-light);
        }
        .nav-links a::after, .nav-links .nav-btn::after {
            content: ''; position: absolute; bottom: -3px; left: 0;
            width: 0; height: 1.5px; background: var(--amber);
            transition: width 0.3s;
        }
        .nav-links a:hover::after, .nav-links a:focus-visible::after, .nav-links a.active::after,
        .nav-links .nav-btn:hover::after, .nav-links .nav-btn:focus-visible::after { width: 100%; }
        .nav.scrolled .nav-links a, .nav.scrolled .nav-links .nav-btn { color: var(--brown-mid); }
        .nav.scrolled .nav-links a.active, .nav.scrolled .nav-links .nav-btn.active { color: var(--amber); }
        .nav-hamburger {
            display: none; flex-direction: column; gap: 5px;
            background: none; border: none; cursor: pointer; padding: 4px;
        }
        .nav-hamburger span {
            display: block; width: 24px; height: 2px; background: var(--white);
            transition: background 0.4s, transform 0.3s;
        }
        .nav.scrolled .nav-hamburger span { background: var(--brown-deep); }

        /* MOBILE MENU */
        .mobile-menu {
            display: none; position: fixed; inset: 0; background: var(--brown-deep);
            z-index: 99; flex-direction: column; align-items: center; justify-content: center;
            gap: 2rem; opacity: 0; pointer-events: none; transition: opacity 0.3s;
        }
        .mobile-menu.open { display: flex; opacity: 1; pointer-events: auto; }
        .mobile-menu a {
            font-family: var(--ff-serif); font-size: 2rem; color: var(--cream);
            text-decoration: none; font-style: italic; transition: color 0.2s;
        }
        .mobile-menu a:hover { color: var(--amber-light); }
        .mobile-menu-close {
            position: absolute; top: 1.5rem; right: 1.5rem;
            background: none; border: none; color: var(--cream); font-size: 2rem; cursor: pointer;
        }

        /* HERO */
        .hero {
            min-height: 100svh; display: grid; grid-template-columns: 1fr 1fr;
            position: relative; overflow: hidden;
        }
        .hero-left {
            background: var(--brown-deep);
            display: flex; flex-direction: column; justify-content: flex-end;
            padding: 10rem 4rem 6rem; position: relative; z-index: 2;
        }
        .hero-left::before {
            content: ''; position: absolute; inset: 0;
            background-image: repeating-linear-gradient(-45deg, transparent, transparent 20px, rgba(200,134,10,0.03) 20px, rgba(200,134,10,0.03) 21px);
            pointer-events: none;
        }
        .hero-eyebrow {
            font-size: 0.7rem; font-weight: 700; letter-spacing: 0.2em;
            text-transform: uppercase; color: var(--amber); margin-bottom: 1rem;
        }
        .hero-headline {
            font-family: var(--ff-serif);
            font-size: clamp(3rem, 5vw, 5.5rem); font-weight: 400;
            line-height: 1.05; color: var(--cream); margin-bottom: 2rem;
        }
        .hero-headline em { font-style: italic; color: var(--amber-light); }
        .hero-desc {
            font-size: 1rem; color: rgba(245,236,215,0.7);
            max-width: 36ch; margin-bottom: 4rem; line-height: 1.8;
        }
        .hero-cta {
            display: inline-block; padding: 0.85rem 2.25rem;
            background: var(--amber); color: var(--brown-deep);
            font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em;
            text-transform: uppercase; text-decoration: none; align-self: flex-start;
            transition: background 0.25s, transform 0.2s;
        }
        .hero-cta:hover { background: var(--amber-light); transform: translateY(-2px); }
        .hero-right {
            position: relative; overflow: hidden;
            background: linear-gradient(160deg, #3D2210 0%, #1A0D05 100%);
        }
        .bread-visual {
            position: absolute; inset: 0;
            display: flex; align-items: center; justify-content: center;
        }
        .bread-scene {
            position: relative; width: 80%; max-width: 380px; aspect-ratio: 1;
        }
        /* Meja */
        .bread-table {
            position: absolute; bottom: 10%; left: 0; right: 0; height: 30%;
            background: linear-gradient(180deg, #3D2210 0%, #1A0D05 100%);
            border-radius: 4px 4px 0 0;
        }
        /* Loaf besar */
        .bread-loaf {
            position: absolute; left: 8%; bottom: 35%; width: 84%; height: 45%;
            background: linear-gradient(150deg, #C8860A 0%, #8B4513 45%, #5C2E0A 100%);
            border-radius: 45% 45% 40% 40% / 55% 55% 35% 35%;
            box-shadow: 0 12px 40px rgba(0,0,0,0.5), inset 0 -8px 20px rgba(0,0,0,0.25), inset 0 10px 30px rgba(200,134,10,0.2);
        }
        .bread-loaf::before {
            content: ''; position: absolute; top: 18%; left: 12%; width: 76%; height: 55%;
            border-top: 2.5px solid rgba(232,160,32,0.45); border-left: 1.5px solid rgba(232,160,32,0.25);
            border-radius: 40% 40% 0 0; transform: rotate(-7deg);
        }
        .bread-loaf::after {
            content: ''; position: absolute; top: 28%; left: 22%; width: 55%; height: 38%;
            border-top: 1.5px solid rgba(232,160,32,0.3); border-radius: 40% 40% 0 0;
            transform: rotate(5deg);
        }
        /* Baguette kecil di samping */
        .bread-baguette {
            position: absolute; left: 62%; bottom: 33%; width: 28%; height: 16%;
            background: linear-gradient(90deg, #A06030 0%, #C8860A 50%, #7A4520 100%);
            border-radius: 50%;
            transform: rotate(-20deg);
            box-shadow: 0 4px 16px rgba(0,0,0,0.4);
        }
        /* Tepung dekoratif */
        .flour { position: absolute; border-radius: 50%; background: rgba(245,236,215,0.18); }
        .hero-detail {
            position: absolute; bottom: 1.5rem; right: 1.5rem; text-align: right;
        }
        .hero-detail-label {
            display: block; font-size: 0.65rem; letter-spacing: 0.15em;
            text-transform: uppercase; color: rgba(245,236,215,0.45); margin-bottom: 0.2rem;
        }
        .hero-detail-value {
            font-family: var(--ff-serif); font-size: 1.25rem;
            color: var(--cream); font-style: italic;
        }
        .hero-divider {
            position: absolute; top: 15%; bottom: 15%; left: 50%;
            width: 1px; background: linear-gradient(180deg, transparent, var(--amber) 30%, var(--amber) 70%, transparent);
            opacity: 0.35; z-index: 3;
        }

        /* SECTION: HARI INI */
        .section-daily {
            display: grid; grid-template-columns: 1fr 1.2fr;
        }
        .daily-left {
            background: var(--brown-deep);
            padding: 6rem 4rem; display: flex; flex-direction: column;
            justify-content: center; position: relative; overflow: hidden;
        }
        .daily-left::before {
            content: ''; position: absolute; inset: 0;
            background-image: repeating-linear-gradient(-45deg, transparent, transparent 20px, rgba(200,134,10,0.04) 20px, rgba(200,134,10,0.04) 21px);
        }
        .section-label {
            font-size: 0.7rem; font-weight: 700; letter-spacing: 0.25em;
            text-transform: uppercase; color: var(--amber); margin-bottom: 1rem; display: block;
        }
        .daily-headline {
            font-family: var(--ff-serif); font-size: clamp(2.5rem, 4vw, 4rem);
            font-weight: 400; line-height: 1.1; color: var(--cream); margin-bottom: 2rem;
        }
        .daily-headline em { font-style: italic; color: var(--amber-light); display: block; }
        .daily-desc { font-size: 0.9rem; color: rgba(245,236,215,0.65); max-width: 38ch; line-height: 1.8; }
        .daily-hours {
            margin-top: 4rem; border-top: 1px solid rgba(200,134,10,0.3);
            padding-top: 2rem; display: flex; gap: 3rem;
        }
        .daily-hours-item { display: flex; flex-direction: column; gap: 4px; }
        .daily-hours-label { font-size: 0.65rem; letter-spacing: 0.15em; text-transform: uppercase; color: rgba(245,236,215,0.4); }
        .daily-hours-value { font-family: var(--ff-serif); font-size: 1.1rem; color: var(--cream); font-style: italic; }
        .daily-right { padding: 5rem 4rem; display: flex; flex-direction: column; justify-content: center; gap: 0.25rem; }

        /* PRODUK ITEM */
        .product-item {
            display: grid; grid-template-columns: auto 1fr auto;
            align-items: center; gap: 1rem;
            padding: 1.1rem 0; border: none; background: none;
            border-bottom: 1px solid var(--cream-dark); width: 100%;
            text-align: left; cursor: pointer; transition: background 0.15s;
        }
        .product-item:last-child { border-bottom: none; }
        .product-item:hover .product-item-name { color: var(--amber); }
        .product-item-num { font-family: var(--ff-serif); font-size: 0.75rem; color: var(--amber); font-style: italic; min-width: 1.5rem; }
        .product-item-info { display: flex; flex-direction: column; gap: 2px; }
        .product-item-name { font-family: var(--ff-serif); font-size: 1.15rem; font-weight: 600; color: var(--brown-deep); transition: color 0.2s; }
        .product-item-sub { font-size: 0.8rem; color: var(--brown-light); }
        .product-item-tag {
            display: inline-block; padding: 0.2rem 0.6rem;
            background: var(--brown-deep); color: var(--cream);
            font-size: 0.65rem; letter-spacing: 0.12em; text-transform: uppercase;
            font-weight: 700; border-radius: 2px; white-space: nowrap;
        }
        .product-item-tag.tag-amber { background: var(--amber); color: var(--brown-deep); }

        /* SECTION: PROSES */
        .section-process { background: var(--brown-deep); padding: 6rem 0; overflow: hidden; }
        .process-header { text-align: center; padding: 0 2rem 4rem; }
        .section-title {
            font-family: var(--ff-serif); font-size: clamp(2rem, 3.5vw, 3.5rem);
            font-weight: 400; line-height: 1.2;
        }
        .section-title em { font-style: italic; color: var(--amber-light); }
        .process-header .section-title { color: var(--cream); }
        .process-track {
            display: flex; gap: 1rem; padding: 0 4rem 2rem;
            overflow-x: auto; scroll-snap-type: x mandatory;
            scrollbar-width: none; -webkit-overflow-scrolling: touch;
        }
        .process-track::-webkit-scrollbar { display: none; }
        .process-card {
            flex: 0 0 320px; scroll-snap-align: start;
            border: 1px solid rgba(200,134,10,0.2);
            padding: 4rem 2rem; position: relative;
            background: rgba(200,134,10,0.03); transition: border-color 0.3s;
        }
        .process-card:hover { border-color: rgba(200,134,10,0.5); }
        .process-card-num {
            position: absolute; top: 1rem; right: 2rem;
            font-family: var(--ff-serif); font-size: 5rem; font-weight: 700;
            color: rgba(200,134,10,0.08); line-height: 1; pointer-events: none; user-select: none;
        }
        .process-card-time { font-size: 0.7rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--amber); margin-bottom: 1rem; }
        .process-card-title { font-family: var(--ff-serif); font-size: 1.5rem; font-weight: 600; color: var(--cream); margin-bottom: 0.75rem; line-height: 1.2; }
        .process-card-desc { font-size: 0.875rem; color: rgba(245,236,215,0.6); line-height: 1.8; }
        .process-scroll-hint { text-align: center; padding-top: 1rem; font-size: 0.75rem; color: rgba(245,236,215,0.3); letter-spacing: 0.1em; }

        /* SECTION: IDENTITAS */
        .section-identity { display: grid; grid-template-columns: 1.5fr 1fr; min-height: 60vh; }
        .identity-visual {
            background: var(--cream-dark); position: relative; overflow: hidden;
            display: flex; align-items: center; justify-content: center;
        }
        .identity-word {
            font-family: var(--ff-serif); font-size: clamp(7rem, 16vw, 16rem);
            font-weight: 700; color: rgba(44,26,14,0.07); white-space: nowrap;
            position: absolute; user-select: none; pointer-events: none;
            letter-spacing: -0.04em; font-style: italic;
        }
        .identity-box {
            position: relative; z-index: 2; width: 200px; height: 200px;
            border: 2px solid var(--brown-light);
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            text-align: center; gap: 0.4rem; background: var(--white);
            box-shadow: 8px 8px 0 var(--brown-deep);
        }
        .identity-box-year { font-family: var(--ff-serif); font-size: 3.5rem; font-weight: 700; color: var(--brown-deep); line-height: 1; }
        .identity-box-label { font-size: 0.65rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--brown-light); }
        .identity-box-sub { font-family: var(--ff-serif); font-size: 0.9rem; font-style: italic; color: var(--brown-mid); }
        .identity-content { background: var(--white); padding: 6rem 4rem; display: flex; flex-direction: column; justify-content: center; }
        .identity-content .section-label { color: var(--brown-light); }
        .identity-content .section-title { color: var(--brown-deep); font-size: clamp(1.75rem, 3vw, 2.75rem); margin-bottom: 2rem; }
        .identity-points { list-style: none; display: flex; flex-direction: column; gap: 1.5rem; }
        .identity-point { display: flex; gap: 1rem; align-items: flex-start; }
        .identity-point-marker {
            width: 22px; height: 22px; flex-shrink: 0; margin-top: 2px;
            border: 1.5px solid var(--amber); display: flex; align-items: center; justify-content: center;
        }
        .identity-point-marker::before { content: ''; width: 8px; height: 8px; background: var(--amber); }
        .identity-point-text strong { display: block; font-family: var(--ff-serif); font-size: 1rem; font-weight: 600; color: var(--brown-deep); margin-bottom: 2px; }
        .identity-point-text span { font-size: 0.85rem; color: var(--brown-light); line-height: 1.6; }

        /* SECTION: MENU */
        .section-menu { background: var(--cream); padding: 6rem 4rem; }
        .menu-header {
            display: flex; justify-content: space-between; align-items: flex-end;
            margin-bottom: 3rem; border-bottom: 1px solid var(--cream-dark); padding-bottom: 2rem;
        }
        .menu-header-left .section-label { color: var(--brown-light); }
        .menu-header-left .section-title { color: var(--brown-deep); font-size: clamp(1.75rem, 3vw, 2.75rem); }
        .menu-header-link {
            font-size: 0.8rem; font-weight: 700; letter-spacing: 0.1em;
            text-transform: uppercase; color: var(--brown-mid); text-decoration: none;
            border-bottom: 1.5px solid var(--amber); padding-bottom: 2px; transition: color 0.2s;
        }
        .menu-header-link:hover { color: var(--amber); }
        .menu-grid { display: grid; grid-template-columns: repeat(12, 1fr); gap: 1rem; }
        .menu-card { background: var(--white); overflow: hidden; transition: transform 0.3s; display: flex; flex-direction: column; }
        .menu-card:hover { transform: translateY(-4px); }
        .menu-card--large  { grid-column: span 5; }
        .menu-card--medium { grid-column: span 4; }
        .menu-card--small  { grid-column: span 3; }
        .menu-card--wide   { grid-column: span 7; }
        .menu-card--slim   { grid-column: span 5; }
        .menu-card-visual { height: 180px; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; }
        .menu-card--large .menu-card-visual  { height: 240px; }
        .menu-card--wide .menu-card-visual   { height: 200px; }
        .menu-card-visual-bg { position: absolute; inset: 0; }
        .menu-card-image { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; }
        .visual-sourdough  { background: linear-gradient(135deg, #6B3B1A 0%, #3D2210 100%); }
        .visual-croissant  { background: linear-gradient(135deg, #8B6340 0%, #5C3D20 100%); }
        .visual-rye        { background: linear-gradient(135deg, #4A3520 0%, #2C1E10 100%); }
        .visual-focaccia   { background: linear-gradient(135deg, #7A5C30 0%, #4A3520 100%); }
        .visual-cinnamon   { background: linear-gradient(135deg, #9B5A20 0%, #5C3010 100%); }
        .menu-card-icon {
            position: relative; z-index: 2;
            font-family: var(--ff-serif); font-size: 2.5rem;
            color: rgba(245,236,215,0.15); font-style: italic; font-weight: 700;
        }
        .menu-card-body { padding: 1rem 1.25rem; flex: 1; display: flex; flex-direction: column; gap: 4px; }
        .menu-card-category { font-size: 0.65rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--amber); font-weight: 700; }
        .menu-card-name { font-family: var(--ff-serif); font-size: 1.2rem; font-weight: 600; color: var(--brown-deep); line-height: 1.2; }
        .menu-card-desc { font-size: 0.8rem; color: var(--brown-light); line-height: 1.6; flex: 1; }
        .menu-card-footer { display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 1.25rem; border-top: 1px solid var(--cream-dark); }
        .menu-card-price { font-family: var(--ff-serif); font-size: 1.05rem; color: var(--brown-deep); font-style: italic; }
        .menu-card-order {
            font-size: 0.7rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;
            color: var(--brown-mid); background: none; border: 1.5px solid var(--brown-mid);
            padding: 0.4rem 0.9rem; cursor: pointer; transition: background 0.2s, color 0.2s, border-color 0.2s;
        }
        .menu-card-order:hover { background: var(--brown-deep); color: var(--cream); border-color: var(--brown-deep); }

        /* SECTION: PESAN */
        .section-order { display: grid; grid-template-columns: 1fr 1fr; }
        .order-left { background: var(--amber); padding: 6rem 4rem; display: flex; flex-direction: column; justify-content: center; }
        .order-left .section-label { color: rgba(44,26,14,0.6); }
        .order-left .section-title { color: var(--brown-deep); font-size: clamp(2rem, 3.5vw, 3.5rem); margin-bottom: 2rem; }
        .order-left-desc { font-size: 0.9rem; color: rgba(44,26,14,0.75); max-width: 42ch; line-height: 1.8; margin-bottom: 3rem; }
        .order-contact-list { list-style: none; display: flex; flex-direction: column; gap: 1rem; }
        .order-contact-item { display: flex; gap: 1rem; align-items: center; }
        .order-contact-label { font-size: 0.7rem; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(44,26,14,0.55); min-width: 70px; }
        .order-contact-value { font-family: var(--ff-serif); font-size: 1rem; color: var(--brown-deep); font-style: italic; }
        .order-contact-value a { color: inherit; text-decoration: none; border-bottom: 1px solid rgba(44,26,14,0.3); transition: border-color 0.2s; }
        .order-contact-value a:hover { border-color: var(--brown-deep); }
        .order-right { background: var(--brown-deep); padding: 6rem 4rem; }
        .order-form-title { font-family: var(--ff-serif); font-size: 1.5rem; font-weight: 400; color: var(--cream); margin-bottom: 3rem; font-style: italic; }
        .form-group { margin-bottom: 1.25rem; }
        .form-label { display: block; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: rgba(245,236,215,0.5); margin-bottom: 6px; }
        .form-input, .form-select, .form-textarea {
            width: 100%; padding: 0.75rem 1rem;
            background: rgba(245,236,215,0.06); border: 1px solid rgba(200,134,10,0.25);
            color: var(--cream); font-family: var(--ff-sans); font-size: 0.9rem;
            outline: none; transition: border-color 0.2s; border-radius: 0; -webkit-appearance: none;
        }
        .form-input::placeholder, .form-textarea::placeholder { color: rgba(245,236,215,0.3); }
        .form-input:focus, .form-select:focus, .form-textarea:focus { border-color: var(--amber); }
        .form-select option { background: var(--brown-deep); color: var(--cream); }
        .form-textarea { resize: vertical; min-height: 90px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .form-submit {
            margin-top: 0.5rem; width: 100%; padding: 0.9rem;
            background: var(--amber); color: var(--brown-deep); border: none;
            font-family: var(--ff-sans); font-size: 0.875rem; font-weight: 700;
            letter-spacing: 0.1em; text-transform: uppercase; cursor: pointer;
            transition: background 0.25s, transform 0.2s;
        }
        .form-submit:hover { background: var(--amber-light); transform: translateY(-2px); }
        .form-submit:active { transform: translateY(0); }
        .form-feedback { display: none; margin-top: 1rem; padding: 1rem; border-left: 3px solid var(--amber); background: rgba(200,134,10,0.1); }
        .form-feedback.visible { display: block; }
        .form-feedback p { font-size: 0.875rem; color: var(--cream); }

        /* FOOTER */
        .footer { background: var(--brown-mid); padding: 4rem 4rem 2rem; }
        .footer-inner { display: flex; justify-content: space-between; align-items: flex-start; gap: 4rem; border-bottom: 1px solid rgba(200,134,10,0.2); padding-bottom: 4rem; margin-bottom: 2rem; }
        .footer-logo { font-family: var(--ff-serif); font-size: 1.5rem; font-weight: 700; color: var(--cream); margin-bottom: 0.75rem; }
        .footer-tagline { font-size: 0.85rem; color: rgba(245,236,215,0.5); line-height: 1.7; max-width: 260px; }
        .footer-nav { display: flex; gap: 5rem; }
        .footer-nav-col-title { font-size: 0.7rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--amber); margin-bottom: 1rem; }
        .footer-nav-col ul { list-style: none; display: flex; flex-direction: column; gap: 10px; }
        .footer-nav-col ul a { font-size: 0.875rem; color: rgba(245,236,215,0.6); text-decoration: none; transition: color 0.2s; }
        .footer-nav-col ul a:hover { color: var(--cream); }
        .footer-bottom { display: flex; justify-content: space-between; align-items: center; }
        .footer-copy { font-size: 0.75rem; color: rgba(245,236,215,0.35); }
        .footer-copy span { color: var(--amber); }

        /* MODAL */
        .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(44,26,14,0.85); z-index: 200; align-items: center; justify-content: center; padding: 2rem; }
        .modal-overlay.open { display: flex; }
        .modal { background: var(--white); max-width: 540px; width: 100%; position: relative; padding: 3rem; animation: modalIn 0.3s ease; }
        @keyframes modalIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .modal-close { position: absolute; top: 1rem; right: 1rem; background: none; border: none; font-size: 1.5rem; cursor: pointer; color: var(--brown-light); width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; transition: color 0.2s; }
        .modal-close:hover { color: var(--brown-deep); }
        .modal-category { font-size: 0.7rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--amber); font-weight: 700; margin-bottom: 6px; }
        .modal-name { font-family: var(--ff-serif); font-size: 2rem; font-weight: 600; color: var(--brown-deep); margin-bottom: 1rem; }
        .modal-desc { font-size: 0.9rem; color: var(--brown-light); line-height: 1.8; margin-bottom: 1.5rem; }
        .modal-details { display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem; margin-bottom: 1.5rem; }
        .modal-detail-item { border: 1px solid var(--cream-dark); padding: 0.5rem 0.75rem; }
        .modal-detail-label { font-size: 0.65rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--brown-light); margin-bottom: 2px; }
        .modal-detail-value { font-family: var(--ff-serif); font-size: 0.9rem; color: var(--brown-deep); font-style: italic; }
        .modal-price { font-family: var(--ff-serif); font-size: 1.5rem; color: var(--brown-deep); font-style: italic; margin-bottom: 1rem; }
        .modal-cta { display: block; text-align: center; padding: 0.85rem; background: var(--brown-deep); color: var(--cream); text-decoration: none; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; transition: background 0.2s; }
        .modal-cta:hover { background: var(--amber); color: var(--brown-deep); }

        /* SCROLL REVEAL */
        .reveal { opacity: 0; transform: translateY(24px); transition: opacity 0.6s ease, transform 0.6s ease; }
        .reveal.visible { opacity: 1; transform: translateY(0); }
        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }
        .reveal-delay-4 { transition-delay: 0.4s; }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .hero { grid-template-columns: 1fr; }
            .hero-left { padding: 7rem 2rem 4rem; min-height: 60vh; }
            .hero-right { min-height: 40vh; }
            .hero-divider { display: none; }
            .section-daily { grid-template-columns: 1fr; }
            .daily-left { padding: 4rem 2rem; }
            .daily-right { padding: 3rem 2rem; }
            .section-identity { grid-template-columns: 1fr; }
            .identity-visual { min-height: 260px; }
            .identity-content { padding: 4rem 2rem; }
            .section-order { grid-template-columns: 1fr; }
            .order-left, .order-right { padding: 4rem 2rem; }
            .footer-inner { flex-direction: column; }
            .footer-nav { gap: 3rem; }
            .footer-bottom { flex-direction: column; gap: 0.5rem; text-align: center; }
            .nav-links { display: none; }
            .nav-hamburger { display: flex; }
            .menu-grid { grid-template-columns: 1fr 1fr; }
            .menu-card--large, .menu-card--medium, .menu-card--small, .menu-card--wide, .menu-card--slim { grid-column: span 1; }
            .form-row { grid-template-columns: 1fr; }
            .process-card { flex: 0 0 280px; }
        }

        @media (max-width: 600px) {
            .hero-left { padding: 6rem 1.25rem 3rem; }
            .daily-left, .order-left, .order-right { padding: 3rem 1.25rem; }
            .section-menu { padding: 4rem 1.25rem; }
            .menu-grid { grid-template-columns: 1fr; }
            .menu-card--large, .menu-card--medium, .menu-card--small, .menu-card--wide, .menu-card--slim { grid-column: span 1; }
            .menu-header { flex-direction: column; align-items: flex-start; gap: 1rem; }
            .footer { padding: 3rem 1.25rem 1.5rem; }
            .footer-nav { flex-direction: column; gap: 2rem; }
            .process-track { padding: 0 1.25rem 1.5rem; }
            .process-card { flex: 0 0 260px; }
            .modal { padding: 2rem 1.5rem; }
        }

        /* WHATSAPP FLOAT */
        .wa-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background-color: #25d366;
            color: white;
            border-radius: 50%;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.2);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: transform 0.3s ease;
        }
        .wa-float:hover {
            transform: scale(1.1);
        }
        .wa-icon {
            width: 35px;
            height: 35px;
            fill: currentColor;
        }
    </style>
    @stack('styles')
</head>
<body>

    {{-- HEADER SECTION --}}
    @section('header')
        @include('partials.header')
    @show

    {{-- MAIN CONTENT --}}
    <main id="main-content">
        @yield('content')
    </main>

    {{-- FOOTER SECTION --}}
    @section('footer')
        @include('partials.footer')
    @show

    {{-- GLOBAL SCRIPTS --}}
    <script>
        // NAVIGATION SCROLL EFFECT
        var nav = document.getElementById('main-nav');
        if (nav) {
            window.addEventListener('scroll', function() {
                nav.classList.toggle('scrolled', window.scrollY > 15);
            }, { passive: true });
        }

        // MOBILE NAVIGATION MENU
        var hamburger = document.getElementById('hamburger-btn');
        var mobileMenu = document.getElementById('mobile-menu');
        var mobileClose = document.getElementById('mobile-menu-close');

        if (hamburger && mobileMenu && mobileClose) {
            function openMobileMenu() {
                mobileMenu.classList.add('open');
                hamburger.setAttribute('aria-expanded', 'true');
                document.body.style.overflow = 'hidden';
                mobileClose.focus();
            }
            function closeMobileMenu() {
                mobileMenu.classList.remove('open');
                hamburger.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
                hamburger.focus();
            }

            hamburger.addEventListener('click', openMobileMenu);
            mobileClose.addEventListener('click', closeMobileMenu);
            document.querySelectorAll('.mobile-nav-link').forEach(function(l) {
                l.addEventListener('click', closeMobileMenu);
            });
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && mobileMenu.classList.contains('open')) closeMobileMenu();
            });
        }

        // SCROLL REVEAL ANIMATIONS
        var revealEls = document.querySelectorAll('.reveal');
        if (revealEls.length > 0 && 'IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
            revealEls.forEach(function(el) { observer.observe(el); });
        }
    </script>

    @stack('scripts')
    @include('components.cart-drawer')

    {{-- WHATSAPP FLOAT BUTTON --}}
    <a href="https://wa.me/6281234567890" class="wa-float" target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp">
        <svg class="wa-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zM223.9 414.7c-32 0-64.4-8.5-92.4-24.6l-6.6-3.9-68.9 18 18.3-67.1-4.3-6.9c-17.6-28.2-26.9-61-26.9-94.6 0-103.5 84.3-187.8 187.9-187.8 50.1 0 97.2 19.5 132.6 55 35.4 35.4 55 82.5 55 132.6 0 103.5-84.3 187.8-187.8 187.8zM326.6 284c-5.6-2.8-33.3-16.4-38.5-18.3-5.2-1.9-9-2.8-12.8 2.8-3.7 5.6-14.6 18.3-17.9 22.1-3.3 3.8-6.6 4.2-12.2 1.4-5.6-2.8-23.7-8.8-45.2-28.1-16.7-15-28-33.5-31.2-39.1-3.3-5.6-.4-8.6 2.4-11.4 2.5-2.5 5.6-6.6 8.4-9.9 2.8-3.3 3.7-5.6 5.6-9.4 1.9-3.8.9-7.1-.5-9.9-1.4-2.8-12.8-30.9-17.5-42.3-4.6-11.2-9.2-9.7-12.8-9.9-3.3-.2-7.1-.2-10.8-.2-3.8 0-9.9 1.4-15 7.1-5.2 5.6-19.8 19.3-19.8 47.1s20.3 54.7 23 58.5c2.8 3.8 40 60.9 96.9 85.5 13.5 5.9 24.1 9.4 32.3 12 13.5 4.3 25.8 3.7 35.6 2.3 11-1.6 33.3-13.6 38-26.7 4.7-13.1 4.7-24.4 3.3-26.7-1.4-2.4-5.2-3.8-10.8-6.6z"/></svg>
    </a>
</body>
</html>
