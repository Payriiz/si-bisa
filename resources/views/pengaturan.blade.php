@extends('layouts.app')
@section('title','Pengaturan - SI-BISA')
@section('content')

<!-- Header Pengaturan -->
<div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.8rem;">
  <div style="width: 44px; height: 44px; border-radius: var(--radius-md); background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; flex-shrink:0;">
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
  </div>
  <div>
    <h2 style="font-size: 1.7em; font-weight: 700; color: var(--txt-main); margin: 0 0 0.1rem;">Pengaturan</h2>
    <p style="color: var(--txt-sub); font-size: 0.9em; margin: 0;">Sesuaikan preferensi tampilan dan pemutaran isyarat.</p>
  </div>
</div>

<!-- Card 1: Bahasa -->
<div class="card" style="padding: 1.6rem; border-radius: var(--radius-xl);">
  <div style="display:flex; align-items:center; gap:0.6rem; margin-bottom: 1.2rem;">
    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--primary);"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
    <b style="font-size: 1.0em; color: var(--txt-main);">Bahasa</b>
  </div>
  
  <div style="margin-bottom: 1rem;">
    <label style="margin-top:0">Bahasa input suara</label>
    <div style="position: relative;">
      <input type="text" value="Bahasa Indonesia" class="input-pill" disabled style="padding-right: 2.5rem; font-weight: 600; background: var(--bg-subtle);">
      <span style="position: absolute; right: 1.1rem; top: 50%; transform: translateY(-50%); color: var(--success); display:flex; align-items:center;">
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </span>
    </div>
  </div>

  <div>
    <label>Bahasa isyarat</label>
    <div style="position: relative;">
      <input type="text" value="BISINDO" class="input-pill" disabled style="font-weight: 600; background: var(--bg-subtle);">
      <span style="position: absolute; right: 1.1rem; top: 50%; transform: translateY(-50%); font-size: 0.78em; background: var(--primary-light); color: var(--primary); padding: 0.25rem 0.65rem; border-radius: var(--radius-pill); font-weight: 700; letter-spacing:0.5px;">AKTIF</span>
    </div>
  </div>
</div>

<!-- Card 2: Tampilan -->
<div class="card" style="padding: 1.6rem; border-radius: var(--radius-xl);">
  <div style="display:flex; align-items:center; gap:0.6rem; margin-bottom: 1.2rem;">
    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--primary);"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
    <b style="font-size: 1.0em; color: var(--txt-main);">Tampilan</b>
  </div>
  
  <div style="margin-bottom: 1.4rem;">
    <label style="margin-top:0">Tema aplikasi</label>
    <div style="display:flex; gap: 1rem; margin-top: 0.6rem; flex-wrap:wrap;">
      <label class="pref-option" style="display:inline-flex; align-items:center; gap:0.6rem; cursor:pointer; margin:0; font-weight:500; padding:0.7rem 1.1rem; border-radius:var(--radius-md); border:1.5px solid var(--border-color); flex:1; min-width:120px; transition:border-color var(--transition-fast), background-color var(--transition-fast);">
        <input type="radio" name="theme" value="terang" style="width:auto; accent-color:var(--primary);">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
        <span>Terang</span>
      </label>
      <label class="pref-option" style="display:inline-flex; align-items:center; gap:0.6rem; cursor:pointer; margin:0; font-weight:500; padding:0.7rem 1.1rem; border-radius:var(--radius-md); border:1.5px solid var(--border-color); flex:1; min-width:120px; transition:border-color var(--transition-fast), background-color var(--transition-fast);">
        <input type="radio" name="theme" value="gelap" style="width:auto; accent-color:var(--primary);">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
        <span>Gelap</span>
      </label>
    </div>
  </div>

  <div>
    <label>Ukuran teks</label>
    <div style="display:flex; gap: 0.7rem; margin-top: 0.6rem; flex-wrap:wrap;">
      <label class="pref-option" style="display:inline-flex; align-items:center; gap:0.5rem; cursor:pointer; margin:0; font-weight:500; padding:0.65rem 1rem; border-radius:var(--radius-md); border:1.5px solid var(--border-color); flex:1; min-width:90px; transition:border-color var(--transition-fast), background-color var(--transition-fast);">
        <input type="radio" name="size" value="kecil" style="width:auto; accent-color:var(--primary);">
        <span style="font-size:0.85em;">Kecil</span>
      </label>
      <label class="pref-option" style="display:inline-flex; align-items:center; gap:0.5rem; cursor:pointer; margin:0; font-weight:500; padding:0.65rem 1rem; border-radius:var(--radius-md); border:1.5px solid var(--border-color); flex:1; min-width:90px; transition:border-color var(--transition-fast), background-color var(--transition-fast);">
        <input type="radio" name="size" value="sedang" style="width:auto; accent-color:var(--primary);">
        <span>Sedang</span>
      </label>
      <label class="pref-option" style="display:inline-flex; align-items:center; gap:0.5rem; cursor:pointer; margin:0; font-weight:500; padding:0.65rem 1rem; border-radius:var(--radius-md); border:1.5px solid var(--border-color); flex:1; min-width:90px; transition:border-color var(--transition-fast), background-color var(--transition-fast);">
        <input type="radio" name="size" value="besar" style="width:auto; accent-color:var(--primary);">
        <span style="font-size:1.1em;">Besar</span>
      </label>
    </div>
  </div>
</div>

<!-- Card 3: Pemutaran Isyarat -->
<div class="card" style="padding: 1.6rem; border-radius: var(--radius-xl);">
  <div style="display:flex; align-items:center; gap:0.6rem; margin-bottom: 1.2rem;">
    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--primary);"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
    <b style="font-size: 1.0em; color: var(--txt-main);">Pemutaran Isyarat</b>
  </div>
  
  <div style="margin-bottom: 1.4rem;">
    <label style="margin-top:0">Kecepatan video</label>
    <div style="display:flex; gap: 0.7rem; margin-top: 0.6rem; flex-wrap:wrap;">
      <label class="pref-option" style="display:inline-flex; align-items:center; gap:0.5rem; cursor:pointer; margin:0; font-weight:500; padding:0.65rem 1rem; border-radius:var(--radius-md); border:1.5px solid var(--border-color); flex:1; min-width:80px; transition:border-color var(--transition-fast), background-color var(--transition-fast);">
        <input type="radio" name="speed" value="0.5" style="width:auto; accent-color:var(--primary);">
        <span>0,5×</span>
      </label>
      <label class="pref-option" style="display:inline-flex; align-items:center; gap:0.5rem; cursor:pointer; margin:0; font-weight:500; padding:0.65rem 1rem; border-radius:var(--radius-md); border:1.5px solid var(--border-color); flex:1; min-width:80px; transition:border-color var(--transition-fast), background-color var(--transition-fast);">
        <input type="radio" name="speed" value="0.75" style="width:auto; accent-color:var(--primary);">
        <span>0,75×</span>
      </label>
      <label class="pref-option" style="display:inline-flex; align-items:center; gap:0.5rem; cursor:pointer; margin:0; font-weight:500; padding:0.65rem 1rem; border-radius:var(--radius-md); border:1.5px solid var(--border-color); flex:1; min-width:80px; transition:border-color var(--transition-fast), background-color var(--transition-fast);">
        <input type="radio" name="speed" value="1" style="width:auto; accent-color:var(--primary);">
        <span>1× Normal</span>
      </label>
    </div>
  </div>

  <div style="display:flex; flex-direction:column; gap:0.9rem;">
    <label class="toggle-row" style="display:flex; align-items:center; justify-content:space-between; gap:1rem; padding:1rem 1.2rem; border-radius:var(--radius-md); border:1.5px solid var(--border-color); cursor:pointer; margin:0; transition:border-color var(--transition-fast), background-color var(--transition-fast);">
      <div style="display:flex; align-items:flex-start; gap:0.75rem;">
        <div style="width:36px; height:36px; border-radius:var(--radius-sm); background:var(--bg-subtle); display:flex; align-items:center; justify-content:center; color:var(--txt-sub); flex-shrink:0; margin-top:2px;">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        </div>
        <div>
          <b style="color:var(--txt-main); font-size:0.95em; display:block; margin-bottom:0.15rem;">Putar otomatis</b>
          <span style="color:var(--txt-sub); font-size:0.85em; line-height:1.4;">Putar urutan gerakan tanpa klik satu per satu.</span>
        </div>
      </div>
      <input type="checkbox" id="autoplay" style="width:auto; accent-color:var(--primary); transform:scale(1.3); flex-shrink:0;">
    </label>

    <label class="toggle-row" style="display:flex; align-items:center; justify-content:space-between; gap:1rem; padding:1rem 1.2rem; border-radius:var(--radius-md); border:1.5px solid var(--border-color); cursor:pointer; margin:0; transition:border-color var(--transition-fast), background-color var(--transition-fast);">
      <div style="display:flex; align-items:flex-start; gap:0.75rem;">
        <div style="width:36px; height:36px; border-radius:var(--radius-sm); background:var(--bg-subtle); display:flex; align-items:center; justify-content:center; color:var(--txt-sub); flex-shrink:0; margin-top:2px;">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></svg>
        </div>
        <div>
          <b style="color:var(--txt-main); font-size:0.95em; display:block; margin-bottom:0.15rem;">Ulangi gerakan</b>
          <span style="color:var(--txt-sub); font-size:0.85em; line-height:1.4;">Ulangi urutan gerakan dari awal setelah selesai.</span>
        </div>
      </div>
      <input type="checkbox" id="repeat" style="width:auto; accent-color:var(--primary); transform:scale(1.3); flex-shrink:0;">
    </label>
  </div>
</div>

<!-- Card 4: Riwayat dan Privasi -->
<div class="card" style="padding: 1.6rem; border-radius: var(--radius-xl);">
  <div style="display:flex; align-items:center; gap:0.6rem; margin-bottom: 1.2rem;">
    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--primary);"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
    <b style="font-size: 1.0em; color: var(--txt-main);">Riwayat dan Privasi</b>
  </div>
  <label class="toggle-row" style="display:flex; align-items:center; justify-content:space-between; gap:1rem; padding:1rem 1.2rem; border-radius:var(--radius-md); border:1.5px solid var(--border-color); cursor:pointer; margin:0; transition:border-color var(--transition-fast), background-color var(--transition-fast);">
    <div style="display:flex; align-items:flex-start; gap:0.75rem;">
      <div style="width:36px; height:36px; border-radius:var(--radius-sm); background:var(--bg-subtle); display:flex; align-items:center; justify-content:center; color:var(--txt-sub); flex-shrink:0; margin-top:2px;">
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
      </div>
      <div>
        <b style="color:var(--txt-main); font-size:0.95em; display:block; margin-bottom:0.15rem;">Simpan hasil terjemahan</b>
        <span style="color:var(--txt-sub); font-size:0.85em; line-height:1.4;">Simpan hasil percakapan terjemahan untuk dilihat kembali pada menu Riwayat.</span>
      </div>
    </div>
    <input type="checkbox" id="simpan" style="width:auto; accent-color:var(--primary); transform:scale(1.3); flex-shrink:0;">
  </label>
</div>

<div style="margin-top: 1.5rem;">
  <button id="reset" class="btn sec" style="display:inline-flex; align-items:center; gap:0.5rem;">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"/></svg>
    <span>Kembalikan ke Default</span>
  </button>
</div>

<style>
  .toggle-row:hover, .pref-option:hover {
    background: var(--bg-subtle);
    border-color: rgba(37,99,235,0.3) !important;
  }
</style>

@push('scripts')
<script>
function syncUI(){
  // Radio Theme
  document.querySelectorAll('input[name="theme"]').forEach(r => {
    r.checked = (r.value === S.theme);
    r.onchange = () => { S.theme = r.value; saveS(); applyS(); };
  });

  // Radio Size
  document.querySelectorAll('input[name="size"]').forEach(r => {
    r.checked = (r.value === S.size);
    r.onchange = () => { S.size = r.value; saveS(); applyS(); };
  });

  // Radio Speed
  document.querySelectorAll('input[name="speed"]').forEach(r => {
    r.checked = (parseFloat(r.value) === S.speed);
    r.onchange = () => { S.speed = parseFloat(r.value); saveS(); };
  });

  // Checkboxes
  $('autoplay').checked = S.autoplay;
  $('autoplay').onchange = () => { S.autoplay = $('autoplay').checked; saveS(); };

  $('repeat').checked = S.repeat;
  $('repeat').onchange = () => { S.repeat = $('repeat').checked; saveS(); };

  $('simpan').checked = S.simpan;
  $('simpan').onchange = () => { S.simpan = $('simpan').checked; saveS(); };
}

$('reset').onclick = () => {
  Object.assign(S, DEF);
  saveS();
  applyS();
  syncUI();
};

syncUI();
</script>
@endpush
@endsection
