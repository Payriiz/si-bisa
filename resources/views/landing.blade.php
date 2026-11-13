@extends('layouts.app')
@section('bare','1')
@section('title','SI-BISA - Penerjemah Suara ke Bahasa Isyarat')
@section('content')

<style>
  *, *::before, *::after { box-sizing: border-box; }
  html, body { max-width: 100%; overflow-x: hidden; }

  /* ─── DESKTOP NAVBAR ─── */
  .figma-navbar {
    max-width: 1200px;
    margin: 0 auto;
    padding: 1.25rem 2rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.5rem;
    background: transparent;
  }
  .figma-brand {
    display: inline-flex;
    align-items: center;
    text-decoration: none;
    flex-shrink: 0;
  }
  .figma-nav-links {
    display: flex;
    align-items: center;
    gap: 1.5rem;
  }
  .figma-nav-link {
    color: var(--txt-main);
    font-weight: 500;
    font-size: 0.95em;
    text-decoration: none;
    transition: color var(--transition-fast);
  }
  .figma-nav-link:hover {
    color: var(--primary);
  }
  .btn-mulai-nav {
    background: var(--primary);
    color: #ffffff;
    font-weight: 600;
    font-size: 0.92em;
    padding: 0.55rem 1.6rem;
    border-radius: var(--radius-pill);
    text-decoration: none;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
    transition: all var(--transition-fast);
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }
  .btn-mulai-nav:hover {
    background: var(--primary-hover);
    transform: translateY(-1.5px);
    box-shadow: 0 6px 16px rgba(37, 99, 235, 0.35);
    color: #ffffff;
  }

  /* ─── MOBILE TOPBAR ─── */
  .figma-mobile-topbar {
    display: none;
    align-items: center;
    justify-content: space-between;
    padding: 0.85rem 1.25rem;
    background: var(--bg-card);
    border-bottom: 1px solid var(--border-color);
    position: sticky;
    top: 0;
    z-index: 200;
  }
  .figma-mobile-actions {
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  /* ─── MOBILE DRAWER ─── */
  .figma-drawer-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(15, 23, 42, 0.5);
    backdrop-filter: blur(4px);
    z-index: 998;
    opacity: 0;
    transition: opacity var(--transition-smooth);
  }
  .figma-drawer-overlay.active { display: block; opacity: 1; }
  .figma-drawer {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    width: 290px;
    max-width: 86vw;
    background: var(--bg-card);
    border-right: 1px solid var(--border-color);
    z-index: 999;
    transform: translateX(-100%);
    transition: transform var(--transition-smooth);
    display: flex;
    flex-direction: column;
    padding: 1.5rem 1.25rem;
    box-shadow: var(--shadow-lg);
  }
  .figma-drawer.open { transform: translateX(0); }
  .drawer-link {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.85rem 1rem;
    border-radius: var(--radius-md);
    color: var(--txt-sub);
    font-weight: 600;
    font-size: 0.95em;
    text-decoration: none;
    transition: background-color var(--transition-fast), color var(--transition-fast);
  }
  .drawer-link:hover {
    background: var(--primary-light);
    color: var(--primary);
  }

  /* ─── HERO SECTION (CENTERED LAYOUT) ─── */
  .figma-hero {
    background: #eff6ff;
    position: relative;
    overflow: hidden;
    padding-top: 1.5rem;
  }
  html[data-theme="gelap"] .figma-hero {
    background: linear-gradient(180deg, #111827 0%, #0b1120 100%) !important;
  }
  .figma-hero-inner {
    max-width: 860px;
    margin: 0 auto;
    padding: 4rem 1.5rem 4.5rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative;
    z-index: 2;
  }
  .hero-content {
    max-width: 760px;
    width: 100%;
    margin: 0 auto;
    padding-bottom: 0;
    text-align: center;
  }
  .hero-headline {
    font-size: clamp(2.8rem, 6vw, 4.2rem);
    font-weight: 800;
    line-height: 1.1;
    color: var(--txt-main);
    margin-bottom: 0.5rem;
    letter-spacing: -0.02em;
  }
  .hero-subheadline {
    font-size: clamp(1.2rem, 2.5vw, 1.6rem);
    font-weight: 700;
    color: #2563eb;
    margin-bottom: 1.25rem;
    line-height: 1.35;
  }
  html[data-theme="gelap"] .hero-subheadline {
    color: #60a5fa !important;
  }
  .hero-paragraph {
    font-size: 1.05rem;
    color: var(--txt-sub);
    line-height: 1.7;
    margin: 0 auto 2.2rem;
    max-width: 640px;
  }
  .btn-hero-cta {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.6rem;
    background: #2563eb;
    color: #ffffff;
    font-weight: 600;
    font-size: 1.05em;
    padding: 0.9rem 2.4rem;
    border-radius: var(--radius-pill);
    box-shadow: 0 6px 18px rgba(37, 99, 235, 0.3);
    text-decoration: none;
    transition: all var(--transition-fast);
    box-sizing: border-box;
    text-align: center;
  }
  .btn-hero-cta:hover {
    background: #1d4ed8;
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(37, 99, 235, 0.38);
    color: #ffffff;
  }

  /* Wave at bottom of hero */
  .hero-wave-container {
    width: 100%;
    overflow: hidden;
    line-height: 0;
    margin-top: -1px;
    position: relative;
    z-index: 1;
  }
  .hero-wave-svg {
    display: block;
    width: 100%;
    height: 70px;
  }

  /* ─── 3 FITUR UNGGULAN ─── */
  .figma-features-section {
    max-width: 1120px;
    margin: 4rem auto 4.5rem;
    padding: 0 1.5rem;
  }
  .features-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.8rem;
  }
  .feature-item {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: var(--radius-lg);
    padding: 1.8rem 1.6rem;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 0.9rem;
    box-shadow: var(--shadow-sm);
    transition: transform var(--transition-fast), box-shadow var(--transition-fast);
  }
  .feature-item:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
  }
  .feature-icon-circle {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: #eff6ff;
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  html[data-theme="gelap"] .feature-icon-circle {
    background: rgba(59, 130, 246, 0.16) !important;
    color: #60a5fa !important;
  }
  .feature-title {
    font-size: 1.12em;
    font-weight: 700;
    color: var(--txt-main);
    display: block;
    margin-bottom: 0.35rem;
    line-height: 1.35;
  }
  .feature-desc {
    font-size: 0.93em;
    color: var(--txt-sub);
    line-height: 1.6;
    display: block;
  }

  /* ─── CARA MENGGUNAKAN APLIKASI ─── */
  .figma-steps-section {
    max-width: 1120px;
    margin: 0 auto 5rem;
    padding: 0 1.5rem;
  }
  .steps-headline-wrap {
    text-align: center;
    margin-bottom: 2.4rem;
  }
  .steps-headline {
    font-size: 1.85em;
    font-weight: 700;
    color: var(--txt-main);
    margin-bottom: 0.4rem;
  }
  .steps-subheadline {
    color: var(--txt-sub);
    font-size: 1.02em;
  }
  .steps-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.8rem;
  }
  .step-card {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: var(--radius-lg);
    padding: 1.8rem 1.6rem;
    box-shadow: var(--shadow-sm);
    transition: transform var(--transition-fast), box-shadow var(--transition-fast);
  }
  .step-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
  }
  .step-icon-bubble {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: #eff6ff;
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.25rem;
  }
  html[data-theme="gelap"] .step-icon-bubble {
    background: rgba(59, 130, 246, 0.16) !important;
    color: #60a5fa !important;
  }
  .step-title {
    font-size: 1.08em;
    font-weight: 700;
    color: var(--txt-main);
    margin-bottom: 0.45rem;
    display: block;
  }
  .step-desc {
    font-size: 0.92em;
    color: var(--txt-sub);
    line-height: 1.6;
    display: block;
  }

  /* ─── BANNER KOMUNITAS ─── */
  .figma-community-banner {
    max-width: 1120px;
    margin: 0 auto 4.5rem;
    padding: 0 1.5rem;
  }
  .community-card {
    background: #eff6ff;
    border: 1px solid #dbeafe;
    border-radius: var(--radius-xl);
    padding: 2.2rem 2.4rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1.25rem;
    text-align: center;
  }
  html[data-theme="gelap"] .community-card {
    background: rgba(59, 130, 246, 0.1) !important;
    border-color: rgba(59, 130, 246, 0.25) !important;
  }
  .community-icon {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: #ffffff;
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: var(--shadow-sm);
  }
  html[data-theme="gelap"] .community-icon {
    background: #1e293b !important;
    color: #60a5fa !important;
  }
  .community-title {
    font-size: 1.22em;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 0.25rem;
  }
  html[data-theme="gelap"] .community-title {
    color: #f8fafc !important;
  }
  .community-sub {
    font-size: 0.95em;
    color: var(--txt-sub);
    line-height: 1.5;
  }
  html[data-theme="gelap"] .community-text {
    color: #f8fafc !important;
  }

  /* ─── FOOTER ─── */
  .figma-footer {
    border-top: 1px solid var(--border-color);
    padding: 2rem 1.5rem;
    text-align: center;
    color: var(--txt-muted);
    font-size: 0.88em;
  }

  /* ─── RESPONSIVE RULES ─── */
  @media (max-width: 900px) {
    .figma-navbar { display: none !important; }
    .figma-mobile-topbar { display: flex !important; }

    .figma-hero-inner {
      padding: 3rem 1.25rem 3.5rem;
    }
    .hero-content {
      max-width: 100%;
    }
    .hero-paragraph {
      margin-left: auto;
      margin-right: auto;
    }
    .btn-hero-cta {
      width: 100% !important;
      max-width: 380px !important;
      padding: 0.85rem 1.5rem !important;
      font-size: 0.98em !important;
    }

    .features-grid,
    .steps-grid {
      grid-template-columns: 1fr !important;
      gap: 1.2rem !important;
    }
    .community-card {
      flex-direction: column;
      padding: 1.8rem 1.4rem;
      gap: 0.85rem;
    }
  }

  @media (max-width: 480px) {
    .figma-hero-inner {
      padding: 2.5rem 1rem 3rem;
    }
    .hero-headline {
      font-size: 2.2rem;
    }
    .hero-subheadline {
      font-size: 1.15rem;
    }
    .btn-hero-cta {
      font-size: 0.94em !important;
      padding: 0.8rem 1rem !important;
      width: 100% !important;
      max-width: 100% !important;
    }
    .figma-features-section,
    .figma-steps-section,
    .figma-community-banner {
      padding: 0 1rem;
      margin-bottom: 3rem;
    }
  }
</style>

{{-- ═══════════════════════════════════════
     MOBILE TOPBAR
═══════════════════════════════════════ --}}
<header class="figma-mobile-topbar">
  <a href="/" class="figma-brand">
    <img src="{{ asset('logo/PACKAGES-04.png') }}" alt="SI-BISA" class="logo-light" style="height:36px; width:auto; object-fit:contain;">
    <img src="{{ asset('logo/SI-BISA Black.png') }}?v=2" alt="SI-BISA" class="logo-dark" style="height:36px; width:auto; object-fit:contain;">
  </a>
  <div class="figma-mobile-actions">
    <button type="button" class="theme-toggle-btn icon-btn" onclick="toggleTheme()" title="Ganti Tema" style="width:38px; height:38px;"></button>
    <button type="button" id="lpDrawerOpen" class="icon-btn" aria-label="Buka Menu" style="width:38px; height:38px;">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="3" y1="12" x2="21" y2="12"></line>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <line x1="3" y1="18" x2="21" y2="18"></line>
      </svg>
    </button>
  </div>
</header>

{{-- DRAWER OVERLAY --}}
<div id="lpDrawerOverlay" class="figma-drawer-overlay"></div>

{{-- DRAWER PANEL --}}
<nav id="lpDrawer" class="figma-drawer" aria-label="Menu Navigasi Mobile">
  <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom: 2rem;">
    <a href="/" style="display:inline-flex; align-items:center;">
      <img src="{{ asset('logo/PACKAGES-04.png') }}" alt="SI-BISA" class="logo-light" style="height:36px; width:auto; object-fit:contain;">
      <img src="{{ asset('logo/SI-BISA Black.png') }}?v=2" alt="SI-BISA" class="logo-dark" style="height:36px; width:auto; object-fit:contain;">
    </a>
    <button type="button" id="lpDrawerClose" class="icon-btn" aria-label="Tutup Menu" style="width:36px; height:36px;">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg>
    </button>
  </div>

  <div style="display:flex; flex-direction:column; gap:0.4rem;">
    <a href="/" class="drawer-link">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
      <span>Beranda</span>
    </a>
    <a href="#tentang" class="drawer-link">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
      <span>Tentang</span>
    </a>
    <a href="#cara" class="drawer-link">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
      <span>Bantuan</span>
    </a>

    <div style="height:1px; background:var(--border-color); margin:0.8rem 0;"></div>

    @guest
      <a href="/login" class="drawer-link">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
        <span>Login Admin</span>
      </a>
    @else
      <a href="{{ auth()->user()->role === 'admin' ? '/admin' : '/app' }}" class="drawer-link">
        @if(auth()->user()->role === 'admin')
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><polyline points="9 12 11 14 15 10"></polyline></svg>
          <span>Panel Admin</span>
        @else
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          <span>Akun Saya</span>
        @endif
      </a>
    @endguest
  </div>

  <div style="margin-top:auto; padding-top:1.5rem;">
    <a class="btn" href="/app" style="width:100%; justify-content:center; padding:0.85rem 1.4rem;">
      <span>Mulai Menerjemahkan</span>
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
    </a>
  </div>
</nav>

{{-- ═══════════════════════════════════════
     DESKTOP NAVBAR (FIGMA)
═══════════════════════════════════════ --}}
<header class="figma-navbar">
  <a href="/" class="figma-brand">
    <img src="{{ asset('logo/PACKAGES-04.png') }}" alt="SI-BISA" class="logo-light" style="height:44px; width:auto; object-fit:contain;">
    <img src="{{ asset('logo/SI-BISA Black.png') }}?v=2" alt="SI-BISA" class="logo-dark" style="height:44px; width:auto; object-fit:contain;">
  </a>

  <nav class="figma-nav-links">
    <a href="/" class="figma-nav-link">Beranda</a>
    <a href="#tentang" class="figma-nav-link">Tentang</a>
    <a href="#cara" class="figma-nav-link">Bantuan</a>

    <button type="button" class="theme-toggle-btn icon-btn" onclick="toggleTheme()" title="Ganti Tema" style="width:38px; height:38px;"></button>

    @guest
      <a href="/login" class="btn sec sm" style="text-decoration:none; padding: 0.5rem 1.1rem;">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
        <span>Login Admin</span>
      </a>
    @else
      <a href="{{ auth()->user()->role === 'admin' ? '/admin' : '/app' }}" class="btn sec sm" style="text-decoration:none; padding: 0.5rem 1.1rem;">
        <span>{{ auth()->user()->role === 'admin' ? 'Panel Admin' : 'Akun Saya' }}</span>
      </a>
    @endguest

    <a href="/app" class="btn-mulai-nav">
      Mulai
    </a>
  </nav>
</header>

{{-- ═══════════════════════════════════════
     HERO SECTION (CENTERED LAYOUT)
═══════════════════════════════════════ --}}
<section class="figma-hero">
  <div class="figma-hero-inner">
    <div class="hero-content">
      <h1 class="hero-headline">SI-BISA</h1>
      <p class="hero-subheadline">Penerjemah Suara ke Bahasa Isyarat BISINDO</p>
      <p class="hero-paragraph">
        Ubah ucapan suara menjadi gerakan bahasa isyarat langsung dari perangkat Anda. Mudah digunakan siapa saja, kapan saja, dan di mana saja.
      </p>
      <div>
        <a href="/app" class="btn-hero-cta">
          Mulai Menerjemahkan
        </a>
      </div>
    </div>
  </div>

  {{-- Wavy bottom decoration --}}
  <div class="hero-wave-container">
    <svg class="hero-wave-svg" viewBox="0 0 1440 90" fill="none" preserveAspectRatio="none">
      <path d="M0,25 C320,75 640,0 960,40 C1200,68 1360,25 1440,32 L1440,90 L0,90 Z" fill="rgba(59, 130, 246, 0.18)"></path>
      <path d="M0,45 C380,85 760,18 1140,55 C1280,72 1380,48 1440,52 L1440,90 L0,90 Z" fill="rgba(37, 99, 235, 0.28)"></path>
      <path d="M0,65 C420,95 840,42 1220,70 L1440,65 L1440,90 L0,90 Z" fill="var(--bg-page)"></path>
    </svg>
  </div>
</section>

{{-- ═══════════════════════════════════════
     3 FITUR UNGGULAN
═══════════════════════════════════════ --}}
<section id="tentang" class="figma-features-section">
  <div class="features-grid">
    <div class="feature-item">
      <div class="feature-icon-circle">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
      </div>
      <div>
        <b class="feature-title">Praktis Tanpa Alat Tambahan</b>
        <span class="feature-desc">Cukup gunakan mikrofon bawaan HP atau laptop langsung dari browser, tanpa perlu memasang aplikasi tambahan.</span>
      </div>
    </div>

    <div class="feature-item">
      <div class="feature-icon-circle">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 11V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v0"></path><path d="M14 10V4a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v2"></path><path d="M10 10.5V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v8"></path><path d="M18 8a2 2 0 1 1 4 0v6a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15"></path></svg>
      </div>
      <div>
        <b class="feature-title">Mendukung Bahasa Isyarat BISINDO</b>
        <span class="feature-desc">Menampilkan gerakan isyarat kata demi kata secara jelas sesuai kamus Bahasa Isyarat Indonesia (BISINDO).</span>
      </div>
    </div>

    <div class="feature-item">
      <div class="feature-icon-circle">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
      </div>
      <div>
        <b class="feature-title">Memudahkan Obrolan Sehari-hari</b>
        <span class="feature-desc">Membantu teman tuli dan teman dengar saling berkomunikasi dengan lebih lancar, cepat, dan nyaman.</span>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════
     CARA MENGGUNAKAN APLIKASI
═══════════════════════════════════════ --}}
<section id="cara" class="figma-steps-section">
  <div class="steps-headline-wrap">
    <h2 class="steps-headline">Cara Menggunakan Aplikasi</h2>
    <p class="steps-subheadline">Ikuti tiga langkah mudah berikut untuk mulai menerjemahkan suara:</p>
  </div>

  <div class="steps-grid">
    <div class="step-card">
      <div class="step-icon-bubble">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path><path d="M19 10v2a7 7 0 0 1-14 0v-2"></path><line x1="12" y1="19" x2="12" y2="23"></line><line x1="8" y1="23" x2="16" y2="23"></line></svg>
      </div>
      <b class="step-title">1. Tekan Tombol Mikrofon</b>
      <p class="step-desc">
        Klik tombol mikrofon di halaman utama, lalu ucapkan kata atau kalimat dengan suara yang jelas.
      </p>
    </div>

    <div class="step-card">
      <div class="step-icon-bubble">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 7 4 4 20 4 20 7"></polyline><line x1="9" y1="20" x2="15" y2="20"></line><line x1="12" y1="4" x2="12" y2="20"></line></svg>
      </div>
      <b class="step-title">2. Suara Diubah Jadi Teks</b>
      <p class="step-desc">
        Sistem akan mendengarkan ucapan Anda dan menuliskannya ke dalam bentuk teks secara otomatis.
      </p>
    </div>

    <div class="step-card">
      <div class="step-icon-bubble">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
      </div>
      <b class="step-title">3. Muncul Gerakan Isyarat</b>
      <p class="step-desc">
        Setiap kata yang dikenali akan langsung ditampilkan dalam bentuk video gerakan bahasa isyarat BISINDO.
      </p>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════
     BANNER KOMUNITAS
═══════════════════════════════════════ --}}
<section class="figma-community-banner">
  <div class="community-card">
    <div class="community-icon">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
    </div>
    <div>
      <div class="community-title">
        Membantu komunikasi jadi lebih mudah untuk semua orang.
      </div>
      <div class="community-sub">
        Jembatan komunikasi praktis antara teman dengar dan teman tuli sehari-hari.
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════
     FOOTER
═══════════════════════════════════════ --}}
<footer class="figma-footer">
  <p style="margin-bottom:0.5rem;">Gunakan Google Chrome atau Microsoft Edge untuk pengalaman pengenalan suara optimal.</p>
  <p>
    <a href="/login" style="color:var(--txt-sub); font-weight:600; display:inline-flex; align-items:center; gap:0.4rem;">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
      <span>Login Admin SI-BISA</span>
    </a>
  </p>
</footer>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const openBtn  = document.getElementById('lpDrawerOpen');
  const closeBtn = document.getElementById('lpDrawerClose');
  const drawer   = document.getElementById('lpDrawer');
  const overlay  = document.getElementById('lpDrawerOverlay');

  if (!openBtn || !drawer) return;

  const toggleDrawer = (open) => {
    if (open) {
      drawer.classList.add('open');
      overlay.classList.add('active');
      document.body.style.overflow = 'hidden';
    } else {
      drawer.classList.remove('open');
      overlay.classList.remove('active');
      document.body.style.overflow = '';
    }
  };

  openBtn.addEventListener('click', () => toggleDrawer(true));
  if (closeBtn) closeBtn.addEventListener('click', () => toggleDrawer(false));
  overlay.addEventListener('click', () => toggleDrawer(false));
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && drawer.classList.contains('open')) toggleDrawer(false);
  });

  drawer.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', () => toggleDrawer(false));
  });

  if (typeof applyS === 'function') applyS();
});
</script>
@endpush
@endsection
