@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">Daftar Produk</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Tambah Produk</a>
</div>

<form method="GET" action="{{ route('products.index') }}" class="row g-2 mb-3">
    <div class="col-sm-5">
        <label for="search" class="visually-hidden">Cari produk</label>
        <input type="text" id="search" name="search" class="form-control form-control-sm" placeholder="Cari nama produk..." value="{{ request('search') }}">
    </div>
    <div class="col-sm-4">
        <label for="category_id" class="visually-hidden">Filter kategori</label>
        <select id="category_id" name="category_id" class="form-select form-select-sm">
            <option value="">Semua Kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-3">
        <button type="submit" class="btn btn-outline-primary btn-sm w-100">Filter</button>
    </div>
</form>

<div class="table-responsive">
    <table class="table table-sm align-middle bg-white">
        <thead>
            <tr>
                <th>SKU</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th class="text-end">Harga</th>
                <th class="text-end">Stok</th>
                <th>Status</th>
                <th class="text-end">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->sku }}</td>
                    <td><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></td>
                    <td>{{ $product->category->name }}</td>
                    <td class="text-end">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="text-end">{{ $product->stock }}</td>
                    <td>
                        @if ($product->isLowStock())
                            <span class="badge text-bg-warning">Stok Rendah</span>
                        @else
                            <span class="badge text-bg-success">Aman</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form method="POST" action="{{ route('products.destroy', $product) }}" class="d-inline" onsubmit="return confirm('Hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Belum ada produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $products->links() }}
@endsection
