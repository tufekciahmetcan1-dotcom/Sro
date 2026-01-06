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
        </div>
        <div class="panel" style="background:#0f1627;">
            <div class="muted">İlan Oluştur</div>
            <p>Başlık, kategori, fiyat, teslimat ve açıklama alanlarıyla ilan ekleyin.</p>
            <a class="btn" href="{{ route('listings.create') }}">Yeni İlan</a>
        </div>
        <div class="panel" style="background:#0f1627;">
            <div class="muted">Satıcı Paneli</div>
            <p>İlanlar, siparişler, kazançlar ve KYC durumunu takip edin.</p>
            <a class="btn" href="{{ route('seller.dashboard') }}">Panel</a>
        </div>
        <div class="panel" style="background:#0f1627;">
            <div class="muted">Yönetim</div>
            <p>Moderasyon, komisyon, kampanya ve kategori şemalarını yönetin.</p>
            <a class="btn" href="{{ route('admin.users') }}">Yönetim Araçları</a>
        </div>
    </div>
</div>
@endsection
