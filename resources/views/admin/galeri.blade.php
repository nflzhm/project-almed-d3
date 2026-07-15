@extends('admin.layout')

@section('title', 'Galeri')
@section('page-title', 'Galeri')

@section('breadcrumb')
    <li class="breadcrumb-item active">Galeri</li>
@endsection

@push('styles')
<style>
.page-header { display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:24px;gap:16px;flex-wrap:wrap; }
.page-header-left .ph-title { font-family:'Plus Jakarta Sans',sans-serif;font-size:20px;font-weight:800;color:var(--text-main); }
.page-header-left .ph-sub { font-size:13px;color:var(--text-muted);margin-top:3px; }

.gal-stats { display:flex;gap:12px;margin-bottom:24px;flex-wrap:wrap; }
.gal-stat { flex:1;min-width:130px;background:var(--card-bg);border:1px solid var(--border-color);border-radius:var(--radius);padding:16px 20px;display:flex;align-items:center;gap:14px;box-shadow:var(--shadow-sm); }
.gal-stat-icon { width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0; }
.gal-stat-val { font-family:'Plus Jakarta Sans',sans-serif;font-size:22px;font-weight:800;color:var(--text-main);line-height:1; }
.gal-stat-lbl { font-size:12px;color:var(--text-muted);margin-top:3px;font-weight:500; }

.gal-toolbar { background:var(--card-bg);border:1px solid var(--border-color);border-radius:var(--radius);padding:14px 18px;display:flex;align-items:center;gap:10px;margin-bottom:20px;flex-wrap:wrap; }
.gal-toolbar select { padding:9px 28px 9px 12px;border:1.5px solid var(--border-color);border-radius:var(--radius-sm);font-size:13px;background:var(--body-bg);outline:none; }

.gal-grid { display:grid;grid-template-columns:repeat(auto-fill, minmax(220px,1fr));gap:18px; }
.gal-card { background:var(--card-bg);border:1px solid var(--border-color);border-radius:var(--radius);overflow:hidden;box-shadow:var(--shadow-sm);transition:.2s; }
.gal-card:hover { box-shadow:var(--shadow-md);transform:translateY(-3px); }
.gal-photo-wrap { position:relative;width:100%;aspect-ratio:4/3;background:var(--body-bg);overflow:hidden; }
.gal-photo-wrap img { width:100%;height:100%;object-fit:cover; }
.gal-kategori-badge { position:absolute;top:10px;left:10px;background:rgba(14,165,233,.9);color:#fff;font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:.5px;padding:4px 10px;border-radius:20px; }
.gal-count-badge { position:absolute;bottom:10px;right:10px;background:rgba(12,26,46,.75);color:#fff;font-size:11px;font-weight:700;padding:4px 10px;border-radius:20px;display:flex;align-items:center;gap:5px; }
.gal-actions { position:absolute;inset:0;background:rgba(12,26,46,.55);display:flex;align-items:center;justify-content:center;gap:10px;opacity:0;transition:.2s; }
.gal-card:hover .gal-actions { opacity:1; }
.gal-action-btn { width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:14px;border:none;cursor:pointer; }
.gab-edit { background:var(--primary);color:#fff; }
.gab-delete { background:#ef4444;color:#fff; }
.gal-card-body { padding:12px 14px; }
.gal-title { font-size:13.5px;font-weight:700;color:var(--text-main);line-height:1.3; }
.gal-desc { font-size:11.5px;color:var(--text-muted);margin-top:3px; }

.am-modal .modal-content { border:none;border-radius:var(--radius);overflow:hidden; }
.am-modal .modal-header { background:linear-gradient(135deg,#0c1a2e 0%,#1e3a5f 100%);padding:18px 24px;border:none; }
.am-modal .modal-title { color:#fff;font-size:15px;font-weight:700;display:flex;align-items:center;gap:10px; }
.am-modal .btn-close { filter:invert(1) brightness(2);opacity:.7; }
.am-modal .modal-body { padding:24px;max-height:70vh;overflow-y:auto; }
.mfg { margin-bottom:16px; }
.mfg-label { font-size:12.5px;font-weight:700;color:var(--text-main);margin-bottom:6px; }
.mfg-input, .mfg-select, .mfg-textarea { width:100%;padding:10px 13px;border:1.5px solid var(--border-color);border-radius:var(--radius-sm);font-size:13.5px;outline:none;background:var(--body-bg); }
.mfg-textarea { min-height:80px;resize:vertical; }
.btn-cancel { padding:10px 20px;border:1.5px solid var(--border-color);border-radius:var(--radius-sm);background:transparent;color:var(--text-muted);font-weight:600; }
.btn-save { padding:10px 24px;background:linear-gradient(130deg,var(--primary) 0%,var(--accent) 100%);color:#fff;border:none;border-radius:var(--radius-sm);font-weight:700; }
.btn-danger-am { padding:10px 24px;background:#ef4444;color:#fff;border:none;border-radius:var(--radius-sm);font-weight:700; }
.empty-state { grid-column:1/-1;padding:64px 24px;text-align:center;color:var(--text-muted); }

.mfg-preview-grid { display:grid;grid-template-columns:repeat(auto-fill,minmax(90px,1fr));gap:8px;margin-top:10px; }
.mfg-preview-grid img { width:100%;aspect-ratio:1;object-fit:cover;border-radius:8px;border:1.5px solid var(--border-color); }
.mfg-existing-item { position:relative;display:block;cursor:pointer;border-radius:8px;overflow:hidden; }
.mfg-existing-item img { width:100%;aspect-ratio:1;object-fit:cover;display:block; }
.mfg-existing-item input[type="checkbox"] { position:absolute;top:6px;right:6px;width:18px;height:18px;accent-color:#ef4444; }
.mfg-existing-item.marked-delete img { opacity:.35; }
</style>
@endpush

@section('content')

<div class="page-header">
    <div class="page-header-left">
        <div class="ph-title">Galeri</div>
        <div class="ph-sub">Kelola album foto fasilitas, kegiatan, dokter, dan event RS</div>
    </div>
    <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fa-solid fa-image"></i> Tambah Album
    </button>
</div>

<div class="gal-stats">
    <div class="gal-stat">
        <div class="gal-stat-icon" style="background:#e0f2fe;color:#0284c7;"><i class="fa-solid fa-images"></i></div>
        <div><div class="gal-stat-val">{{ $totalGaleri }}</div><div class="gal-stat-lbl">Total Album</div></div>
    </div>
    <div class="gal-stat">
        <div class="gal-stat-icon" style="background:#d1fae5;color:#059669;"><i class="fa-solid fa-hospital"></i></div>
        <div><div class="gal-stat-val">{{ $totalFasilitas }}</div><div class="gal-stat-lbl">Fasilitas</div></div>
    </div>
    <div class="gal-stat">
        <div class="gal-stat-icon" style="background:#fef3c7;color:#d97706;"><i class="fa-solid fa-calendar-days"></i></div>
        <div><div class="gal-stat-val">{{ $totalKegiatan }}</div><div class="gal-stat-lbl">Kegiatan</div></div>
    </div>
    <div class="gal-stat">
        <div class="gal-stat-icon" style="background:#ede9fe;color:#7c3aed;"><i class="fa-solid fa-star"></i></div>
        <div><div class="gal-stat-val">{{ $totalEvent }}</div><div class="gal-stat-lbl">Event</div></div>
    </div>
</div>

<div class="gal-toolbar">
    <select id="filterKategori" onchange="filterGaleri()">
        <option value="">Semua Kategori</option>
        <option value="Fasilitas">Fasilitas</option>
        <option value="Kegiatan">Kegiatan</option>
        <option value="Event">Event</option>
    </select>
</div>

<div class="gal-grid" id="galGrid">
    @forelse($galeri as $item)
    <div class="gal-card" data-kategori="{{ $item->kategori }}">
        <div class="gal-photo-wrap">
            @if($item->fotos->first())
                <img src="{{ asset('uploads/galeri/' . $item->fotos->first()->gambar) }}" alt="{{ $item->judul }}">
            @endif
            <span class="gal-kategori-badge">{{ $item->kategori }}</span>
            <span class="gal-count-badge"><i class="fa-solid fa-images"></i> {{ $item->fotos_count }}</span>
            <div class="gal-actions">
                <button class="gal-action-btn gab-edit" onclick="openEditModal({{ $item->id }})">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button class="gal-action-btn gab-delete"
                    onclick="openDeleteModal('{{ $item->id }}', `{{ addslashes($item->judul) }}`)">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>
        <div class="gal-card-body">
            <div class="gal-title">{{ $item->judul }}</div>
            @if($item->deskripsi)
            <div class="gal-desc">{{ Str::limit($item->deskripsi, 60) }}</div>
            @endif
        </div>
    </div>
    @empty
    <div class="empty-state">
        <i class="fa-solid fa-images" style="font-size:40px;margin-bottom:12px;display:block;"></i>
        Belum ada album di galeri.
    </div>
    @endforelse
</div>

<div class="mt-4">
    {{ $galeri->links() }}
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade am-modal" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa-solid fa-image"></i> Tambah Album Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mfg">
                        <div class="mfg-label">Judul Album <span style="color:#ef4444;">*</span></div>
                        <input type="text" name="judul" class="mfg-input" required maxlength="150">
                    </div>
                    <div class="mfg">
                        <div class="mfg-label">Kategori <span style="color:#ef4444;">*</span></div>
                        <select name="kategori" class="mfg-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Fasilitas">Fasilitas</option>
                            <option value="Kegiatan">Kegiatan</option>
                            <option value="Event">Event</option>
                        </select>
                    </div>
                    <div class="mfg">
                        <div class="mfg-label">Deskripsi <span style="color:var(--text-muted);">(opsional)</span></div>
                        <textarea name="deskripsi" class="mfg-textarea"></textarea>
                    </div>
                    <div class="mfg">
                        <div class="mfg-label">Foto <span style="color:#ef4444;">*</span> <span style="color:var(--text-muted);font-weight:500;">(bisa pilih banyak sekaligus)</span></div>
                        <input type="file" name="gambar[]" id="inputTambahFoto" class="mfg-input" accept="image/jpeg,image/png,image/webp" multiple required>
                        <div style="font-size:11px;color:var(--text-muted);margin-top:4px;">JPG, PNG, WebP — Maks. 5 MB per foto</div>
                        <div class="mfg-preview-grid" id="previewTambah"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-save"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade am-modal" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#1e3a5f 0%,#0ea5e9 100%);">
                <h5 class="modal-title"><i class="fa-solid fa-pen-to-square"></i> Edit Album Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" id="formEdit">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="mfg">
                        <div class="mfg-label">Foto Saat Ini <span style="color:var(--text-muted);font-weight:500;">(centang untuk dihapus)</span></div>
                        <div class="mfg-preview-grid" id="editFotoExisting"></div>
                    </div>
                    <div class="mfg">
                        <div class="mfg-label">Judul Album <span style="color:#ef4444;">*</span></div>
                        <input type="text" name="judul" id="editJudul" class="mfg-input" required maxlength="150">
                    </div>
                    <div class="mfg">
                        <div class="mfg-label">Kategori <span style="color:#ef4444;">*</span></div>
                        <select name="kategori" id="editKategori" class="mfg-select" required>
                            <option value="Fasilitas">Fasilitas</option>
                            <option value="Kegiatan">Kegiatan</option>
                            <option value="Event">Event</option>
                        </select>
                    </div>
                    <div class="mfg">
                        <div class="mfg-label">Deskripsi</div>
                        <textarea name="deskripsi" id="editDeskripsi" class="mfg-textarea"></textarea>
                    </div>
                    <div class="mfg">
                        <div class="mfg-label">Tambah Foto Baru <span style="color:var(--text-muted);font-weight:500;">(opsional)</span></div>
                        <input type="file" name="gambar[]" class="mfg-input" accept="image/jpeg,image/png,image/webp" multiple>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-save"><i class="fa-solid fa-floppy-disk"></i> Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL HAPUS -->
<div class="modal fade am-modal" id="modalHapus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:420px;">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#7f1d1d 0%,#ef4444 100%);">
                <h5 class="modal-title"><i class="fa-solid fa-triangle-exclamation"></i> Hapus Album</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="" method="POST" id="formHapus">
                @csrf @method('DELETE')
                <div class="modal-body text-center">
                    <p>Hapus album <strong id="delTarget">—</strong> beserta semua fotonya secara permanen?</p>
                </div>
                <div class="modal-footer" style="justify-content:center;">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-danger-am"><i class="fa-solid fa-trash-can"></i> Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
@php
$albumData = [];

foreach ($galeri as $g) {
    $fotos = [];

    foreach ($g->fotos as $f) {
        $fotos[] = [
            'id' => $f->id,
            'url' => asset('uploads/galeri/' . $f->gambar),
        ];
    }

    $albumData[] = [
        'id' => $g->id,
        'judul' => $g->judul,
        'kategori' => $g->kategori,
        'deskripsi' => $g->deskripsi,
        'fotos' => $fotos,
    ];
}
@endphp

<script>
const albumData = @json($albumData);

function openEditModal(id) {
    const a = albumData.find(x => x.id === id);
    if (!a) return;

    document.getElementById('editJudul').value = a.judul;
    document.getElementById('editKategori').value = a.kategori;
    document.getElementById('editDeskripsi').value = a.deskripsi || '';
    document.getElementById('formEdit').action = '{{ url("admin/galeri") }}/' + id;

    const wrap = document.getElementById('editFotoExisting');

    wrap.innerHTML = a.fotos.length
        ? a.fotos.map(f => `
            <label class="mfg-existing-item">
                <img src="${f.url}" alt="">
                <input type="checkbox"
                       name="hapus_foto[]"
                       value="${f.id}"
                       onchange="this.closest('.mfg-existing-item').classList.toggle('marked-delete', this.checked)">
            </label>
        `).join('')
        : '<div style="grid-column:1/-1;font-size:12.5px;color:var(--text-muted);">Belum ada foto.</div>';

    new bootstrap.Modal(document.getElementById('modalEdit')).show();
}

function openDeleteModal(id, judul) {
    document.getElementById('delTarget').textContent = judul;
    document.getElementById('formHapus').action = '{{ url("admin/galeri") }}/' + id;
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}

function filterGaleri() {
    const val = document.getElementById('filterKategori').value;

    document.querySelectorAll('#galGrid .gal-card').forEach(card => {
        card.style.display = (!val || card.dataset.kategori === val) ? '' : 'none';
    });
}

document.getElementById('inputTambahFoto').addEventListener('change', function (e) {
    const preview = document.getElementById('previewTambah');
    preview.innerHTML = '';

    Array.from(e.target.files).forEach(file => {
        const reader = new FileReader();

        reader.onload = function (ev) {
            const img = document.createElement('img');
            img.src = ev.target.result;
            preview.appendChild(img);
        };

        reader.readAsDataURL(file);
    });
});
</script>