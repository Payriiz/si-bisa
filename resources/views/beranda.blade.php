@extends('layouts.app')
@section('title','Beranda - SI-BISA')
@section('content')

<!-- Judul Halaman Sesuai Figma -->
<div style="margin-bottom: 1.5rem;">
  <h2 style="font-size: 1.7em; font-weight: 700; color: var(--txt-main); margin-bottom: 0.25rem;">
    Penerjemah Suara ke Bahasa Isyarat
  </h2>
  <p style="color: var(--txt-sub); font-size: 0.95em;">
    Tekan tombol mikrofon atau ketik teks untuk mulai menerjemahkan ke BISINDO.
  </p>
</div>

<!-- Card Utama Input -->
<div class="card" style="padding: 1.8rem; border-radius: var(--radius-xl);">
  <!-- Tab Mode Switcher -->
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.2rem; flex-wrap: wrap; gap: 0.8rem;">
    <div class="tab-bar" style="margin-bottom: 0;">
      <button type="button" id="tabVoice" class="tab-btn active">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></svg>
        <span>Masukan Suara</span>
      </button>
      <button type="button" id="tabManual" class="tab-btn">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><line x1="6" y1="8" x2="6.01" y2="8"/><line x1="10" y1="8" x2="10.01" y2="8"/><line x1="14" y1="8" x2="14.01" y2="8"/><line x1="18" y1="8" x2="18.01" y2="8"/><line x1="6" y1="12" x2="6.01" y2="12"/><line x1="10" y1="12" x2="10.01" y2="12"/><line x1="14" y1="12" x2="14.01" y2="12"/><line x1="18" y1="12" x2="18.01" y2="12"/><line x1="7" y1="16" x2="17" y2="16"/></svg>
        <span>Ketik Teks Manual</span>
      </button>
    </div>
    <div style="font-size: 0.85em; color: var(--txt-muted); font-weight: 500;">
      Sistem Isyarat Berbasis Suara
    </div>
  </div>

  <!-- Pilihan Bahasa Input Sesuai Figma -->
  <div style="margin-bottom: 1.2rem;">
    <label style="margin-top:0">Bahasa Input</label>
    <div style="position: relative;">
      <input type="text" value="Bahasa Indonesia" class="input-pill" disabled style="padding-right: 2.5rem; font-weight: 600; background: var(--bg-subtle);">
      <span style="position: absolute; right: 1.1rem; top: 50%; transform: translateY(-50%); color: var(--success); display: flex; align-items: center;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </span>
    </div>
  </div>

  <!-- Panel 1: Suara (Mikrofon) -->
  <div id="voiceSection">
    <div style="background: var(--bg-subtle); border: 1.5px solid var(--border-color); border-radius: var(--radius-lg); padding: 2.2rem 1.5rem; text-align: center; margin-bottom: 1.4rem;">
      <!-- Microphone Icon Container -->
      <div id="micRing" style="width: 76px; height: 76px; border-radius: 50%; background: var(--bg-card); border: 2px solid var(--border-color); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.1rem; box-shadow: var(--shadow-sm); transition: all 0.3s ease; color: var(--txt-sub);">
        <span id="micIcon" style="display: flex; align-items: center; justify-content: center;">
          <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></svg>
        </span>
      </div>

      <div id="status" style="font-weight: 600; color: var(--txt-sub); font-size: 1.05em; margin-bottom: 1.4rem;">
        Siap Mendengarkan ...
      </div>

      <!-- Action Buttons Row: Mulai, Jeda, Stop -->
      <div class="row" style="justify-content: center; gap: 0.8rem;">
        <button id="mulai" class="btn sec" style="padding: 0.65rem 1.5rem;">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
          <span>Mulai</span>
        </button>
        <button id="jeda" class="btn sec" disabled style="padding: 0.65rem 1.5rem;">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
          <span>Jeda</span>
        </button>
        <button id="stop" class="btn sec" disabled style="padding: 0.65rem 1.5rem;">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><rect x="4" y="4" width="16" height="16" rx="2"/></svg>
          <span>Stop</span>
        </button>
      </div>
    </div>
  </div>

  <!-- Panel 2: Ketik Teks Manual (Fallback UX) -->
  <div id="manualSection" style="display: none; margin-bottom: 1.4rem;">
    <label style="margin-top:0">Ketik Kalimat untuk Diterjemahkan</label>
    <textarea id="manualText" rows="3" placeholder="Ketik kata atau kalimat di sini (contoh: halo selamat pagi)..." style="border-radius: var(--radius-md); padding: 0.95rem; resize: vertical;"></textarea>
    <div class="row" style="margin-top: 0.8rem; justify-content: space-between;">
      <div class="row">
        <button id="btnTerjemahManual" class="btn">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
          <span>Terjemahkan Teks</span>
        </button>
        <button id="btnResetManual" class="btn sec">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"/></svg>
          <span>Bersihkan</span>
        </button>
      </div>
      <span style="color: var(--txt-muted); font-size: 0.85em;">Tekan <b>Ctrl + Enter</b> untuk kirim</span>
    </div>
  </div>

  <!-- Teks yang Dikenali -->
  <div style="margin-bottom: 1.2rem;">
    <label>Teks yang Dikenali</label>
    <div id="teks" style="min-height: 52px; padding: 0.85rem 1.2rem; background: var(--bg-input); border: 1.5px solid var(--border-color); border-radius: var(--radius-md); color: var(--txt-sub); font-size: 0.95em; display: flex; align-items: center;">
      Hasil ucapan akan muncul di sini ...
    </div>
  </div>

  <!-- Pilihan Bahasa Isyarat -->
  <div>
    <label>Pilihan Bahasa Isyarat</label>
    <div style="position: relative;">
      <input type="text" value="BISINDO" class="input-pill" disabled style="font-weight: 600; background: var(--bg-subtle);">
      <span style="position: absolute; right: 1.1rem; top: 50%; transform: translateY(-50%); font-size: 0.78em; background: var(--primary-light); color: var(--primary); padding: 0.25rem 0.65rem; border-radius: var(--radius-pill); font-weight: 700; letter-spacing: 0.5px;">AKTIF</span>
    </div>
  </div>

  <!-- Status Loading Indicator -->
  <div id="loadingIndicator" style="display:none; margin-top: 1.2rem; color: var(--primary); font-weight: 600; text-align: center;">
    <div style="display:inline-flex; align-items:center; gap:0.5rem;">
      <svg class="animate-spin" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
      <span>Memproses terjemahan & pencocokan BISINDO...</span>
    </div>
  </div>
</div>

<!-- Hasil Terjemahan -->
<div style="margin-top: 2rem;">
  <h3 style="font-size: 1.4em; font-weight: 700; color: var(--txt-main); margin-bottom: 0.8rem;">
    Hasil Terjemahan
  </h3>

  <div class="card" style="padding: 1.6rem; border-radius: var(--radius-xl);">
    <!-- Bar Teks Hasil Terjemahan -->
    <div id="teksHasilBar" style="padding: 0.8rem 1.2rem; background: var(--bg-subtle); border: 1px solid var(--border-color); border-radius: var(--radius-pill); font-weight: 600; color: var(--txt-main); margin-bottom: 1rem; text-align: center;">
      — Belum ada terjemahan aktif —
    </div>

    <!-- Active Word Mapping Badge -->
    <div id="kata" style="font-weight: 700; min-height: 1.6em; text-align: center; color: var(--primary); font-size: 1.1em; margin-bottom: 0.5rem;"></div>

    <!-- Stage Video/Animasi BISINDO -->
    <div id="stage" class="stage" style="border-radius: var(--radius-lg);">
      <div style="color: var(--txt-muted); text-align: center; padding: 2rem;">
        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom:0.6rem; opacity:0.6;"><path d="M18 11V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v0"/><path d="M14 10V4a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v2"/><path d="M10 10.5V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v8"/><path d="M18 8a2 2 0 1 1 4 0v6a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15"/></svg>
        <div style="font-size: 0.95em;">Visualisasi bahasa isyarat BISINDO akan ditampilkan di sini</div>
      </div>
    </div>

    <!-- Video Player Controls Bar -->
    <div style="background: var(--bg-subtle); border: 1px solid var(--border-color); border-radius: var(--radius-pill); padding: 0.5rem 1.2rem; margin-top: 1rem; display: flex; align-items: center; justify-content: space-between; gap: 0.8rem; flex-wrap: wrap;">
      <div class="row" style="gap: 0.5rem;">
        <button id="play" class="icon-btn sm" style="width: 36px; height: 36px;" title="Putar / Jeda">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        </button>
        <span id="videoTime" style="font-size: 0.85em; color: var(--txt-sub); font-variant-numeric: tabular-nums;">0:00 / 0:00</span>
      </div>

      <!-- Step Counter & Navigation -->
      <div class="row" style="gap: 0.6rem;">
        <button id="prev" class="icon-btn sm" style="width: 36px; height: 36px;" title="Sebelumnya">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
        </button>
        <span id="hitung" style="font-size: 0.9em; font-weight: 600; color: var(--txt-main);">Gerakan 0 dari 0</span>
        <button id="next" class="icon-btn sm" style="width: 36px; height: 36px;" title="Selanjutnya">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        </button>
      </div>
    </div>

    <!-- Box Kata yang Tidak Ditemukan (Disembunyikan default, hanya muncul jika ada kata tidak ditemukan) -->
    <div id="notFoundBox" class="hidden" style="display:none; margin-top: 1.2rem; padding: 0.9rem 1.2rem; background: var(--warning-light); border: 1.5px solid var(--warning); border-radius: var(--radius-md); color: #92400e; font-size: 0.92em; align-items:flex-start; gap:0.65rem;">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0; margin-top:2px;"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
      <div>
        <b>Kata yang belum tersedia di kamus:</b>
        <span id="notFoundWords" style="margin-left: 0.3rem;"></span>
      </div>
    </div>

    <div id="warn" class="warn" style="margin-top: 0.8rem; text-align: center;"></div>
  </div>
</div>

@push('scripts')
<script>
const SR = window.SpeechRecognition || window.webkitSpeechRecognition;
const P = Player($('stage'), $('kata'), $('hitung'));

let sessionId = localStorage.getItem('sibisa_session_id') ? parseInt(localStorage.getItem('sibisa_session_id')) : null;
let rec = null;
let isPaused = false;
let queue = Promise.resolve();

// Kontrol Player
$('prev').onclick = P.prev;
$('next').onclick = () => { P.playing = false; P.next(); };
$('play').onclick = P.toggle;

// Tab Selector
const tabVoice = $('tabVoice');
const tabManual = $('tabManual');
const voiceSection = $('voiceSection');
const manualSection = $('manualSection');

function switchTab(mode) {
  if (mode === 'voice') {
    tabVoice.classList.add('active');
    tabManual.classList.remove('active');
    voiceSection.style.display = 'block';
    manualSection.style.display = 'none';
  } else {
    tabManual.classList.add('active');
    tabVoice.classList.remove('active');
    manualSection.style.display = 'block';
    voiceSection.style.display = 'none';
    if (rec && $('stop').disabled === false) {
      rec.stop();
    }
    $('manualText').focus();
  }
}

tabVoice.onclick = () => switchTab('voice');
tabManual.onclick = () => switchTab('manual');

const SVG_MIC_IDLE = '<svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></svg>';
const SVG_MIC_ACTIVE = '<svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></svg>';
const SVG_MIC_PAUSED = '<svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>';

function setVoiceUI(listening, paused = false) {
  $('mulai').disabled = listening && !paused;
  $('jeda').disabled = !listening;
  $('stop').disabled = !listening && !paused;

  const micRing = $('micRing');
  if (listening && !paused) {
    $('status').textContent = 'Mendengarkan ucapan Anda...';
    $('status').style.color = 'var(--primary)';
    $('micIcon').innerHTML = SVG_MIC_ACTIVE;
    micRing.style.borderColor = 'var(--primary)';
    micRing.style.animation = 'pulseMic 1.8s infinite';
  } else if (paused) {
    $('status').textContent = 'Perekaman suara dijeda';
    $('status').style.color = 'var(--warning)';
    $('micIcon').innerHTML = SVG_MIC_PAUSED;
    micRing.style.borderColor = 'var(--warning)';
    micRing.style.animation = 'none';
  } else {
    $('status').textContent = 'Siap Mendengarkan ...';
    $('status').style.color = 'var(--txt-sub)';
    $('micIcon').innerHTML = SVG_MIC_IDLE;
    micRing.style.borderColor = 'var(--border-color)';
    micRing.style.animation = 'none';
  }
}

// Inisialisasi Web Speech API
if (!SR) {
  $('warn').textContent = 'Catatan: Browser ini tidak mendukung Web Speech API (Gunakan Google Chrome untuk rekaman suara). Mode otomatis dialihkan ke Ketik Teks Manual.';
  $('mulai').disabled = true;
  switchTab('manual');
} else {
  try {
    rec = new SR();
    rec.lang = 'id-ID';
    rec.continuous = true;
    rec.interimResults = true;

    rec.onresult = e => {
      let interim = '';
      for (let i = e.resultIndex; i < e.results.length; i++) {
        const r = e.results[i];
        if (r.isFinal) {
          const t = r[0].transcript.trim();
          $('teks').textContent = t;
          queue = queue.then(() => kirim(t, r[0].confidence));
        } else {
          interim += r[0].transcript;
        }
      }
      if (interim) $('teks').textContent = interim + ' ...';
    };

    rec.onerror = e => {
      if (['not-allowed', 'service-not-allowed'].includes(e.error)) {
        $('warn').textContent = 'Peringatan: Izin mikrofon ditolak. Anda dapat mengaktifkan izin atau menggunakan tab Ketik Teks Manual.';
      } else {
        $('warn').textContent = 'Error pengenalan suara: ' + e.error;
      }
      setVoiceUI(false);
    };

    rec.onend = () => {
      if (!isPaused) setVoiceUI(false);
    };

    $('mulai').onclick = () => {
      $('warn').textContent = '';
      isPaused = false;
      try {
        rec.start();
        setVoiceUI(true);
      } catch (err) {
        setVoiceUI(false);
      }
    };

    $('jeda').onclick = () => {
      if (rec) {
        rec.stop();
        isPaused = true;
        setVoiceUI(true, true);
      }
    };

    $('stop').onclick = () => {
      if (rec) rec.stop();
      isPaused = false;
      setVoiceUI(false);
    };
  } catch (err) {
    switchTab('manual');
  }
}

// Handler Terjemahan Teks Manual
$('btnTerjemahManual').onclick = () => {
  const text = $('manualText').value.trim();
  if (!text) {
    $('warn').textContent = 'Silakan ketik kalimat terlebih dahulu.';
    return;
  }
  $('teks').textContent = text;
  kirim(text, null);
};

$('btnResetManual').onclick = () => {
  $('manualText').value = '';
  $('warn').textContent = '';
  $('notFoundBox').classList.add('hidden');
  $('notFoundBox').style.display = 'none';
  $('notFoundWords').textContent = '';
  P.clear();
};

$('manualText').addEventListener('keydown', e => {
  if (e.key === 'Enter' && (e.ctrlKey || !e.shiftKey)) {
    e.preventDefault();
    $('btnTerjemahManual').click();
  }
});

// Pemanggilan Backend API Translate
async function kirim(text, confidence) {
  if (!text) return;
  $('warn').textContent = '';
  $('notFoundBox').classList.add('hidden');
  $('notFoundBox').style.display = 'none';
  $('notFoundWords').textContent = '';
  $('loadingIndicator').style.display = 'block';
  $('teksHasilBar').textContent = '“' + text + '”';

  try {
    const d = await api('/api/translate', {
      method: 'POST',
      json: {
        text: text,
        confidence: confidence,
        session_id: sessionId,
        simpan: S.simpan
      }
    });

    if (d.session_id) {
      sessionId = d.session_id;
      localStorage.setItem('sibisa_session_id', sessionId);
    }

    if (d.tidak_ditemukan && d.tidak_ditemukan.length > 0) {
      $('notFoundWords').textContent = d.tidak_ditemukan.join(', ');
      $('notFoundBox').classList.remove('hidden');
      $('notFoundBox').style.display = 'flex';
    } else {
      $('notFoundBox').classList.add('hidden');
      $('notFoundBox').style.display = 'none';
    }

    const foundItems = (d.items || []).filter(i => i.found);
    if (foundItems.length > 0) {
      P.clear();
      P.add(foundItems);
    } else {
      $('stage').innerHTML = '<div style="color:var(--txt-muted); text-align:center; padding:2rem;"><svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom:0.5rem; color:var(--warning);"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg><div style="font-size:0.95em;">Kata belum tersedia di basis data BISINDO</div></div>';
      $('kata').textContent = text;
      $('hitung').textContent = 'Gerakan 0 dari 0';
    }
  } catch (e) {
    $('warn').textContent = 'Gagal memproses terjemahan: ' + e.message;
  } finally {
    $('loadingIndicator').style.display = 'none';
  }
}
</script>
@endpush
@endsection
