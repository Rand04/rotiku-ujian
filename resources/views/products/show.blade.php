@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="md:flex">
        <div class="md:w-1/2">
            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300' }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
        </div>
        <div class="p-6 md:w-1/2">
            <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
            <p class="text-gray-600 mb-4">Kategori: {{ $product->category->name }}</p>
            <p class="text-2xl font-bold text-yellow-600 mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="text-gray-700 mb-6">{{ $product->description }}</p>
            
            <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-6">
                @csrf
                <div class="flex items-center mb-4">
                    <label for="quantity" class="mr-2">Jumlah:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}" class="border rounded px-2 py-1 w-20">
                </div>
                <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">
                    Tambah ke Keranjang
                </button>
            </form>
            
            <div class="bg-gray-100 p-4 rounded">
                <h3 class="font-bold mb-2">Informasi Stok</h3>
                <p>Tersedia: {{ $product->stock }} buah</p>
            </div>
        </div>
    </div>
</div>
@endsection