@extends('layouts.app')

@section('content')
<div class="panel">
    <h1>Kategori & Özellik Şeması Yönetimi</h1>
    <p class="muted">Kategoriye özel zorunlu alanları tanımlayın.</p>
    <table style="margin-top:16px;">
        <thead>
        <tr>
            <th>Kategori</th>
            <th>Zorunlu Özellikler</th>
            <th>İşlem</th>
        </tr>
        </thead>
        <tbody>
        @foreach($schemas as $schema)
            <tr>
                <td>{{ $schema['name'] }}</td>
                <td>{{ implode(', ', $schema['attributes']) }}</td>
                <td><button type="button">Şema Güncelle</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
