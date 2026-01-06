@extends('layouts.app')

@section('content')
<div class="panel">
    <h1>Mağaza Ayarları</h1>
    <p class="muted">Mağaza vitrini, destek kanalları ve teslimat politikaları.</p>
    <form class="grid grid-2" style="margin-top:12px;">
        <div>
            <label>Mağaza Adı</label>
            <input type="text" value="{{ $store['name'] }}" disabled>
        </div>
        <div>
            <label>Mağaza URL Slug</label>
            <input type="text" value="{{ $store['slug'] }}" disabled>
        </div>
        <div>
            <label>Destek E-postası</label>
            <input type="email" value="{{ $store['support_email'] }}" disabled>
        </div>
        <div>
            <label>Adres</label>
            <input type="text" value="{{ $store['address'] }}" disabled>
        </div>
        <div>
            <button type="button">Güncelle (Demo)</button>
        </div>
    </form>
</div>
@endsection
