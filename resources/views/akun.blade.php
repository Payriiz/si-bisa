@extends('layouts.app')
@section('title','Akun - SI-BISA')
@section('content')

<!-- Header Akun -->
<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.8rem;">
  <div>
    <h2 style="font-size: 1.7em; font-weight: 700; color: var(--txt-main); margin: 0 0 0.1rem;">Akun</h2>
    <p style="color: var(--txt-sub); font-size: 0.9em; margin: 0;">Profil dan pengaturan akun Anda.</p>
  </div>
  <a href="/" class="btn sec sm" style="text-decoration: none;">
    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
    <span>Landing Page</span>
  </a>
</div>

<!-- Profil Card -->
<div class="card" id="profilCard" style="text-align: center; padding: 2.4rem 1.5rem; border-radius: var(--radius-xl); margin-bottom: 1.5rem;">
  <div style="width: 80px; height: 80px; border-radius: 50%; background: var(--primary-light); border: 3px solid var(--border-color); margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center; color: var(--primary);">
    <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
  </div>
  <b id="userName" style="font-size: 1.3em; color: var(--txt-main); display: block; margin-bottom: 0.3rem;">
    Memuat...
  </b>
  <span id="userRole" style="color: var(--txt-sub); font-size: 0.9em;">
    Memeriksa sesi login...
  </span>
</div>

<!-- List Navigasi Akun -->
<div style="display: flex; flex-direction: column; gap: 0.75rem;">
  <div class="item-card" style="border-radius: var(--radius-lg); cursor: pointer;" onclick="alert('Fitur pengubahan profil sedang dalam pengembangan.')">
    <div style="display: flex; align-items: center; gap: 1rem;">
      <div style="width: 44px; height: 44px; border-radius: var(--radius-md); background: var(--bg-subtle); display: flex; align-items: center; justify-content: center; color: var(--txt-sub); flex-shrink:0;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
      </div>
      <div>
        <b style="color: var(--txt-main); display: block; font-size: 0.98em; margin-bottom:0.1rem;">Profile Saya</b>
        <span style="color: var(--txt-sub); font-size: 0.85em;">Ubah nama, foto dan informasi akun.</span>
      </div>
    </div>
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--txt-muted); flex-shrink:0;"><polyline points="9 18 15 12 9 6"/></svg>
  </div>

  <a class="item-card" href="/pengaturan" style="border-radius: var(--radius-lg); text-decoration: none;">
    <div style="display: flex; align-items: center; gap: 1rem;">
      <div style="width: 44px; height: 44px; border-radius: var(--radius-md); background: var(--bg-subtle); display: flex; align-items: center; justify-content: center; color: var(--txt-sub); flex-shrink:0;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
      </div>
      <div>
        <b style="color: var(--txt-main); display: block; font-size: 0.98em; margin-bottom:0.1rem;">Pengaturan</b>
        <span style="color: var(--txt-sub); font-size: 0.85em;">Bahasa, tampilan, pemutaran, riwayat dan privasi.</span>
      </div>
    </div>
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--txt-muted); flex-shrink:0;"><polyline points="9 18 15 12 9 6"/></svg>
  </a>

  <a class="item-card" id="adminLink" href="/admin" style="border-radius: var(--radius-lg); text-decoration: none; display: none;">
    <div style="display: flex; align-items: center; gap: 1rem;">
      <div style="width: 44px; height: 44px; border-radius: var(--radius-md); background: var(--primary-light); display: flex; align-items: center; justify-content: center; color: var(--primary); flex-shrink:0;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
      </div>
      <div>
        <b style="color: var(--txt-main); display: block; font-size: 0.98em; margin-bottom:0.1rem;">Kelola Kamus Isyarat</b>
        <span style="color: var(--txt-sub); font-size: 0.85em;">CRUD video/foto kamus BISINDO (Khusus Admin).</span>
      </div>
    </div>
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--txt-muted); flex-shrink:0;"><polyline points="9 18 15 12 9 6"/></svg>
  </a>

  <div class="item-card" id="keluarBtn" style="border-radius: var(--radius-lg); cursor: pointer; display: none;">
    <div style="display: flex; align-items: center; gap: 1rem;">
      <div style="width: 44px; height: 44px; border-radius: var(--radius-md); background: var(--danger-light); display: flex; align-items: center; justify-content: center; color: var(--danger); flex-shrink:0;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
      </div>
      <div>
        <b style="color: var(--danger); display: block; font-size: 0.98em; margin-bottom:0.1rem;">Keluar</b>
        <span style="color: var(--txt-sub); font-size: 0.85em;">Keluar dari akun saat ini.</span>
      </div>
    </div>
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--txt-muted); flex-shrink:0;"><polyline points="9 18 15 12 9 6"/></svg>
  </div>
</div>

@push('scripts')
<script>
(async () => {
  const u = await api('/api/me');
  if (!u) {
    $('userName').textContent = 'Pengguna Tamu';
    $('userRole').innerHTML = 'Anda belum masuk ke akun. <br><br><a class="btn sm" href="/login" style="text-decoration:none; display:inline-flex; align-items:center; gap:0.4rem;"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg><span>Masuk Akun Admin</span></a>';
    return;
  }

  $('userName').textContent = u.name;
  $('userRole').innerHTML = `
    <span style="display:inline-flex; align-items:center; gap:0.4rem;">
      ${esc(u.email || '')}
      <span style="display:inline-block; width:4px; height:4px; border-radius:50%; background:var(--txt-muted);"></span>
      ${u.role === 'admin' ? '<span style="background:var(--primary-light); color:var(--primary); padding:0.15rem 0.6rem; border-radius:var(--radius-pill); font-size:0.85em; font-weight:700;">Administrator</span>' : 'Pengguna SI-BISA'}
    </span>
  `;

  if (u.role === 'admin') {
    $('adminLink').style.display = 'flex';
  }

  $('keluarBtn').style.display = 'flex';
  $('keluarBtn').onclick = async () => {
    await api('/api/logout', {method:'POST'});
    location.href = '/';
  };
})();
</script>
@endpush
@endsection
