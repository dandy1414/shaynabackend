@extends('layouts.global')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Foto Barang</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="form-control-label">Nama Barang</label>
                <select name="products_id" class="form-control @error('products_id') is-invalid @enderror">
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ old('products_id') == $product->id ? "selected" : "" }}>{{ $product->name }}</option>
                    @endforeach
                </select>
                @error('products_id') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="photo" class="form-control-label">Foto Barang</label>
                <input type="file" name="photo" value="{{ old('photo') }}" accept="image"
                    class="form-control @error('photo') is-invalid @enderror" />
                @error('photo') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="is_default" class="form-control-label">Jadikan Default</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="is_default" id="Ya" value="1"
                            {{ old('is_default') == 1 ? "checked" : "" }}>
                        Ya
                    </label>
                    &nbsp;
                    <label>
                        <input type="radio" name="is_default" id="Tidak" value="0"
                            {{ old('is_default') == 0 ? "checked" : "" }}>
                        Tidak
                    </label>
                    @error('id_default') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="form-group">
                <button class="btn-primary btn-block" type="submit">Tambah Foto Barang</button>
            </div>
        </form>
    </div>
</div>
@endsection
