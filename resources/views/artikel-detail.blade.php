@extends('layout') {{-- sesuaikan layout kamu --}}

@section('title', $artikel->judul)

@section('content')

<style>
.detail-container {
    max-width: 900px;
    margin: auto;
    padding: 30px 20px;
}

.detail-img {
    width: 100%;
    border-radius: 14px;
    object-fit: cover;
    max-height: 420px;
}

.detail-meta {
    margin-top: 15px;
    font-size: 13px;
    color: #64748b;
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.detail-title {
    font-size: 28px;
    font-weight: 800;
    margin-top: 15px;
    color: #0f172a;
    line-height: 1.3;
}

.detail-content {
    margin-top: 25px;
    font-size: 15px;
    line-height: 1.8;
    color: #334155;
}

.badge-kat {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    background: #e0f2fe;
    color: #0284c7;
}

.rekomendasi {
    margin-top: 50px;
}

.rekomendasi h3 {
    font-size: 18px;
    font-weight: 800;
    margin-bottom: 15px;
}

.rekom-card {
    padding: 12px;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    margin-bottom: 10px;
    transition: 0.2s;
}

.rekom-card:hover {
    background: #f8fafc;
}

.rekom-card a {
    text-decoration: none;
    color: #0f172a;
    font-weight: 600;
}
</style>

<div class="detail-container">

    {{-- IMAGE --}}
    @if($artikel->gambar)
        <img src="{{ asset('storage/'.$artikel->gambar) }}" class="detail-img">
    @endif

    {{-- META --}}
    <div class="detail-meta">
        <span><i class="fa fa-calendar"></i> {{ $artikel->created_at->format('d M Y') }}</span>
        <span><i class="fa fa-eye"></i> {{ $artikel->views }} views</span>
        <span class="badge-kat">{{ $artikel->kategori ?? 'Umum' }}</span>
    </div>

    {{-- TITLE --}}
    <div class="detail-title">
        {{ $artikel->judul }}
    </div>

    {{-- CONTENT --}}
    <div class="detail-content">
        {!! nl2br(e($artikel->deskripsi)) !!}
    </div>

    {{-- REKOMENDASI --}}
    <div class="rekomendasi">
        <h3>Artikel Terkait</h3>

        @foreach($artikelTerkait as $item)
            <div class="rekom-card">
                <a href="{{ route('artikel.detail', $item->id) }}">
                    {{ $item->judul }}
                </a>
            </div>
        @endforeach
    </div>

</div>

@endsection