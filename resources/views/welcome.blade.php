@extends('layouts.app')

@section('content')
<div class="py-12 bg-yellow-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-yellow-600 mb-6">Selamat Datang di RotiKu</h1>
            <p class="text-lg text-gray-600 mb-8">Toko Roti Online Terlezat di Kota Anda</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-3">Roti Segar Setiap Hari</h3>
                    <p class="text-gray-600">Dibuat dengan bahan premium tanpa pengawet</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-3">Pengiriman Cepat</h3>
                    <p class="text-gray-600">Pesanan sampai dalam waktu 2 jam</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-3">Harga Terjangkau</h3>
                    <p class="text-gray-600">Kualitas premium dengan harga bersaing</p>
                </div>
            </div>

            <a href="{{ route('products.index') }}" class="inline-block bg-yellow-600 text-white px-6 py-3 rounded-lg hover:bg-yellow-700 transition duration-300">
                Lihat Produk Kami
            </a>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h2 class="text-2xl font-bold text-center mb-8">Produk Terpopuler</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($popularProducts as $product)
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="font-bold text-lg mb-2">{{ $product->name }}</h3>
                <p class="text-gray-600 mb-2">{{ Str::limit($product->description, 50) }}</p>
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