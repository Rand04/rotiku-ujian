@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold mb-4">Daftar Roti Kami</h1>
    
    <div class="flex space-x-4 mb-6 overflow-x-auto pb-2">
        @foreach($categories as $category)
            <a href="{{ route('products.category', $category) }}" class="px-4 py-2 bg-white rounded-lg shadow hover:bg-yellow-50 whitespace-nowrap">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 mb-2">{{ Str::limit($product->description, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-yellow-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <a href="{{ route('products.show', $product) }}" class="text-yellow-600 hover:underline">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection