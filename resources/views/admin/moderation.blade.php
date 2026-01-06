@extends('layouts.app')

@section('content')
<div class="panel">
    <h1>İlan Moderasyonu</h1>
    <p class="muted">Kullanıcılar tarafından eklenen ilanları inceleyin.</p>
    <table style="margin-top:16px;">
        <thead>
        <tr>
            <th>Başlık</th>
            <th>Sahip</th>
            <th>Durum</th>
            <th>İşlem</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pendingListings as $listing)
            <tr>
                <td>{{ $listing['title'] }}</td>
                <td>{{ $listing['owner'] }}</td>
                <td><span class="status">{{ $listing['status'] }}</span></td>
                <td><button type="button">Onayla</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
