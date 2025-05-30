@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Keranjang Belanja</h1>
        
        @if(count($cart) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($cart as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ $item['image'] ? asset('storage/' . $item['image']) : 'https://via.placeholder.com/40' }}" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $item['name'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Rp {{ number_format($item['price'], 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('cart.update', $item['product_id']) }}" method="POST">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="border rounded px-2 py-1 w-20">
                                    </form>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form action="{{ route('cart.remove', $item['product_id']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-6 flex justify-end">
                <div class="bg-gray-100 p-4 rounded-lg w-full md:w-1/3">
                    <h3 class="text-lg font-bold mb-4">Ringkasan Belanja</h3>
                    <div class="flex justify-between mb-2">
                        <span>Total Harga</span>
                        <span>Rp {{ number_format(array_reduce($cart, function($carry, $item) { return $carry + ($item['price'] * $item['quantity']); }, 0, ',', '.') }}</span>
                    </div>
                    <a href="{{ route('checkout') }}" class="block w-full bg-yellow-600 text-white text-center py-2 rounded hover:bg-yellow-700 mt-4">
                        Lanjut ke Pembayaran
                    </a>
                </div>
            </div>
        @else
            <div class="text-center py-10">
                <p class="text-gray-500 mb-4">Keranjang belanja Anda kosong</p>
                <a href="{{ route('products.index') }}" class="text-yellow-600 hover:underline">Lihat Produk Kami</a>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('input[name="quantity"]').forEach(input => {
        input.addEventListener('change', function() {
            this.closest('form').submit();
        });
    });
</script>
@endsection