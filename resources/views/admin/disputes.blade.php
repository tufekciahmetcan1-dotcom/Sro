@extends('layouts.app')

@section('content')
<div class="panel">
    <h1>İtirazlar / Chargeback</h1>
    <p class="muted">Ödeme itirazlarını takip edin.</p>
    <table style="margin-top:16px;">
        <thead>
        <tr>
            <th>Kod</th>
            <th>Alıcı</th>
            <th>Durum</th>
            <th>İşlem</th>
        </tr>
        </thead>
        <tbody>
        @foreach($disputes as $dispute)
            <tr>
                <td>{{ $dispute['code'] }}</td>
                <td>{{ $dispute['buyer'] }}</td>
                <td><span class="status">{{ $dispute['status'] }}</span></td>
                <td><button type="button">Güncelle</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
