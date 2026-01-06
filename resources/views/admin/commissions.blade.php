@extends('layouts.app')

@section('content')
<div class="panel">
    <h1>Komisyon Oranları & Kampanyalar</h1>
    <p class="muted">Kategori bazlı komisyonları ve kampanya indirimlerini düzenleyin.</p>
    <table style="margin-top:16px;">
        <thead>
        <tr>
            <th>Kategori</th>
            <th>Oran</th>
            <th>Kampanya</th>
            <th>İşlem</th>
        </tr>
        </thead>
        <tbody>
        @foreach($plans as $plan)
            <tr>
                <td>{{ $plan['category'] }}</td>
                <td>%{{ $plan['rate'] }}</td>
                <td>{{ $plan['campaign'] }}</td>
                <td><button type="button">Düzenle</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
