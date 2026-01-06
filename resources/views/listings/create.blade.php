@extends('layouts.app')

@section('content')
<div class="panel">
    <h1>Yeni İlan Oluştur</h1>
    <p class="muted">İlanın tüm içeriğini doldurun ve önizleyin.</p>
    <form method="POST" action="{{ route('listings.store') }}" class="grid" style="margin-top:18px; gap:24px;">
        @csrf
        <div class="grid grid-2">
            <div>
                <label>Başlık</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Örn. Sıfır Drone - 4K Kamera">
                @error('title')<div class="error">{{ $message }}</div>@enderror
            </div>
            <div>
                <label>Kategori</label>
                <select name="category">
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ old('category') === $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @error('category')<div class="error">{{ $message }}</div>@enderror
            </div>
            <div>
                <label>Fiyat (₺)</label>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}" placeholder="0,00">
                @error('price')<div class="error">{{ $message }}</div>@enderror
            </div>
            <div>
                <label>Stok</label>
                <input type="number" name="stock" value="{{ old('stock', 1) }}" min="1">
                @error('stock')<div class="error">{{ $message }}</div>@enderror
            </div>
            <div>
                <label>Teslimat Yöntemleri</label>
                <div style="display:flex; gap:10px; flex-wrap:wrap;">
                    @foreach($deliveryOptions as $option)
                        <label style="display:flex; gap:6px; align-items:center;">
                            <input type="checkbox" name="delivery[]" value="{{ $option }}" {{ in_array($option, old('delivery', [])) ? 'checked' : '' }}> {{ $option }}
                        </label>
                    @endforeach
                </div>
                @error('delivery')<div class="error">{{ $message }}</div>@enderror
            </div>
            <div>
                <label>Etiketler</label>
                <input type="text" name="tags" value="{{ old('tags') }}" placeholder="güvenli, hızlı kargo, koleksiyon">
            </div>
        </div>
        <div>
            <label>İlan Açıklaması</label>
            <textarea name="description" placeholder="Ürünün durumunu, şartları ve teslimat detaylarını ekleyin.">{{ old('description') }}</textarea>
            @error('description')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Medya URL'leri (opsiyonel)</label>
            <textarea name="media[]" placeholder="Her satıra bir görsel/video URL'i yazın."></textarea>
        </div>
        <div>
            <button type="submit">İlanı Yayınla</button>
        </div>
    </form>
</div>
@endsection
