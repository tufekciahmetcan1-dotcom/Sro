@extends('layouts.app')

@section('content')
<div class="panel">
    <h1>Kullanıcılar / Satıcı Doğrulama</h1>
    <p class="muted">Yeni kayıtları ve doğrulama taleplerini yönetin.</p>
    <table style="margin-top:16px;">
        <thead>
        <tr>
            <th>Ad</th>
            <th>Tür</th>
            <th>Durum</th>
            <th>Aksiyon</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <tr>
                <td>{{ $request['name'] }}</td>
                <td>{{ $request['type'] }}</td>
                <td><span class="status">{{ $request['status'] }}</span></td>
                <td><button type="button">Onayla</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
