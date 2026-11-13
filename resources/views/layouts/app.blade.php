<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'SI-BISA - Penerjemah Suara ke Bahasa Isyarat')</title>
  
  <!-- Favicon Tab Browser (SI-BISA WEB) -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}?v=4">
  <link rel="icon" type="image/png" sizes="128x128" href="{{ asset('logo/SI-BISA WEB.png') }}?v=4">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=4">
  <link rel="apple-touch-icon" href="{{ asset('logo/SI-BISA WEB.png') }}?v=4">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    :root {
      --bg-page: #f8fafc;
      --bg-card: #ffffff;
      --bg-subtle: #eff6ff;
      --bg-input: #f3f4f6;
      --txt-main: #1e293b;
      --txt-sub: #64748b;
      --txt-muted: #94a3b8;
      --border-color: #e2e8f0;
      --border-focus: #2563eb;
      --primary: #2563eb;
      --primary-hover: #1d4ed8;
      --primary-active: #1e40af;
      --primary-secondary: #3b82f6;
      --primary-light: #eff6ff;
      --primary-glow: rgba(37, 99, 235, 0.16);
      --danger: #ef4444;
      --danger-light: #fef2f2;
      --success: #10b981;
      --success-light: #ecfdf5;
      --warning: #f59e0b;
      --warning-light: #fffbeb;
      --radius-sm: 8px;
      --radius-md: 14px;
      --radius-lg: 20px;
      --radius-xl: 24px;
      --radius-pill: 9999px;
      --shadow-sm: 0 1px 3px rgba(15, 23, 42, 0.05), 0 1px 2px rgba(15, 23, 42, 0.03);
      --shadow-md: 0 4px 16px -1px rgba(15, 23, 42, 0.08), 0 2px 6px -1px rgba(15, 23, 42, 0.04);
      --shadow-lg: 0 10px 28px -3px rgba(15, 23, 42, 0.1), 0 4px 12px -2px rgba(15, 23, 42, 0.05);
      --shadow-btn: 0 4px 14px rgba(37, 99, 235, 0.22);
      --fs: 16px;
      --transition-fast: 0.18s cubic-bezier(0.16, 1, 0.3, 1);
      --transition-smooth: 0.28s cubic-bezier(0.16, 1, 0.3, 1);
    }

    html[data-theme="gelap"] {
      --bg-page: #090d16;
      --bg-card: #111827;
      --bg-subtle: #1e293b;
      --bg-input: #0b1120;
      --txt-main: #f8fafc;
      --txt-sub: #cbd5e1;
      --txt-muted: #64748b;
      --border-color: #1e293b;
      --border-focus: #3b82f6;
      --primary: #3b82f6;
      --primary-hover: #2563eb;
      --primary-active: #1d4ed8;
      --primary-light: rgba(59, 130, 246, 0.15);
      --primary-glow: rgba(59, 130, 246, 0.25);
      --danger: #f87171;
      --danger-light: rgba(239, 68, 68, 0.15);
      --success: #34d399;
      --success-light: rgba(16, 185, 129, 0.15);
      --warning: #fbbf24;
      --warning-light: rgba(245, 158, 11, 0.15);
      --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.35);
      --shadow-md: 0 6px 20px rgba(0, 0, 0, 0.45);
      --shadow-lg: 0 14px 34px rgba(0, 0, 0, 0.55);
      --shadow-btn: 0 4px 16px rgba(59, 130, 246, 0.32);
    }

    /* Browser Surfaces */
    ::selection {
      background: rgba(37, 99, 235, 0.22);
      color: var(--primary);
    }
    html[data-theme="gelap"] ::selection {
      background: rgba(59, 130, 246, 0.35);
      color: #93c5fd;
    }

    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }
    ::-webkit-scrollbar-track {
      background: transparent;
    }
    ::-webkit-scrollbar-thumb {
      background: var(--border-color);
      border-radius: var(--radius-pill);
    }
    ::-webkit-scrollbar-thumb:hover {
      background: var(--txt-muted);
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }
    [hidden], .hidden { display: none !important; }
    
    body {
      font-family: 'Plus Jakarta Sans', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      font-size: var(--fs);
      line-height: 1.55;
      background: var(--bg-page);
      color: var(--txt-main);
      min-height: 100vh;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      transition: background-color var(--transition-smooth), color var(--transition-smooth);
    }

    a {
      color: var(--primary);
      text-decoration: none;
      transition: opacity var(--transition-fast), color var(--transition-fast);
    }
    a:hover { opacity: 0.88; }

    /* Logo Switching */
    .logo-dark { display: none !important; }
    .logo-light { display: inline-block !important; }
    html[data-theme="gelap"] .logo-dark { display: inline-block !important; }
    html[data-theme="gelap"] .logo-light { display: none !important; }

    /* Buttons */
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.55rem;
      padding: 0.68rem 1.4rem;
      border: 1px solid transparent;
      border-radius: var(--radius-pill);
      background: var(--primary);
      color: #ffffff;
      font-weight: 600;
      font-size: 0.93em;
      cursor: pointer;
      box-shadow: var(--shadow-btn);
      transition: transform var(--transition-fast), background-color var(--transition-fast), box-shadow var(--transition-fast), border-color var(--transition-fast);
      text-decoration: none;
      line-height: 1.25;
      user-select: none;
      white-space: nowrap;
    }
    .btn:hover {
      background: var(--primary-hover);
      transform: translateY(-1.5px);
      box-shadow: 0 6px 18px rgba(37, 99, 235, 0.32);
      color: #ffffff;
    }
    .btn:active {
      background: var(--primary-active);
      transform: translateY(0);
      box-shadow: var(--shadow-sm);
    }
    .btn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
      transform: none !important;
      box-shadow: none !important;
    }
    .btn.sec {
      background: var(--bg-card);
      color: var(--txt-main);
      box-shadow: var(--shadow-sm);
      border: 1px solid var(--border-color);
    }
    .btn.sec:hover {
      background: var(--bg-subtle);
      border-color: var(--txt-muted);
      color: var(--txt-main);
      box-shadow: var(--shadow-md);
    }
    .btn.red {
      background: var(--danger);
      box-shadow: 0 4px 14px rgba(239, 68, 68, 0.28);
      color: #ffffff;
    }
    .btn.red:hover {
      background: #dc2626;
      box-shadow: 0 6px 18px rgba(220, 38, 38, 0.35);
    }
    .btn.sm {
      padding: 0.45rem 1rem;
      font-size: 0.86em;
    }
    .icon-btn {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: var(--bg-card);
      border: 1px solid var(--border-color);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: var(--txt-sub);
      cursor: pointer;
      transition: transform var(--transition-fast), background-color var(--transition-fast), color var(--transition-fast), border-color var(--transition-fast);
      box-shadow: var(--shadow-sm);
      text-decoration: none;
      padding: 0;
      flex-shrink: 0;
    }
    .icon-btn:hover {
      background: var(--bg-subtle);
      color: var(--txt-main);
      transform: translateY(-1px);
      border-color: var(--txt-muted);
    }
    .icon-btn:active {
      transform: translateY(0);
    }

    /* Inputs */
    input[type="text"], input[type="email"], input[type="password"], input[type="number"], select, textarea {
      width: 100%;
      padding: 0.75rem 1.15rem;
      border: 1.5px solid var(--border-color);
      border-radius: var(--radius-md);
      background: var(--bg-input);
      color: var(--txt-main);
      font-size: 0.95em;
      font-family: inherit;
      outline: none;
      transition: border-color var(--transition-fast), box-shadow var(--transition-fast), background-color var(--transition-fast);
    }
    input:focus, select:focus, textarea:focus {
      border-color: var(--border-focus);
      box-shadow: 0 0 0 3.5px var(--primary-glow);
    }
    input:disabled, textarea:disabled {
      background: var(--bg-subtle);
      color: var(--txt-muted);
      cursor: not-allowed;
      border-color: var(--border-color);
    }
    .input-pill {
      border-radius: var(--radius-pill) !important;
    }

    label {
      display: block;
      margin: 0.9rem 0 0.4rem;
      font-weight: 600;
      font-size: 0.88em;
      color: var(--txt-sub);
      letter-spacing: 0.2px;
    }

    /* Cards */
    .card {
      background: var(--bg-card);
      border: 1px solid var(--border-color);
      border-radius: var(--radius-lg);
      padding: 1.5rem;
      margin: 1rem 0;
      box-shadow: var(--shadow-sm);
      transition: border-color var(--transition-fast), box-shadow var(--transition-fast);
    }
    .card-hover:hover {
      box-shadow: var(--shadow-md);
      border-color: rgba(37, 99, 235, 0.25);
    }

    /* Layout Shell */
    .app-shell {
      display: flex;
      min-height: 100vh;
      max-width: 1360px;
      margin: 0 auto;
    }

    .app-sidebar {
      width: 270px;
      padding: 2rem 1.4rem;
      background: var(--bg-card);
      border-right: 1px solid var(--border-color);
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
      position: sticky;
      top: 0;
      height: 100vh;
      overflow-y: auto;
      flex-shrink: 0;
    }

    .brand-logo {
      display: flex;
      align-items: center;
      gap: 0.6rem;
      font-weight: 800;
      font-size: 1.35em;
      color: var(--txt-main);
      margin-bottom: 2.2rem;
      padding: 0 0.4rem;
      text-decoration: none;
    }

    .nav-links-wrap {
      display: flex;
      flex-direction: column;
      gap: 0.45rem;
      width: 100%;
    }

    .nav-link {
      display: flex;
      align-items: center;
      gap: 0.85rem;
      padding: 0.82rem 1.2rem;
      border-radius: var(--radius-pill);
      color: var(--txt-sub);
      font-weight: 600;
      font-size: 0.94em;
      transition: background-color var(--transition-fast), color var(--transition-fast), transform var(--transition-fast);
      text-decoration: none;
    }
    .nav-link:hover {
      background: var(--bg-subtle);
      color: var(--txt-main);
      transform: translateX(2px);
    }
    .nav-link.active {
      background: var(--primary-light);
      color: var(--primary);
      font-weight: 700;
    }
    .nav-link svg {
      width: 20px;
      height: 20px;
      flex-shrink: 0;
    }

    .app-main {
      flex: 1;
      padding: 2rem 2.5rem;
      max-width: 1020px;
      min-width: 0;
    }

    .app-header-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.8rem;
    }

    /* Tabs */
    .tab-bar {
      display: inline-flex;
      background: var(--bg-subtle);
      padding: 4px;
      border-radius: var(--radius-pill);
      margin-bottom: 1.2rem;
      border: 1px solid var(--border-color);
      gap: 3px;
    }
    .tab-btn {
      background: transparent;
      border: 0;
      padding: 0.6rem 1.3rem;
      font-size: 0.9em;
      font-weight: 600;
      color: var(--txt-sub);
      cursor: pointer;
      border-radius: var(--radius-pill);
      transition: background-color var(--transition-fast), color var(--transition-fast), box-shadow var(--transition-fast);
      font-family: inherit;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }
    .tab-btn:hover {
      color: var(--txt-main);
    }
    .tab-btn.active {
      background: var(--bg-card);
      color: var(--primary);
      box-shadow: var(--shadow-sm);
    }

    /* Video / Animation Stage */
    .stage {
      min-height: 320px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: var(--bg-subtle);
      border: 1px solid var(--border-color);
      border-radius: var(--radius-lg);
      overflow: hidden;
      margin: 1rem 0;
      position: relative;
    }
    .stage img, .stage video {
      max-width: 100%;
      max-height: 340px;
      border-radius: var(--radius-md);
      object-fit: contain;
    }

    /* Items & Tables */
    .item-card {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.15rem 1.4rem;
      background: var(--bg-card);
      border: 1px solid var(--border-color);
      border-radius: var(--radius-md);
      margin: 0.7rem 0;
      box-shadow: var(--shadow-sm);
      transition: transform var(--transition-fast), box-shadow var(--transition-fast), border-color var(--transition-fast);
    }
    .item-card:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
      border-color: rgba(37, 99, 235, 0.25);
    }

    .table-responsive {
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      margin: 0.6rem 0;
    }
    table { width: 100%; border-collapse: collapse; }
    td, th { padding: 0.85rem 0.75rem; border-bottom: 1px solid var(--border-color); text-align: left; }
    th { font-weight: 600; color: var(--txt-sub); font-size: 0.88em; }

    .row { display: flex; gap: 0.8rem; align-items: center; flex-wrap: wrap; }
    .warn { color: var(--danger); font-size: 0.9em; margin: 0.6rem 0; font-weight: 500; }
    .ok { color: var(--success); font-size: 0.9em; margin: 0.6rem 0; font-weight: 500; }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(6px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes spin {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
    @keyframes pulseMic {
      0% { box-shadow: 0 0 0 0 rgba(37, 99, 235, 0.45); }
      70% { box-shadow: 0 0 0 14px rgba(37, 99, 235, 0); }
      100% { box-shadow: 0 0 0 0 rgba(37, 99, 235, 0); }
    }
    .animate-spin {
      animation: spin 1s linear infinite;
    }
    .page-fade {
      animation: fadeIn var(--transition-smooth) forwards;
    }

    /* Mobile Header & Drawer */
    .mobile-topbar {
      display: none;
    }
    .mobile-drawer-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(15, 23, 42, 0.55);
      backdrop-filter: blur(4px);
      z-index: 998;
      opacity: 0;
      transition: opacity var(--transition-smooth);
    }
    .mobile-drawer-overlay.active {
      display: block;
      opacity: 1;
    }
    .mobile-drawer {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      width: 290px;
      max-width: 85vw;
      background: var(--bg-card);
      border-right: 1px solid var(--border-color);
      z-index: 999;
      transform: translateX(-100%);
      transition: transform var(--transition-smooth);
      display: flex;
      flex-direction: column;
      padding: 1.5rem 1.2rem;
      box-shadow: var(--shadow-lg);
    }
    .mobile-drawer.open {
      transform: translateX(0);
    }

    @media (max-width: 860px) {
      .app-shell { flex-direction: column; }
      .app-sidebar { display: none !important; }
      .mobile-topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.85rem 1.2rem;
        background: var(--bg-card);
        border-bottom: 1px solid var(--border-color);
        position: sticky;
        top: 0;
        z-index: 100;
        backdrop-filter: blur(10px);
        box-shadow: var(--shadow-sm);
      }
      .app-main {
        padding: 1.25rem 1rem !important;
        max-width: 100% !important;
      }
      .app-header-bar {
        display: none !important;
      }
    }
  </style>

  <script>
    const DEF = {
      theme: (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) ? 'gelap' : 'terang',
      size: 'sedang',
      speed: 1,
      autoplay: true,
      repeat: false,
      simpan: true
    };
    const S = Object.assign({}, DEF, (()=>{try{return JSON.parse(localStorage.getItem('sibisa'))||{}}catch(e){return {}}})());
    const saveS = () => localStorage.setItem('sibisa', JSON.stringify(S));

    const SVG_ICONS = {
      sun: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>',
      moon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>'
    };

    function applyS(){
      const isDark = S.theme === 'gelap';
      document.documentElement.dataset.theme = isDark ? 'gelap' : 'terang';
      document.documentElement.style.setProperty('--fs', {kecil:'14px',sedang:'16px',besar:'18px'}[S.size]);
      
      document.querySelectorAll('.theme-toggle-btn').forEach(btn => {
        btn.innerHTML = isDark ? SVG_ICONS.sun : SVG_ICONS.moon;
        btn.setAttribute('aria-label', isDark ? 'Ganti ke Tema Terang' : 'Ganti ke Tema Gelap');
        btn.title = isDark ? 'Ganti ke Tema Terang' : 'Ganti ke Tema Gelap';
      });
    }

    function toggleTheme(){
      S.theme = S.theme === 'gelap' ? 'terang' : 'gelap';
      saveS();
      applyS();
      document.querySelectorAll('input[name="theme"]').forEach(r => {
        r.checked = (r.value === S.theme);
      });
    }
    applyS();
  </script>
</head>
<body>

@hasSection('bare')
  <div class="page-fade">
    @yield('content')
  </div>
@else
  <!-- Mobile Topbar (< 860px) -->
  <header class="mobile-topbar">
    <div style="display: flex; align-items: center; gap: 0.75rem;">
      <button type="button" id="mobileDrawerOpen" class="icon-btn" aria-label="Buka Menu Navigasi">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
      </button>
      <a href="/" style="display: inline-flex; align-items: center;">
        <img src="{{ asset('logo/PACKAGES-04.png') }}" alt="SI-BISA" class="logo-light" style="height: 34px; width: auto; object-fit: contain;">
        <img src="{{ asset('logo/SI-BISA Black.png') }}?v=2" alt="SI-BISA" class="logo-dark" style="height: 34px; width: auto; object-fit: contain;">
      </a>
    </div>

    <div style="display: flex; align-items: center; gap: 0.5rem;">
      <button type="button" class="theme-toggle-btn icon-btn" onclick="toggleTheme()" title="Ganti Tema">
      </button>
      <a href="/akun" class="icon-btn" title="Akun Saya">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
      </a>
    </div>
  </header>

  <!-- Mobile Drawer Overlay & Container -->
  <div id="mobileDrawerOverlay" class="mobile-drawer-overlay"></div>
  <nav id="mobileDrawer" class="mobile-drawer" aria-label="Menu Navigasi Mobile">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
      <a href="/" style="display: inline-flex; align-items: center;">
        <img src="{{ asset('logo/PACKAGES-04.png') }}" alt="SI-BISA" class="logo-light" style="height: 38px; width: auto; object-fit: contain;">
        <img src="{{ asset('logo/SI-BISA Black.png') }}?v=2" alt="SI-BISA" class="logo-dark" style="height: 38px; width: auto; object-fit: contain;">
      </a>
      <button type="button" id="mobileDrawerClose" class="icon-btn" aria-label="Tutup Menu">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
      </button>
    </div>

    <div class="nav-links-wrap">
      <a href="/app" class="nav-link {{ request()->is('app') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
        <span>Beranda</span>
      </a>
      <a href="/riwayat" class="nav-link {{ request()->is('riwayat*') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
        <span>Riwayat</span>
      </a>
      <a href="/pengaturan" class="nav-link {{ request()->is('pengaturan') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
        <span>Pengaturan</span>
      </a>
      <a href="/akun" class="nav-link {{ request()->is('akun') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        <span>Akun Saya</span>
      </a>
    </div>

    <div style="margin-top: auto; padding-top: 1.5rem; border-top: 1px solid var(--border-color); display: flex; flex-direction: column; gap: 0.6rem;">
      <a href="/" class="nav-link" style="color: var(--txt-sub);">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
        <span>Landing Page</span>
      </a>
      @auth
        @if(auth()->user()->role === 'admin')
          <a href="/admin" class="btn sm" style="width: 100%;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
            <span>Panel Admin</span>
          </a>
        @endif
      @else
        <a href="/login" class="btn sec sm" style="width: 100%;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <span>Login Admin</span>
        </a>
      @endauth
    </div>
  </nav>

  <div class="app-shell">
    <!-- Desktop Sidebar Navigation -->
    <aside class="app-sidebar">
      <a class="brand-logo" href="/" style="display: inline-flex; align-items: center; margin-bottom: 2.2rem; padding: 0 0.2rem;">
        <img src="{{ asset('logo/PACKAGES-04.png') }}" alt="SI-BISA" class="logo-light" style="height: 44px; width: auto; max-width: 180px; object-fit: contain;">
        <img src="{{ asset('logo/SI-BISA Black.png') }}?v=2" alt="SI-BISA" class="logo-dark" style="height: 44px; width: auto; max-width: 180px; object-fit: contain;">
      </a>

      <div class="nav-links-wrap">
        <a href="/app" class="nav-link {{ request()->is('app') ? 'active' : '' }}">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
          <span>Beranda</span>
        </a>
        <a href="/riwayat" class="nav-link {{ request()->is('riwayat*') ? 'active' : '' }}">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
          <span>Riwayat</span>
        </a>
        <a href="/pengaturan" class="nav-link {{ request()->is('pengaturan') ? 'active' : '' }}">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
          <span>Pengaturan</span>
        </a>
      </div>

      <!-- Footer Sidebar Navigasi -->
      <div style="margin-top: auto; padding-top: 1.5rem; border-top: 1px solid var(--border-color); display: flex; flex-direction: column; gap: 0.6rem;">
        <a href="/" class="nav-link" style="color: var(--txt-sub);" title="Kembali ke Landing Page">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
          <span>Landing Page</span>
        </a>
        @auth
          @if(auth()->user()->role === 'admin')
            <a href="/admin" class="btn sm" style="text-decoration: none;">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
              <span>Panel Admin</span>
            </a>
          @endif
        @else
          <a href="/login" class="btn sec sm" style="text-decoration: none;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <span>Login Admin</span>
          </a>
        @endauth
      </div>
    </aside>

    <!-- Main Workspace -->
    <main class="app-main">
      <div class="app-header-bar">
        <!-- Tombol Kembali ke Landing Page -->
        <a href="/" class="btn sec sm" style="text-decoration: none;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
          <span>Landing Page</span>
        </a>

        <!-- Bar Kanan: Switch Tema + Login Admin + Avatar Profil -->
        <div class="row" style="gap: 0.65rem;">
          <button type="button" class="theme-toggle-btn icon-btn" onclick="toggleTheme()" title="Ganti Tema">
          </button>
          @guest
            <a href="/login" class="btn sec sm" style="text-decoration: none;">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              <span>Login Admin</span>
            </a>
          @else
            @if(auth()->user()->role === 'admin')
              <a href="/admin" class="btn sec sm" style="text-decoration: none;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                <span>Panel Admin</span>
              </a>
            @endif
          @endguest
          <a href="/akun" class="icon-btn" title="Akun Saya">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          </a>
        </div>
      </div>
      <div class="page-fade">
        @yield('content')
      </div>
    </main>
  </div>
@endif

<script>
  const $ = id => document.getElementById(id);
  const csrf = document.querySelector('meta[name=csrf-token]')?.content || '';
  const esc = t => String(t ?? '').replace(/[&<>"]/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;'}[c]));
  
  // Handler Hamburger Mobile Drawer
  document.addEventListener('DOMContentLoaded', () => {
    const openBtn = $('mobileDrawerOpen');
    const closeBtn = $('mobileDrawerClose');
    const drawer = $('mobileDrawer');
    const overlay = $('mobileDrawerOverlay');
    if (openBtn && drawer && overlay) {
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
    }
    applyS();
  });

  async function api(url, o = {}){
    const h = {'Accept':'application/json','X-CSRF-TOKEN':csrf};
    if (o.json){ h['Content-Type']='application/json'; o.body = JSON.stringify(o.json); delete o.json; }
    const r = await fetch(url, {credentials:'same-origin', ...o, headers:{...h, ...(o.headers||{})}});
    let d = null; try { d = await r.json(); } catch(e){}
    if (!r.ok) throw Object.assign(new Error(d?.message || 'Terjadi kesalahan sistem'), {status:r.status, data:d});
    return d;
  }
  
  const fmtTgl = s => {
    if (!s) return '—';
    try {
      let d;
      if (s instanceof Date) {
        d = s;
      } else {
        let str = String(s).trim();
        // Hanya tambahkan T dan Z jika format MySQL standard "YYYY-MM-DD HH:mm:ss" tanpa timezone
        if (/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}$/.test(str)) {
          str = str.replace(' ', 'T') + 'Z';
        }
        d = new Date(str);
      }
      if (isNaN(d.getTime())) {
        return String(s || '—');
      }
      const formatted = d.toLocaleString('id-ID', {
        dateStyle: 'long',
        timeStyle: 'short'
      });
      if (!formatted || formatted.includes('Invalid')) {
        return String(s || '—');
      }
      return formatted + ' WIB';
    } catch(e){
      return String(s || '—');
    }
  };

  // ---- Pemutar urutan isyarat visual BISINDO ----
  function Player(stage, label, counter, timeDisplay){
    const P = {items:[], i:-1, t:null, playing:false};
    const timeEl = timeDisplay || document.getElementById('videoTime');

    const fmtTime = sec => {
      if (!sec || isNaN(sec) || !isFinite(sec)) return '0:00';
      const m = Math.floor(sec / 60);
      const s = Math.floor(sec % 60);
      return `${m}:${s < 10 ? '0' : ''}${s}`;
    };

    const toRelUrl = url => {
      if (!url) return '';
      try {
        if (url.startsWith('http://') || url.startsWith('https://')) {
          const u = new URL(url);
          return u.pathname + u.search + u.hash;
        }
      } catch(e) {}
      return url;
    };

    const render = () => {
      clearTimeout(P.t);
      const it = P.items[P.i];
      if (!it) return;

      const mediaUrl = toRelUrl(it.url_media);
      if (label) label.textContent = `${it.kata_asli} → ${it.kata_dasar}`;
      if (counter) counter.textContent = `Gerakan ${P.i+1} dari ${P.items.length}`;

      if (it.tipe_media === 'video') {
        stage.innerHTML = `<video id="activeVideoPlayer" playsinline muted autoplay preload="auto" webkit-playsinline src="${esc(mediaUrl)}" style="max-width:100%; max-height:340px; border-radius:var(--radius-md); object-fit:contain;"></video>`;

        const v = stage.querySelector('video');
        if (v) {
          v.playbackRate = S.speed || 1;
          v.muted = true;
          v.defaultMuted = true;
          v.playsInline = true;

          v.addEventListener('loadedmetadata', () => {
            if (timeEl && v.duration) timeEl.textContent = `0:00 / ${fmtTime(v.duration)}`;
          });
          v.addEventListener('timeupdate', () => {
            if (timeEl && v.duration) {
              timeEl.textContent = `${fmtTime(v.currentTime)} / ${fmtTime(v.duration)}`;
            }
          });

          // Panggil load() sebelum play() sesuai rekomendasi browser mobile
          try {
            v.load();
          } catch(e) {
            console.warn('video.load error:', e);
          }

          // Mainkan video dengan penanganan promise play() aman
          const playPromise = v.play();
          if (playPromise !== undefined) {
            playPromise.catch(err => {
              console.warn('Autoplay video dijeda oleh kebijakan browser mobile:', err);
            });
          }

          // Lanjut ke kata berikutnya saat video selesai diputar
          v.addEventListener('ended', () => {
            if (P.playing) {
              clearTimeout(P.t);
              P.next();
            }
          });

          // Fallback timer jika event ended tidak terpicu
          if (P.playing) {
            const fallbackMs = Math.max((it.durasi_ms || 2000), 1000) / (S.speed || 1) + 600;
            P.t = setTimeout(() => {
              if (P.playing) P.next();
            }, fallbackMs);
          }
        }
      } else {
        // Tipe media gambar / GIF
        stage.innerHTML = `<img src="${esc(mediaUrl)}" alt="${esc(it.kata_dasar)}" style="max-width:100%; max-height:340px; border-radius:var(--radius-md); object-fit:contain;">`;
        if (timeEl) {
          const durSec = (it.durasi_ms || 2000) / 1000;
          timeEl.textContent = `0:00 / ${fmtTime(durSec)}`;
        }
        if (P.playing) {
          P.t = setTimeout(P.next, (it.durasi_ms || 2000) / (S.speed || 1));
        }
      }
    };

    P.add = list => {
      const was = P.items.length;
      P.items.push(...list.filter(x => x.url_media));
      if (P.items.length && (!P.playing || was === 0) && S.autoplay){
        P.playing = true;
        P.i = Math.min(was, P.items.length - 1);
        render();
      } else if (P.i < 0 && P.items.length){
        P.i = 0;
        render();
      }
    };

    P.next = () => {
      if (P.i < P.items.length - 1){
        P.i++;
        render();
      } else if (S.repeat && P.items.length){
        P.i = 0;
        render();
      } else {
        P.playing = false;
        clearTimeout(P.t);
        const v = stage.querySelector('video');
        if (v && !v.paused) v.pause();
      }
    };

    P.prev = () => {
      if (P.i > 0){
        P.i--;
        render();
      }
    };

    P.clear = () => {
      clearTimeout(P.t);
      P.items = [];
      P.i = -1;
      P.playing = false;
      stage.innerHTML = '<div style="color:var(--txt-muted); text-align:center; padding:2rem;"><svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom:0.6rem; opacity:0.6;"><path d="M18 11V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v0"/><path d="M14 10V4a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v2"/><path d="M10 10.5V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v8"/><path d="M18 8a2 2 0 1 1 4 0v6a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15"/></svg><div style="font-size:0.95em;">Visualisasi bahasa isyarat BISINDO akan ditampilkan di sini</div></div>';
      if (label) label.textContent = '';
      if (counter) counter.textContent = 'Gerakan 0 dari 0';
      if (timeEl) timeEl.textContent = '0:00 / 0:00';
    };

    P.toggle = () => {
      P.playing = !P.playing;
      const v = stage.querySelector('video');
      if (P.playing){
        if (P.i >= P.items.length - 1 && !S.repeat) P.i = 0;
        if (v && v.paused) {
          const p = v.play();
          if (p !== undefined) p.catch(() => {});
        } else {
          render();
        }
      } else {
        clearTimeout(P.t);
        if (v && !v.paused) v.pause();
      }
    };

    return P;
  }
</script>
@stack('scripts')
</body>
</html>
