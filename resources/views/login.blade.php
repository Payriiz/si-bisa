@extends('layouts.app')
@section('bare','1')
@section('title','Login - SI-BISA')
@section('content')

<style>
  *, *::before, *::after { box-sizing: border-box; }
  html, body { max-width: 100%; overflow-x: hidden; height: 100%; }

  .login-split-container {
    display: flex;
    min-height: 100vh;
    width: 100%;
    position: relative;
    background: var(--bg-card);
  }

  /* ─── LEFT PANEL (DESKTOP) ─── */
  .login-left-panel {
    flex: 0 0 46%;
    background: #eff6ff;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 3rem 2.5rem;
    text-align: center;
  }
  html[data-theme="gelap"] .login-left-panel {
    background: linear-gradient(145deg, #0b1120 0%, #1e293b 100%) !important;
  }

  /* Wave decorations on Left Panel */
  .wave-top-left {
    position: absolute;
    top: 0;
    left: 0;
    width: 260px;
    height: 260px;
    pointer-events: none;
    opacity: 0.65;
  }
  .wave-bottom-left {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 300px;
    height: 300px;
    pointer-events: none;
    opacity: 0.85;
  }

  .left-panel-content {
    position: relative;
    z-index: 2;
    max-width: 380px;
  }
  .left-panel-logo {
    height: 80px;
    width: auto;
    object-fit: contain;
    margin-bottom: 1.5rem;
    display: inline-block;
  }
  .left-panel-tagline {
    font-size: 1.12rem;
    font-weight: 500;
    color: #475569;
    line-height: 1.6;
  }
  html[data-theme="gelap"] .left-panel-tagline {
    color: #94a3b8 !important;
  }

  /* ─── RIGHT PANEL (FORM CONTAINER) ─── */
  .login-right-panel {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 2.5rem 2rem;
    position: relative;
    background: var(--bg-card);
  }

  .login-topbar-actions {
    position: absolute;
    top: 1.5rem;
    right: 2rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    z-index: 10;
  }

  .login-form-box {
    width: 100%;
    max-width: 410px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
  }

  /* Mobile-only wave decorations */
  .mobile-wave-tr {
    display: none;
    position: absolute;
    top: 0;
    right: 0;
    width: 180px;
    height: 180px;
    pointer-events: none;
    opacity: 0.55;
    z-index: 1;
  }
  .mobile-wave-bl {
    display: none;
    position: absolute;
    bottom: 0;
    left: 0;
    width: 220px;
    height: 220px;
    pointer-events: none;
    opacity: 0.75;
    z-index: 1;
  }

  .mobile-logo-header {
    display: none;
    text-align: center;
    margin-bottom: 1.25rem;
  }

  .login-title {
    font-size: 1.6em;
    font-weight: 700;
    color: var(--txt-main);
    text-align: center;
    margin-bottom: 2rem;
    letter-spacing: -0.01em;
  }

  /* ─── INPUT FIELDS (FIGMA PILL & #F3F4F6) ─── */
  .figma-input-wrap {
    position: relative;
    margin-bottom: 1.15rem;
  }
  .figma-input-icon {
    position: absolute;
    left: 1.25rem;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    display: flex;
    align-items: center;
    pointer-events: none;
  }
  .figma-input-pill {
    width: 100%;
    padding: 0.88rem 1.4rem 0.88rem 3.1rem !important;
    border-radius: var(--radius-pill) !important;
    background: #f3f4f6 !important;
    border: 1.5px solid transparent !important;
    color: var(--txt-main) !important;
    font-size: 0.95em !important;
    outline: none;
    transition: all var(--transition-fast);
  }
  html[data-theme="gelap"] .figma-input-pill {
    background: #1e293b !important;
    border-color: #334155 !important;
  }
  .figma-input-pill:focus {
    border-color: #2563eb !important;
    background: var(--bg-card) !important;
    box-shadow: 0 0 0 3.5px rgba(37, 99, 235, 0.16) !important;
  }

  .btn-eye-toggle {
    position: absolute;
    right: 1.2rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    color: #94a3b8;
    display: flex;
    align-items: center;
    padding: 0;
    transition: color var(--transition-fast);
  }
  .btn-eye-toggle:hover {
    color: var(--txt-main);
  }

  /* Remember & Forgot Password Row */
  .remember-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 0.88em;
    margin-bottom: 1.6rem;
    color: var(--txt-sub);
  }
  .remember-label {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
    font-weight: 500;
  }
  .remember-label input {
    accent-color: #2563eb;
    width: 16px;
    height: 16px;
    cursor: pointer;
  }
  .forgot-link {
    color: var(--txt-sub);
    text-decoration: none;
    cursor: pointer;
    font-weight: 500;
    background: none;
    border: none;
    font-family: inherit;
    font-size: inherit;
    padding: 0;
    transition: color var(--transition-fast);
  }
  .forgot-link:hover {
    color: var(--primary);
  }

  /* ─── FULL WIDTH PILL SUBMIT BUTTON ─── */
  .btn-masuk-pill {
    width: 100%;
    padding: 0.95rem;
    background: #2563eb;
    color: #ffffff;
    font-weight: 700;
    font-size: 1.02em;
    letter-spacing: 0.5px;
    border-radius: var(--radius-pill);
    border: 0;
    cursor: pointer;
    box-shadow: 0 4px 14px rgba(37, 99, 235, 0.28);
    transition: all var(--transition-fast);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
  }
  .btn-masuk-pill:hover {
    background: #1d4ed8;
    transform: translateY(-1.5px);
    box-shadow: 0 6px 18px rgba(37, 99, 235, 0.35);
  }
  .btn-masuk-pill:active {
    transform: translateY(0);
  }
  .btn-masuk-pill:disabled {
    opacity: 0.55;
    cursor: not-allowed;
    transform: none;
  }

  /* Bottom navigation back links */
  .login-bottom-links {
    display: flex;
    justify-content: center;
    gap: 1.2rem;
    margin-top: 1.8rem;
    font-size: 0.88em;
  }
  .login-bottom-links a {
    color: var(--txt-sub);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    font-weight: 500;
  }
  .login-bottom-links a:hover {
    color: var(--primary);
  }

  /* ─── MOBILE RESPONSIVE ─── */
  @media (max-width: 850px) {
    .login-left-panel { display: none !important; }
    .mobile-wave-tr { display: block !important; }
    .mobile-wave-bl { display: block !important; }
    .mobile-logo-header { display: block !important; }

    .login-right-panel {
      padding: 3rem 1.4rem;
      min-height: 100vh;
    }
    .login-topbar-actions {
      top: 1rem;
      right: 1.2rem;
    }
    .login-title {
      font-size: 1.4em;
      margin-bottom: 1.6rem;
    }
  }

  @media (max-width: 768px) {
    html, body {
      height: 100dvh !important;
      max-height: 100dvh !important;
      overflow: hidden !important;
    }
    .login-split-container {
      height: 100dvh !important;
      max-height: 100dvh !important;
      overflow: hidden !important;
      position: relative;
    }
    .login-right-panel {
      height: 100dvh !important;
      max-height: 100dvh !important;
      overflow: hidden !important;
      padding: 1.25rem 1.4rem !important;
      display: flex !important;
      flex-direction: column !important;
      justify-content: center !important;
    }
    .mobile-wave-tr {
      width: 135px !important;
      height: 135px !important;
      top: 0 !important;
      right: 0 !important;
    }
    .mobile-wave-bl {
      width: 155px !important;
      height: 155px !important;
      bottom: 0 !important;
      left: 0 !important;
    }
    .login-topbar-actions {
      top: 0.75rem !important;
      right: 0.85rem !important;
    }
    .login-topbar-actions .icon-btn {
      width: 34px !important;
      height: 34px !important;
    }
    .login-form-box {
      max-width: 330px !important;
      width: 100% !important;
      margin: 0 auto !important;
    }
    .mobile-logo-header {
      margin-bottom: 0.6rem !important;
    }
    .mobile-logo-header img {
      height: 40px !important;
    }
    .login-title {
      font-size: 1.2em !important;
      margin-bottom: 1rem !important;
    }
    .figma-input-wrap {
      margin-bottom: 0.65rem !important;
    }
    .figma-input-pill {
      padding: 0.7rem 1.15rem 0.7rem 2.8rem !important;
      font-size: 0.88em !important;
    }
    .figma-input-icon {
      left: 1rem !important;
    }
    .btn-eye-toggle {
      right: 1rem !important;
    }
    .remember-row {
      margin-bottom: 0.85rem !important;
      font-size: 0.82em !important;
    }
    .btn-masuk-pill {
      padding: 0.75rem !important;
      font-size: 0.94em !important;
    }
    .login-bottom-links {
      margin-top: 0.85rem !important;
      font-size: 0.82em !important;
    }
  }
</style>

<div class="login-split-container">

  {{-- ═══════════════════════════════════════
       PANEL KIRI (DESKTOP FIGMA SPEC)
  ═══════════════════════════════════════ --}}
  <div class="login-left-panel">
    {{-- Top-left organic wave decoration --}}
    <svg class="wave-top-left" viewBox="0 0 260 260" fill="none">
      <path d="M0,0 L200,0 C200,90 140,160 50,190 C20,200 0,195 0,195 Z" fill="#93c5fd" fill-opacity="0.5"/>
      <path d="M0,0 L140,0 C140,65 95,115 35,135 C10,145 0,140 0,140 Z" fill="#3b82f6" fill-opacity="0.75"/>
    </svg>

    {{-- Bottom-left organic wave decoration --}}
    <svg class="wave-bottom-left" viewBox="0 0 300 300" fill="none">
      <path d="M0,120 C80,120 160,190 190,300 L0,300 Z" fill="#60a5fa" fill-opacity="0.45"/>
      <path d="M0,170 C60,170 120,225 145,300 L0,300 Z" fill="#2563eb" fill-opacity="0.8"/>
    </svg>

    <div class="left-panel-content">
      <a href="/" style="display:inline-block; text-decoration:none;">
        <img src="{{ asset('logo/PACKAGES-04.png') }}" alt="SI-BISA" class="left-panel-logo logo-light">
        <img src="{{ asset('logo/SI-BISA Black.png') }}?v=2" alt="SI-BISA" class="left-panel-logo logo-dark">
      </a>
      <p class="left-panel-tagline">
        Membantu komunikasi jadi lebih mudah untuk semua
      </p>
    </div>
  </div>

  {{-- ═══════════════════════════════════════
       PANEL KANAN (FORM LOGIN)
  ═══════════════════════════════════════ --}}
  <div class="login-right-panel">
    {{-- Topbar Actions: Theme toggle & back to landing --}}
    <div class="login-topbar-actions">
      <button type="button" class="theme-toggle-btn icon-btn" onclick="toggleTheme()" title="Ganti Tema" style="width:38px; height:38px;"></button>
      <a href="/" class="icon-btn" title="Kembali ke Landing Page" style="width:38px; height:38px;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
      </a>
    </div>

    {{-- Mobile background waves --}}
    <svg class="mobile-wave-tr" viewBox="0 0 180 180" fill="none">
      <path d="M180,0 L70,0 C70,55 105,95 150,110 C165,115 180,112 180,112 Z" fill="#93c5fd" fill-opacity="0.45"/>
      <path d="M180,0 L110,0 C110,40 135,68 165,78 C175,82 180,80 180,80 Z" fill="#3b82f6" fill-opacity="0.6"/>
    </svg>

    <svg class="mobile-wave-bl" viewBox="0 0 220 220" fill="none">
      <path d="M0,90 C60,90 120,140 145,220 L0,220 Z" fill="#60a5fa" fill-opacity="0.35"/>
      <path d="M0,130 C45,130 90,170 110,220 L0,220 Z" fill="#2563eb" fill-opacity="0.75"/>
    </svg>

    <div class="login-form-box">
      {{-- Mobile Logo Header --}}
      <div class="mobile-logo-header">
        <a href="/" style="display:inline-block;">
          <img src="{{ asset('logo/PACKAGES-04.png') }}" alt="SI-BISA" class="logo-light" style="height:52px; width:auto; object-fit:contain;">
          <img src="{{ asset('logo/SI-BISA Black.png') }}?v=2" alt="SI-BISA" class="logo-dark" style="height:52px; width:auto; object-fit:contain;">
        </a>
      </div>

      <h1 class="login-title">
        Selamat datang di SI-BISA
      </h1>

      {{-- Input Nama Pengguna (Email) --}}
      <div class="figma-input-wrap">
        <span class="figma-input-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        </span>
        <input id="email" type="text" placeholder="Nama Pengguna" class="figma-input-pill" autocomplete="username">
      </div>

      {{-- Input Kata Sandi --}}
      <div class="figma-input-wrap">
        <span class="figma-input-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
        </span>
        <input id="password" type="password" placeholder="Kata Sandi" class="figma-input-pill" autocomplete="current-password" style="padding-right: 3rem !important;">
        <button type="button" id="togglePwd" class="btn-eye-toggle" title="Tampilkan/Sembunyikan Kata Sandi">
          <svg id="eyeIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
        </button>
      </div>

      {{-- Remember Me & Forgot Password --}}
      <div class="remember-row">
        <label class="remember-label">
          <input id="remember" type="checkbox">
          <span>Ingat saya</span>
        </label>
        <button type="button" class="forgot-link" onclick="alert('Silakan hubungi administrator sistem untuk mereset kata sandi Anda.')">
          Lupa Kata sandi?
        </button>
      </div>

      {{-- Warning Message Alert (Hidden by default, shown only when error occurs) --}}
      <div id="warn" class="hidden" style="display:none; padding:0.75rem 1rem; background:var(--danger-light); border:1px solid rgba(239,68,68,0.3); border-radius:var(--radius-md); color:var(--danger); font-size:0.9em; margin-bottom:1.2rem; align-items:center; gap:0.5rem;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
        <span id="warnText"></span>
      </div>

      @if($errors->any() || session('error'))
        <div id="warnBlade" style="padding:0.75rem 1rem; background:var(--danger-light); border:1px solid rgba(239,68,68,0.3); border-radius:var(--radius-md); color:var(--danger); font-size:0.9em; margin-bottom:1.2rem; display:flex; align-items:center; gap:0.5rem;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
          <span>{{ session('error') ?: $errors->first() }}</span>
        </div>
      @endif

      {{-- Tombol MASUK (Figma Spec) --}}
      <button id="masuk" class="btn-masuk-pill">
        MASUK
      </button>

      {{-- Bottom navigation links --}}
      <div class="login-bottom-links">
        <a href="/">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
          <span>Landing Page</span>
        </a>
        <span style="color:var(--border-color);">•</span>
        <a href="/app">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
          <span>Buka Aplikasi</span>
        </a>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
// Toggle show/hide password
$('togglePwd').addEventListener('click', () => {
  const pwd = $('password');
  const icon = $('eyeIcon');
  if (pwd.type === 'password') {
    pwd.type = 'text';
    icon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>';
  } else {
    pwd.type = 'password';
    icon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
  }
});

function showWarn(msg) {
  if (!msg) return;
  const w = $('warn');
  $('warnText').textContent = msg;
  w.classList.remove('hidden');
  w.style.display = 'flex';
  const bladeWarn = $('warnBlade');
  if (bladeWarn) bladeWarn.style.display = 'none';
}
function hideWarn() {
  const w = $('warn');
  w.classList.add('hidden');
  w.style.display = 'none';
  $('warnText').textContent = '';
  const bladeWarn = $('warnBlade');
  if (bladeWarn) bladeWarn.style.display = 'none';
}

async function login(){
  hideWarn();
  const email = $('email').value.trim();
  const password = $('password').value;
  if (!email || !password) {
    showWarn('Silakan isi nama pengguna dan kata sandi Anda.');
    return;
  }
  
  const btn = $('masuk');
  btn.disabled = true;
  btn.innerHTML = '<svg class="animate-spin" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 12a9 9 0 1 1-6.219-8.56"></path></svg><span>Memverifikasi...</span>';

  try {
    const d = await api('/api/login', {
      method: 'POST',
      json: {
        email: email,
        password: password,
        remember: $('remember').checked
      }
    });
    location.href = d.role === 'admin' ? '/admin' : '/app';
  } catch(e) {
    showWarn(e.data?.message || (e.data?.errors ? Object.values(e.data.errors).flat()[0] : e.message));
  } finally {
    btn.disabled = false;
    btn.textContent = 'MASUK';
  }
}

$('masuk').onclick = login;
document.addEventListener('keydown', e => {
  if (e.key === 'Enter') login();
});

if (typeof applyS === 'function') applyS();
</script>
@endpush
@endsection
