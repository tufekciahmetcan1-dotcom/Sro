@extends('layouts.app')

@section('content')
<div class="panel">
    <h1>Kullanıcı Kaydı</h1>
    <p class="muted">Satıcı paneline giriş için hesap oluşturun.</p>
    <form method="POST" action="{{ route('register.post') }}" class="grid grid-2" style="margin-top:18px;">
        @csrf
        <div>
            <label>Ad Soyad</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Örn. Zeynep Aksoy">
            @error('name')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>E-Posta</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="ornek@mail.com">
            @error('email')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Şifre</label>
            <input type="password" name="password" placeholder="En az 6 karakter">
            @error('password')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Şifre (Tekrar)</label>
            <input type="password" name="password_confirmation" placeholder="Tekrar şifre">
        </div>
        <div>
            <button type="submit">Kayıt Ol</button>
        </div>
    </form>
</div>
@endsection
