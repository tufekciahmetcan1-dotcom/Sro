@extends('layouts.app')

@section('content')
<div class="panel">
    <h1>Sipariş Yönetimi</h1>
    <p class="muted">Tüm siparişlerin durumlarını takip edin.</p>
    <table style="margin-top:16px;">
        <thead>
        <tr>
            <th>Kod</th>
            <th>Müşteri</th>
            <th>Tutar</th>
            <th>Durum</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order['code'] }}</td>
                <td>{{ $order['customer'] }}</td>
                <td>₺{{ number_format($order['total'],2,',','.') }}</td>
                <td><span class="status">{{ $order['status'] }}</span></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
