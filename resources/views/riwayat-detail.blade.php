@extends('layouts.app')
@section('title','Detail Riwayat - SI-BISA')
@section('content')

<!-- Back Link Button -->
<div style="margin-bottom: 1.2rem;">
  <a href="/riwayat" style="color: var(--txt-sub); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 0.6rem; transition: color var(--transition-fast);">
    <span class="icon-btn" style="width:34px; height:34px;">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
    </span>
    <span>Kembali ke Riwayat</span>
  </a>
</div>

<!-- Header Detail -->
<div style="margin-bottom: 1.5rem;">
  <h2 style="font-size: 1.7em; font-weight: 700; color: var(--txt-main); margin-bottom: 0.25rem;">
    Detail Riwayat Terjemahan
  </h2>
  <div id="tgl" style="color: var(--txt-muted); font-size: 0.9em; display:flex; align-items:center; gap:0.4rem;">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
    <span>Memuat data...</span>
  </div>
</div>

<!-- Teks yang Dikenali Card -->
<div class="card" style="padding: 1.6rem; border-radius: var(--radius-xl);">
  <label style="margin-top:0; color: var(--txt-sub);">Teks yang Dikenali</label>
  <div id="teks" style="font-size: 1.2em; font-weight: 700; color: var(--txt-main); margin-bottom: 0.8rem; line-height: 1.4;">
    <div style="display:inline-flex; align-items:center; gap:0.5rem; color:var(--txt-muted); font-size:0.85em; font-weight:400;">
      <svg class="animate-spin" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
      <span>Memuat kalimat...</span>
    </div>
  </div>
  <div style="display: inline-flex; align-items:center; gap:0.4rem; font-size: 0.8em; background: var(--bg-subtle); color: var(--txt-sub); padding: 0.3rem 0.9rem; border-radius: var(--radius-pill); font-weight: 600; border: 1px solid var(--border-color);">
    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
    <span>Bahasa input: Bahasa Indonesia</span>
  </div>
</div>

<!-- Hasil Bahasa Isyarat BISINDO -->
<div style="margin-top: 1.8rem;">
  <h3 style="font-size: 1.3em; font-weight: 700; color: var(--txt-main); margin-bottom: 0.8rem;">
    Hasil Bahasa Isyarat
  </h3>

  <div class="card" style="padding: 1.6rem; border-radius: var(--radius-xl);">
    <div id="kata" style="font-weight: 700; min-height: 1.6em; text-align: center; color: var(--primary); font-size: 1.1em; margin-bottom: 0.5rem;"></div>

    <!-- Stage Visual BISINDO -->
    <div id="stage" class="stage" style="border-radius: var(--radius-lg);">
      <div style="color: var(--txt-muted); text-align: center; padding: 2rem;">
        <svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom:0.6rem; opacity:0.5;"><path d="M18 11V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v0"/><path d="M14 10V4a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v2"/><path d="M10 10.5V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v8"/><path d="M18 8a2 2 0 1 1 4 0v6a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15"/></svg>
        <div style="font-size:0.95em;">Memuat video / animasi peragaan isyarat BISINDO...</div>
      </div>
    </div>

    <!-- Sequential Controls -->
    <div style="background: var(--bg-subtle); border: 1px solid var(--border-color); border-radius: var(--radius-pill); padding: 0.5rem 1.2rem; margin-top: 1rem; display: flex; align-items: center; justify-content: space-between; gap: 0.8rem; flex-wrap: wrap;">
      <button id="play" class="icon-btn" style="width:36px; height:36px;" title="Putar / Jeda">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
      </button>

      <div class="row" style="gap: 0.6rem;">
        <button id="prev" class="icon-btn" style="width:36px; height:36px;" title="Sebelumnya">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
        </button>
        <span id="hitung" style="font-size: 0.9em; font-weight: 600; color: var(--txt-main);">Gerakan 0 dari 0</span>
        <button id="next" class="icon-btn" style="width:36px; height:36px;" title="Selanjutnya">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        </button>
      </div>
    </div>

    <div id="warn" class="warn" style="margin-top: 0.8rem; text-align: center;"></div>
  </div>
</div>

<!-- Informasi Penerjemahan -->
<div class="card" style="padding: 1.6rem; border-radius: var(--radius-xl); margin-top: 1.5rem;">
  <div style="display:flex; align-items:center; gap:0.6rem; margin-bottom:1rem;">
    <div style="width:34px; height:34px; border-radius:50%; background:var(--primary-light); display:flex; align-items:center; justify-content:center; color:var(--primary); flex-shrink:0;">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
    </div>
    <b style="font-size: 1.05em; color: var(--txt-main);">Informasi Penerjemahan</b>
  </div>
  <div class="table-responsive">
    <table>
      <tr>
        <td style="color: var(--txt-sub); width: 42%; font-size:0.93em;">Metode input</td>
        <td style="font-weight: 600; color: var(--txt-main); font-size:0.93em;">Web Speech API / Teks Manual</td>
      </tr>
      <tr>
        <td style="color: var(--txt-sub); font-size:0.93em;">Pemrosesan teks</td>
        <td style="font-weight: 600; color: var(--txt-main); font-size:0.93em;">Algoritma Stemming Sastrawi</td>
      </tr>
      <tr>
        <td style="color: var(--txt-sub); font-size:0.93em; border-bottom:0;">Bahasa isyarat</td>
        <td style="font-weight: 600; color: var(--txt-main); font-size:0.93em; border-bottom:0;">BISINDO (Bahasa Isyarat Indonesia)</td>
      </tr>
    </table>
  </div>
</div>

@push('scripts')
<script>
const P = Player($('stage'), $('kata'), $('hitung'));
$('prev').onclick = P.prev;
$('next').onclick = () => { P.playing = false; P.next(); };
$('play').onclick = P.toggle;

(async () => {
  try {
    const sessionId = localStorage.getItem('sibisa_session_id');
    const url = '/api/riwayat/{{ (int) $id }}' + (sessionId ? '?session_id=' + encodeURIComponent(sessionId) : '');
    const d = await api(url);

    $('tgl').innerHTML = `
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
      <span>${fmtTgl(d?.terjemahan?.created_at)}</span>
    `;
    $('teks').innerHTML = `<span style="font-style:italic; color:var(--txt-muted); font-weight:400; margin-right:0.3rem;">"</span>${esc(d?.terjemahan?.teks_asli || '')}<span style="font-style:italic; color:var(--txt-muted); font-weight:400; margin-left:0.3rem;">"</span>`;

    const hilang = (d.detail || []).filter(x => !x.url_media).map(x => x.kata_dasar);
    if (hilang.length) {
      $('warn').innerHTML = `
        <div style="display:inline-flex; align-items:center; gap:0.5rem; background:var(--warning-light); padding:0.6rem 1rem; border-radius:var(--radius-md); border:1px solid var(--warning); color:#92400e; font-size:0.9em;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
          <span>Kata yang belum tersedia di kamus: <b>${esc(hilang.join(', '))}</b></span>
        </div>
      `;
    }

    const items = (d.detail || []).filter(x => x.url_media);
    if (items.length) {
      P.add(items);
    } else {
      $('stage').innerHTML = '<div style="color:var(--txt-muted); padding:2rem; text-align:center; font-size:0.95em;">Semua kata belum memiliki rekaman isyarat</div>';
    }
  } catch(e) {
    $('teks').textContent = 'Riwayat tidak ditemukan atau akses ditolak.';
    $('warn').textContent = e.message;
  }
})();
</script>
@endpush
@endsection
