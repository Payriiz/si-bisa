@extends('layouts.app')
@section('title','Riwayat - SI-BISA')
@section('content')

<!-- Header Riwayat -->
<div style="margin-bottom: 1.6rem;">
  <h2 style="font-size: 1.7em; font-weight: 700; color: var(--txt-main); margin-bottom: 0.25rem;">
    Riwayat Terjemahan
  </h2>
  <p style="color: var(--txt-sub); font-size: 0.95em;">
    Daftar rekaman konversi suara dan teks ke bahasa isyarat BISINDO.
  </p>
</div>

<!-- Search Input -->
<div class="card" style="padding: 1.2rem; border-radius: var(--radius-xl); margin-bottom: 1.5rem;">
  <div style="position: relative;">
    <span style="position: absolute; left: 1.2rem; top: 50%; transform: translateY(-50%); color: var(--txt-muted); display:flex; align-items:center; pointer-events:none;">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
    </span>
    <input id="q" type="text" placeholder="Cari kata atau tanggal..." class="input-pill" style="padding-left: 2.9rem;">
  </div>
</div>

<!-- Container Daftar Riwayat -->
<div id="list">
  <div class="card" style="text-align: center; color: var(--txt-muted); padding: 2.5rem; border-radius: var(--radius-xl);">
    <div style="display:inline-flex; align-items:center; gap:0.6rem; margin-bottom:0.5rem;">
      <svg class="animate-spin" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
      <span>Memuat riwayat...</span>
    </div>
  </div>
</div>

@push('scripts')
<script>
let timer;
const sessionId = localStorage.getItem('sibisa_session_id');

async function muat(){
  const q = $('q').value.trim();
  const params = new URLSearchParams();
  if (q) params.set('q', q);
  if (sessionId) params.set('session_id', sessionId);

  try {
    const rows = await api('/api/riwayat?' + params.toString());
    
    if (!rows.length) {
      $('list').innerHTML = `
        <div class="card" style="text-align: center; padding: 3.5rem 1.5rem; border-radius: var(--radius-xl);">
          <div style="width:60px; height:60px; border-radius:50%; background:var(--bg-subtle); border:1px solid var(--border-color); display:flex; align-items:center; justify-content:center; margin:0 auto 1rem; color:var(--txt-muted);">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
          </div>
          <b style="font-size: 1.1em; color: var(--txt-main); display: block; margin-bottom: 0.4rem;">Riwayat masih kosong</b>
          <p style="color: var(--txt-sub); font-size: 0.93em; margin-bottom: 1.4rem; max-width:360px; margin-left:auto; margin-right:auto;">Belum ada hasil terjemahan yang disimpan untuk sesi ini. Mulai menerjemahkan di halaman Beranda.</p>
          <a class="btn sm" href="/app" style="text-decoration:none;">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
            <span>Mulai Terjemahkan di Beranda</span>
          </a>
        </div>
      `;
      return;
    }

    $('list').innerHTML = rows.map(x => `
      <div class="item-card" style="border-radius: var(--radius-lg); padding: 1.1rem 1.4rem;">
        <div style="display: flex; align-items: center; gap: 1rem; min-width:0; flex:1;">
          <div style="width: 44px; height: 44px; border-radius: 50%; background: var(--primary-light); border: 1px solid rgba(37,99,235,0.2); display: flex; align-items: center; justify-content: center; color: var(--primary); flex-shrink: 0;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
          </div>
          <div style="min-width:0;">
            <b style="font-size: 1.0em; color: var(--txt-main); display: block; margin-bottom: 0.2rem; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:360px;">
              ${esc(x.teks_asli)}
            </b>
            <span style="color: var(--txt-muted); font-size: 0.84em; display:flex; align-items:center; gap:0.35rem;">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              ${fmtTgl(x.created_at)}
            </span>
          </div>
        </div>
        <a class="btn sec sm" href="/riwayat/${x.id}" style="padding: 0.48rem 1.2rem; flex-shrink:0; text-decoration:none; display:inline-flex; align-items:center; gap:0.4rem;">
          <span>Lihat</span>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </div>
    `).join('');

  } catch(e) {
    $('list').innerHTML = `
      <div class="card" style="text-align: center; padding: 2rem; border-radius: var(--radius-xl); border-color: var(--danger);">
        <div style="color:var(--danger); display:flex; align-items:center; justify-content:center; gap:0.5rem; font-weight:600;">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          <span>Gagal memuat riwayat: ${esc(e.message)}</span>
        </div>
      </div>
    `;
  }
}

$('q').oninput = () => {
  clearTimeout(timer);
  timer = setTimeout(muat, 300);
};

muat();
</script>
@endpush
@endsection
