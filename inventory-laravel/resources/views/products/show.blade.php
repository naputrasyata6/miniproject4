@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<h1 class="h4 mb-3">Detail Produk</h1>

<div class="card bg-white">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">SKU</dt>
            <dd class="col-sm-9">{{ $product->sku }}</dd>
            <dt class="col-sm-3">Nama</dt>
            <dd class="col-sm-9">{{ $product->name }}</dd>
            <dt class="col-sm-3">Kategori</dt>
            <dd class="col-sm-9">{{ $product->category->name }}</dd>
            <dt class="col-sm-3">Harga</dt>
            <dd class="col-sm-9">Rp {{ number_format($product->price, 0, ',', '.') }}</dd>
            <dt class="col-sm-3">Stok</dt>
            <dd class="col-sm-9">{{ $product->stock }} (minimum {{ $product->minimum_stock }})</dd>
            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9">
                @if ($product->isLowStock())
                    <span class="badge text-bg-warning">Stok Rendah</span>
                @else
                    <span class="badge text-bg-success">Aman</span>
                @endif
            </dd>
        </dl>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
    <a href="{{ route('products.index') }}" class="btn btn-link btn-sm">Kembali</a>
</div>
@endsection
