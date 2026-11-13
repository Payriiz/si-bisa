@extends('layouts.app')
@section('bare','1')
@section('title','Dashboard Admin - SI-BISA')
@section('content')

<style>
  .admin-wrapper {
    min-height: 100vh;
    background: var(--bg-page);
    display: flex;
    flex-direction: column;
  }
  .admin-header {
    background: var(--bg-card);
    border-bottom: 1px solid var(--border-color);
    padding: 0.9rem 1.8rem;
    box-shadow: var(--shadow-sm);
    position: sticky;
    top: 0;
    z-index: 100;
  }
  .admin-header-inner {
    max-width: 1180px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 0.75rem;
    flex-wrap: wrap;
  }
  .admin-main {
    max-width: 1180px;
    margin: 2rem auto 4rem;
    padding: 0 1.4rem;
    width: 100%;
    flex: 1;
  }
  .admin-form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1rem;
    align-items: flex-end;
  }
  .badge {
    font-size: 0.75em;
    padding: 0.2rem 0.65rem;
    border-radius: var(--radius-pill);
    font-weight: 700;
    letter-spacing: 0.3px;
  }
  .badge-primary { background: var(--primary-light); color: var(--primary); }
  .badge-warning { background: var(--warning-light); color: #92400e; }
  .badge-success { background: var(--success-light); color: #065f46; }
  .badge-muted { background: var(--bg-subtle); color: var(--txt-sub); border: 1px solid var(--border-color); }
  .tbl-preview { width: 72px; height: 54px; object-fit: cover; border-radius: var(--radius-sm); background: var(--bg-subtle); display: block; }

  @media (max-width: 700px) {
    .admin-header { padding: 0.8rem 1rem; }
    .admin-header-inner { gap: 0.5rem; }
    .admin-main { padding: 0 0.9rem; }
    .admin-form-grid { grid-template-columns: 1fr; }
    .admin-header-actions .btn span { display: none; }
  }
</style>

<div class="admin-wrapper">
  <!-- Header Bar Admin -->
  <header class="admin-header">
    <div class="admin-header-inner">
      <div style="display:flex; align-items:center; gap:0.75rem;">
        <a class="brand-logo" href="/" style="margin-bottom:0; padding:0; display:flex; align-items:center; gap:0.6rem;">
          <img src="{{ asset('logo/PACKAGES-04.png') }}" alt="SI-BISA" class="logo-light" style="height: 38px; width: auto; object-fit: contain;">
          <img src="{{ asset('logo/SI-BISA Black.png') }}?v=2" alt="SI-BISA" class="logo-dark" style="height: 38px; width: auto; object-fit: contain;">
        </a>
        <span class="badge badge-primary">ADMIN</span>
      </div>

      <div class="row admin-header-actions" style="gap: 0.6rem;">
        <button type="button" class="theme-toggle-btn icon-btn" onclick="toggleTheme()" title="Ganti Tema"></button>
        <a href="/" class="btn sec sm" style="text-decoration: none;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
          <span>Landing</span>
        </a>
        <a href="/app" class="btn sec sm" style="text-decoration: none;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          <span>Penerjemah</span>
        </a>
        <button id="keluar" class="btn sm red">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
          <span>Keluar</span>
        </button>
      </div>
    </div>
  </header>

  <main class="admin-main">
    <!-- Page Title -->
    <div style="margin-bottom: 1.8rem;">
      <h2 style="font-size: 1.8em; font-weight: 700; color: var(--txt-main); margin-bottom: 0.3rem;">
        Kelola Kamus Isyarat BISINDO
      </h2>
      <p style="color: var(--txt-sub); font-size: 0.95em;">
        Tambah, perbarui, dan kelola pustaka video atau gambar bahasa isyarat untuk pencocokan kata dasar.
      </p>
    </div>

    <!-- Form Tambah / Edit Isyarat -->
    <div class="card" style="padding: 1.8rem; border-radius: var(--radius-xl); margin-bottom: 2rem;">
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.2rem; flex-wrap: wrap; gap: 0.6rem;">
        <div style="display:flex; align-items:center; gap:0.6rem;">
          <div style="width:36px; height:36px; border-radius:var(--radius-sm); background:var(--primary-light); display:flex; align-items:center; justify-content:center; color:var(--primary);">
            <svg id="formIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
          </div>
          <b id="judulForm" style="font-size: 1.1em; color: var(--txt-main);">Tambah Isyarat Baru</b>
        </div>
        <span id="editBadge" class="badge badge-warning" style="display:none;">MODE EDIT</span>
      </div>

      <input type="hidden" id="editId">

      <div class="admin-form-grid">
        <div>
          <label style="margin-top:0">Kata Dasar (Sastrawi)</label>
          <input id="kata" type="text" placeholder="mis. makan, pagi, kamu" class="input-pill">
        </div>
        <div style="max-width: 180px;">
          <label style="margin-top:0">Durasi (ms)</label>
          <input id="durasi" type="number" value="2000" class="input-pill">
        </div>
        <div>
          <label style="margin-top:0">Berkas Media (GIF/PNG/JPG/MP4/WEBM)</label>
          <input id="media" type="file" accept=".gif,.png,.jpg,.jpeg,.mp4,.webm" style="border-radius: var(--radius-pill); font-size: 0.85em; border: 1.5px solid var(--border-color); padding: 0.6rem 1rem; background: var(--bg-input); color: var(--txt-main); width:100%; cursor:pointer;">
        </div>
      </div>

      <!-- Pratinjau Berkas Media -->
      <div id="previewContainer" style="display: none; margin-top: 1.4rem; padding: 1.2rem; background: var(--bg-subtle); border: 1.5px dashed var(--border-color); border-radius: var(--radius-lg);">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.8rem; flex-wrap: wrap; gap: 0.5rem;">
          <div style="display:flex; align-items:center; gap:0.5rem; font-size: 0.95em; color: var(--txt-main); font-weight:600;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--primary);"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            Pratinjau Media: <span id="previewLabel" style="color: var(--primary); font-weight: 600;"></span>
          </div>
          <button type="button" id="btnHapusMedia" class="btn sec sm">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            <span>Batalkan Berkas</span>
          </button>
        </div>

        <div style="display: flex; gap: 1.4rem; align-items: center; flex-wrap: wrap;">
          <!-- Layar Pratinjau -->
          <div id="previewMediaStage" style="min-width: 140px; max-width: 260px; max-height: 200px; border-radius: var(--radius-md); overflow: hidden; background: var(--bg-page); border: 1px solid var(--border-color); display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-sm);">
          </div>

          <!-- Metadata Berkas -->
          <div id="previewInfo" style="font-size: 0.9em; line-height: 1.9; color: var(--txt-sub);">
            <div><b style="color:var(--txt-main);">Nama Berkas:</b> <span id="previewFileName" style="color: var(--txt-main); font-weight: 600;">-</span></div>
            <div><b style="color:var(--txt-main);">Ukuran:</b> <span id="previewFileSize">-</span></div>
            <div><b style="color:var(--txt-main);">Format:</b> <span id="previewFileType" class="badge badge-primary" style="font-size:0.8em;">-</span></div>
          </div>
        </div>
      </div>

      <div class="row" style="margin-top: 1.2rem;">
        <button id="simpan" class="btn">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
          <span>Simpan Isyarat</span>
        </button>
        <button id="batal" class="btn sec" style="display:none;">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
          <span>Batal</span>
        </button>
      </div>

      <div id="msg" style="margin-top: 0.9rem; font-size:0.9em; font-weight:500; min-height:1.4em;"></div>
    </div>

    <!-- Tabel Data Kamus Isyarat -->
    <div class="card" style="padding: 1.6rem; border-radius: var(--radius-xl);">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.2rem; flex-wrap: wrap; gap: 0.8rem;">
        <div style="position: relative; width: 100%; max-width: 340px;">
          <span style="position: absolute; left: 1.1rem; top: 50%; transform: translateY(-50%); color: var(--txt-muted); display:flex; align-items:center; pointer-events:none;">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          </span>
          <input type="text" id="cariKamus" placeholder="Cari kata dasar isyarat..." class="input-pill" style="padding-left: 2.6rem;">
        </div>
        <div id="totalBadge" class="badge badge-muted" style="font-size:0.85em;">
          Memuat...
        </div>
      </div>

      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th style="width: 90px;">Pratinjau</th>
              <th>Kata Dasar</th>
              <th>Tipe</th>
              <th>Durasi</th>
              <th>Status</th>
              <th style="text-align: right;">Aksi</th>
            </tr>
          </thead>
          <tbody id="tbody">
            <tr>
              <td colspan="6" style="text-align: center; color: var(--txt-muted); padding: 2.5rem;">
                <div style="display:flex; align-items:center; justify-content:center; gap:0.5rem;">
                  <svg class="animate-spin" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
                  <span>Memuat data kamus...</span>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</div>

@push('scripts')
<script>
let rows = [];

const say = (t, ok) => {
  const el = $('msg');
  el.style.color = ok ? 'var(--success)' : 'var(--danger)';
  el.innerHTML = ok
    ? `<span style="display:inline-flex;align-items:center;gap:0.4rem;"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>${esc(t)}</span>`
    : `<span style="display:inline-flex;align-items:center;gap:0.4rem;"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>${esc(t)}</span>`;
};

const prev = r => {
  const style = 'class="tbl-preview"';
  if (r.tipe_media === 'video') {
    return `<video src="/storage/${esc(r.url_media)}" ${style} muted></video>`;
  }
  return `<img src="/storage/${esc(r.url_media)}" ${style} alt="${esc(r.kata_dasar)}">`;
};

async function muat(){
  try {
    rows = await api('/api/kamus');
    $('totalBadge').textContent = `Total: ${rows.length} isyarat`;
    renderTable();
  } catch(e) {
    say('Gagal memuat kamus: ' + e.message);
  }
}

function renderTable(){
  const q = ($('cariKamus').value || '').trim().toLowerCase();
  const filtered = q ? rows.filter(r => (r.kata_dasar || '').toLowerCase().includes(q)) : rows;
  
  if (!filtered.length) {
    $('tbody').innerHTML = `<tr><td colspan="6" style="text-align:center; padding:2.5rem; color:var(--txt-muted);">
      <div style="display:flex;align-items:center;justify-content:center;gap:0.5rem;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        Tidak ada data isyarat ditemukan.
      </div>
    </td></tr>`;
    return;
  }

  $('tbody').innerHTML = filtered.map(r => `
    <tr style="transition:background-color var(--transition-fast);">
      <td>${prev(r)}</td>
      <td>
        <b style="font-size:1.0em; color:var(--txt-main);">${esc(r.kata_dasar)}</b>
      </td>
      <td>
        <span class="badge badge-muted" style="text-transform:uppercase; font-size:0.78em;">${esc(r.tipe_media)}</span>
      </td>
      <td style="color:var(--txt-sub); font-size:0.9em; white-space:nowrap;">${r.durasi_ms} ms</td>
      <td>
        <label style="display:inline-flex; align-items:center; gap:0.45rem; cursor:pointer; margin:0;">
          <input type="checkbox" ${r.is_active ? 'checked' : ''} style="width:auto; accent-color:var(--primary);" onchange="toggle(${r.id}, this.checked)">
          <span class="badge ${r.is_active ? 'badge-success' : 'badge-muted'}">${r.is_active ? 'Aktif' : 'Nonaktif'}</span>
        </label>
      </td>
      <td style="text-align: right; white-space:nowrap;">
        <button class="btn sec sm" style="margin-right: 0.4rem;" onclick="edit(${r.id})">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
          <span>Ubah</span>
        </button>
        <button class="btn red sm" onclick="hapus(${r.id})">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
          <span>Hapus</span>
        </button>
      </td>
    </tr>
  `).join('');
}

$('cariKamus').oninput = renderTable;

// --- Media Preview ---
let currentBlobUrl = null;

function formatBytes(bytes) {
  if (!bytes || bytes === 0) return '0 B';
  const k = 1024;
  const sizes = ['B', 'KB', 'MB', 'GB'];
  const i = Math.floor(Math.log(bytes) / Math.log(k));
  return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

function showPreviewFromFile(file) {
  if (currentBlobUrl) { URL.revokeObjectURL(currentBlobUrl); currentBlobUrl = null; }
  if (!file) return;

  const isVideo = file.type.startsWith('video/') || /\.(mp4|webm)$/i.test(file.name);
  currentBlobUrl = URL.createObjectURL(file);

  $('previewLabel').textContent = 'Berkas Baru';
  $('previewFileName').textContent = file.name;
  $('previewFileSize').textContent = formatBytes(file.size);
  $('previewFileType').textContent = file.type ? file.type.split('/')[1] : file.name.split('.').pop();

  if (isVideo) {
    $('previewMediaStage').innerHTML = `<video src="${currentBlobUrl}" controls autoplay muted playsinline style="max-width:100%; max-height:180px; object-fit:contain;"></video>`;
  } else {
    $('previewMediaStage').innerHTML = `<img src="${currentBlobUrl}" alt="Pratinjau" style="max-width:100%; max-height:180px; object-fit:contain;">`;
  }
  $('previewContainer').style.display = 'block';
}

function showPreviewFromUrl(urlMedia, tipeMedia, filename = '') {
  if (currentBlobUrl) { URL.revokeObjectURL(currentBlobUrl); currentBlobUrl = null; }
  if (!urlMedia) return;

  $('previewLabel').textContent = 'Media di Database';
  $('previewFileName').textContent = filename || urlMedia.split('/').pop();
  $('previewFileSize').textContent = 'Tersimpan di Server';
  $('previewFileType').textContent = tipeMedia || 'Media';

  const fullUrl = '/storage/' + urlMedia;
  if (tipeMedia === 'video') {
    $('previewMediaStage').innerHTML = `<video src="${fullUrl}" controls autoplay muted playsinline style="max-width:100%; max-height:180px; object-fit:contain;"></video>`;
  } else {
    $('previewMediaStage').innerHTML = `<img src="${fullUrl}" alt="Pratinjau" style="max-width:100%; max-height:180px; object-fit:contain;">`;
  }
  $('previewContainer').style.display = 'block';
}

$('media').onchange = () => {
  const f = $('media').files[0];
  if (f) {
    showPreviewFromFile(f);
  } else {
    const id = $('editId').value;
    if (id) {
      const r = rows.find(x => x.id == id);
      if (r && r.url_media) { showPreviewFromUrl(r.url_media, r.tipe_media); return; }
    }
    $('previewContainer').style.display = 'none';
  }
};

$('btnHapusMedia').onclick = () => {
  $('media').value = '';
  const id = $('editId').value;
  if (id) {
    const r = rows.find(x => x.id == id);
    if (r && r.url_media) { showPreviewFromUrl(r.url_media, r.tipe_media); return; }
  }
  $('previewContainer').style.display = 'none';
};

function reset(){
  $('editId').value = '';
  $('kata').value = '';
  $('durasi').value = 2000;
  $('media').value = '';
  $('judulForm').textContent = 'Tambah Isyarat Baru';
  $('formIcon').innerHTML = '<line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>';
  $('editBadge').style.display = 'none';
  $('batal').style.display = 'none';
  $('msg').textContent = '';
  if (currentBlobUrl) { URL.revokeObjectURL(currentBlobUrl); currentBlobUrl = null; }
  $('previewContainer').style.display = 'none';
}

function edit(id){
  const r = rows.find(x => x.id === id);
  if (!r) return;
  $('editId').value = id;
  $('kata').value = r.kata_dasar;
  $('durasi').value = r.durasi_ms;
  $('media').value = '';
  $('judulForm').textContent = 'Ubah Isyarat BISINDO';
  $('formIcon').innerHTML = '<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>';
  $('editBadge').style.display = 'inline-block';
  $('batal').style.display = 'inline-flex';

  if (r.url_media) {
    showPreviewFromUrl(r.url_media, r.tipe_media);
  } else {
    $('previewContainer').style.display = 'none';
  }

  window.scrollTo({top: 0, behavior: 'smooth'});
}

$('batal').onclick = reset;

$('simpan').onclick = async () => {
  const id = $('editId').value;
  const kata = $('kata').value.trim();
  if (!kata) { say('Kata dasar wajib diisi.'); return; }

  const fd = new FormData();
  fd.append('kata_dasar', kata);
  fd.append('durasi_ms', $('durasi').value);
  if ($('media').files[0]) { fd.append('media', $('media').files[0]); }
  if (id) { fd.append('_method', 'PUT'); }

  $('simpan').disabled = true;
  $('simpan').innerHTML = '<svg class="animate-spin" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg><span>Menyimpan...</span>';

  try {
    const d = await api(id ? '/api/kamus/' + id : '/api/kamus', {method: 'POST', body: fd});
    say(d.message, true);
    reset();
    muat();
  } catch(e) {
    say(e.data?.errors ? Object.values(e.data.errors).flat().join(' ') : e.message);
  } finally {
    $('simpan').disabled = false;
    $('simpan').innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg><span>Simpan Isyarat</span>';
  }
};

async function hapus(id){
  if (!confirm('Apakah Anda yakin ingin menghapus isyarat ini dari kamus?')) return;
  try {
    await api('/api/kamus/' + id, {method: 'DELETE'});
    say('Isyarat berhasil dihapus.', true);
    muat();
  } catch(e) {
    say('Gagal menghapus: ' + e.message);
  }
}

async function toggle(id, v){
  const fd = new FormData();
  fd.append('_method', 'PUT');
  fd.append('is_active', v ? 1 : 0);
  try {
    await api('/api/kamus/' + id, {method: 'POST', body: fd});
  } catch(e) {
    say('Gagal mengubah status: ' + e.message);
  }
}

$('keluar').onclick = async () => {
  await api('/api/logout', {method: 'POST'});
  location.href = '/login';
};

muat();
</script>
@endpush
@endsection
