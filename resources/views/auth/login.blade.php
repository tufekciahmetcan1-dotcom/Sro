@extends('layouts.app')

@section('content')
<div class="panel">
    <h1>Giriş Yap</h1>
    <p class="muted">Kayıtlı satıcı hesabınızla oturum açın.</p>
    <form method="POST" action="{{ route('login.post') }}" class="grid grid-2" style="margin-top:18px;">
        @csrf
        <div>
            <label>E-Posta</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="ornek@mail.com">
            @error('email')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Şifre</label>
            <input type="password" name="password" placeholder="Şifreniz">
            @error('password')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div>
            <button type="submit">Giriş Yap</button>
        </div>
    </form>
</div>
@endsection
