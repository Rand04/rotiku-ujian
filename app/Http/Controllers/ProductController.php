<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)->with('category')->get();
        $categories = Category::all();
        
        return view('products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function category(Category $category)
    {
        $products = $category->products()->where('is_active', true)->get();
        $categories = Category::all();
        
        return view('products.category', compact('products', 'categories', 'category'));
    }
}