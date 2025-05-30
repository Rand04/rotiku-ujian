<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'category_id' => 1,
                'name' => 'Roti Tawar Putih',
                'slug' => Str::slug('Roti Tawar Putih'),
                'description' => 'Roti tawar putih lembut',
                'price' => 15000,
                'stock' => 50,
                'is_active' => true
            ],
            [
                'category_id' => 1,
                'name' => 'Roti Tawar Coklat',
                'slug' => Str::slug('Roti Tawar Coklat'),
                'description' => 'Roti tawar dengan rasa coklat',
                'price' => 17000,
                'stock' => 40,
                'is_active' => true
            ],
            // ... (produk lainnya juga ditambahkan slug)
        ];
        
        foreach($products as $product) {
            Product::create($product);
        }
    }
}