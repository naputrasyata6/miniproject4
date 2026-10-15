@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<h1 class="h4 mb-3">Tambah Produk</h1>

<form method="POST" action="{{ route('products.store') }}" class="card card-body bg-white">
    @csrf
    @include('products._form')
    <div class="mt-3">
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        <a href="{{ route('products.index') }}" class="btn btn-link btn-sm">Batal</a>
    </div>
</form>
@endsection
