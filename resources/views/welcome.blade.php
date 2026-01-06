@extends('layouts.app')

@section('content')
<div class="panel">
    <h1>Silkroad Pazar Arayüzü</h1>
    <p class="muted">Kullanıcıların ilanlarını ekleyebileceği, satıcı paneli ve yönetim araçları ile hazırlandı.</p>
    <div class="grid grid-2" style="margin-top:16px;">
        <div class="panel" style="background:#0f1627;">
            <div class="muted">Kayıt / Giriş</div>
            <p>Satıcılar kayıt olup giriş yaparak ilanlarını yönetebilir.</p>
            <a class="btn" href="{{ route('register') }}">Kayıt Ol</a>
            <a class="btn" style="background:#0ea5e9; margin-left:8px;" href="{{ route('login') }}">Giriş Yap</a>
        </div>
        <div class="panel" style="background:#0f1627;">
            <div class="muted">İlan Oluştur</div>
            <p>Başlık, kategori, fiyat, teslimat ve açıklama alanlarıyla ilan ekleyin.</p>
            <a class="btn" href="{{ route('listings.create') }}">Yeni İlan</a>
        </div>
        <div class="panel" style="background:#0f1627;">
            <div class="muted">Kullanıcı Paneli</div>
            <p>İlanlar, siparişler, kazançlar ve KYC durumunu takip edin.</p>
            <a class="btn" href="{{ route('seller.dashboard') }}">Panel</a>
        </div>
        <div class="panel" style="background:#0f1627;">
            <div class="muted">Yönetim</div>
            <p>Moderasyon, komisyon, kampanya ve kategori şemalarını yönetin.</p>
            <a class="btn" href="{{ route('admin.users') }}">Yönetim Araçları</a>
        </div>
    </div>

    @php($listings = session('listings', []))
    <div class="panel" style="margin-top:16px;">
        <h2>Vitrindeki İlanlar</h2>
        @if(count($listings))
            <div class="grid grid-2" style="margin-top:12px;">
                @foreach($listings as $listing)
                    <div class="panel" style="background:#0f1627;">
                        <div class="muted">{{ $listing['category'] }} • {{ $listing['created_at'] }}</div>
                        <h3 style="margin:8px 0 6px;">{{ $listing['title'] }}</h3>
                        <div class="muted">Satıcı: {{ $listing['owner'] ?? 'Kullanıcı' }}</div>
                        <div style="margin:8px 0; font-weight:700;">₺{{ number_format($listing['price'], 2, ',', '.') }}</div>
                        <p class="muted">{{ \Illuminate\Support\Str::limit($listing['description'], 120) }}</p>
                        <div class="muted" style="margin-top:8px;">Teslimat: {{ implode(', ', $listing['delivery']) }}</div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="muted" style="margin:0;">Henüz ilan yok. İlk ilanı oluşturmak için <a class="btn" href="{{ route('listings.create') }}">İlan Oluştur</a> butonunu kullanın.</p>
        @endif
    </div>
</div>
@endsection
