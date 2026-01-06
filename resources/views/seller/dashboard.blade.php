@extends('layouts.app')

@section('content')
<div class="grid grid-2">
    <div class="panel">
        <h1>Satıcı Paneli</h1>
        <p class="muted">Hoş geldiniz {{ $user['name'] ?? 'Misafir' }}. İlanlarınızı, siparişleri ve kazançları buradan yönetin.</p>
        <div class="grid grid-2" style="margin-top:18px;">
            <div class="panel" style="background:#0f1627;">
                <div class="muted">Toplam İlan</div>
                <h2>{{ count($listings) }}</h2>
            </div>
            <div class="panel" style="background:#0f1627;">
                <div class="muted">Bekleyen Sipariş</div>
                <h2>{{ count($orders) }}</h2>
            </div>
            <div class="panel" style="background:#0f1627;">
                <div class="muted">Bekleyen Ödeme</div>
                <h2>₺{{ number_format($earnings['pending'],0,',','.') }}</h2>
            </div>
            <div class="panel" style="background:#0f1627;">
                <div class="muted">Son Ödeme</div>
                <h2>{{ $earnings['last_payout'] }}</h2>
            </div>
        </div>
    </div>
    <div class="panel">
        <h2>Hızlı Eylemler</h2>
        <div style="display:flex; gap:12px; flex-wrap:wrap; margin-top:12px;">
            <a class="btn" href="{{ route('listings.create') }}">Yeni İlan</a>
            <a class="btn" href="{{ route('seller.orders') }}">Siparişler</a>
            <a class="btn" href="{{ route('seller.earnings') }}">Kazançlar</a>
            <a class="btn" href="{{ route('seller.verification') }}">Doğrulama</a>
        </div>
        <div style="margin-top:18px;">
            <div class="muted">Oturum</div>
            @if($user)
                <p>{{ $user['email'] }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Çıkış Yap</button>
                </form>
            @else
                <p class="muted">Giriş yapmadınız.</p>
            @endif
        </div>
    </div>
</div>
@endsection
