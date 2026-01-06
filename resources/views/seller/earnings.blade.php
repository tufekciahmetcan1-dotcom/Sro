@extends('layouts.app')

@section('content')
<div class="panel">
    <h1>Kazançlar / Ödemeler</h1>
    <p class="muted">Bakiye, bekleyen tutarlar ve transfer geçmişi.</p>
    <table style="margin-top:16px;">
        <thead>
        <tr>
            <th>Tarih</th>
            <th>Tutar</th>
            <th>Durum</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transfers as $transfer)
            <tr>
                <td>{{ $transfer['date'] }}</td>
                <td>₺{{ number_format($transfer['amount'],2,',','.') }}</td>
                <td><span class="status">{{ $transfer['status'] }}</span></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
