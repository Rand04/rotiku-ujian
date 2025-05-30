<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RotiKu - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-gray-100">
    <nav class="bg-yellow-600 text-white shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold">RotiKu</a>
            <div class="flex items-center space-x-4">
                <a href="{{ route('products.index') }}" class="hover:underline">Produk</a>
                <a href="{{ route('cart.index') }}" class="hover:underline flex items-center">
                    Keranjang
                    @if(count(session('cart', [])))
                        <span class="ml-1 bg-white text-yellow-600 rounded-full w-5 h-5 flex items-center justify-center text-xs">
                            {{ count(session('cart', [])) }}
                        </span>
                    @endif
                </a>
                @auth
                    <a href="{{ route('orders.index') }}" class="hover:underline">Pesanan Saya</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:underline">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="hover:underline">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-6 mt-10">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} RotiKu - Toko Roti Online</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>