@extends('layouts.app')

@section('content')
<div class="panel">
    <h1>Doğrulama / KYC</h1>
    <p class="muted">Güvenli ticaret için gerekli belgeleri yükleyin.</p>
    <div class="panel" style="background:#0f1627; margin-top:12px;">
        <div class="muted">Durum</div>
        <h3>{{ $kyc['status'] }}</h3>
    </div>
    <div style="margin-top:12px;">
        <div class="muted">Gerekli Belgeler</div>
        <ul>
            @foreach($kyc['requirements'] as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    <form style="margin-top:16px;" class="grid grid-2">
        <div>
            <label>Kimlik Fotoğrafı</label>
            <input type="file" disabled>
        </div>
        <div>
            <label>Adres Kanıtı</label>
            <input type="file" disabled>
        </div>
        <div>
            <button type="button">Belgeleri Gönder (Demo)</button>
        </div>
    </form>
</div>
@endsection
