@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<h1 class="h4 mb-3">Edit Produk</h1>

<form method="POST" action="{{ route('products.update', $product) }}" class="card card-body bg-white">
    @csrf
    @method('PUT')
    @include('products._form', ['product' => $product])
    <div class="mt-3">
        <button type="submit" class="btn btn-primary btn-sm">Perbarui</button>
        <a href="{{ route('products.index') }}" class="btn btn-link btn-sm">Batal</a>
    </div>
</form>
@endsection
