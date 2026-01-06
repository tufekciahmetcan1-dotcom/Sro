@extends('layouts.app')

@section('content')
<div class="panel">
    <div style="display:flex; align-items:center; justify-content:space-between; gap:12px; flex-wrap:wrap;">
        <div>
            <h1>İlanlarım</h1>
            <p class="muted">Tüm ilanlar kullanıcılar tarafından eklenir; durum ve stok takibini buradan yapın.</p>
        </div>
        <a class="btn" href="{{ route('listings.create') }}">Yeni İlan Oluştur</a>
    </div>
    <table style="margin-top:16px;">
        <thead>
            <tr>
                <th>Başlık</th>
                <th>Kategori</th>
                <th>Fiyat</th>
                <th>Stok</th>
                <th>Teslimat</th>
                <th>Durum</th>
            </tr>
        </thead>
        <tbody>
            @forelse($listings as $listing)
                <tr>
                    <td>{{ $listing['title'] }}</td>
                    <td>{{ $listing['category'] }}</td>
                    <td>₺{{ number_format($listing['price'],2,',','.') }}</td>
                    <td>{{ $listing['stock'] }}</td>
                    <td>{{ implode(', ', $listing['delivery']) }}</td>
                    <td><span class="status">{{ $listing['status'] }}</span></td>
                </tr>
            @empty
                <tr><td colspan="6" class="muted">Henüz ilan eklemediniz.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
