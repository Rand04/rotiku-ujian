<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Roti Tawar', 
                'slug' => Str::slug('Roti Tawar'),
                'description' => 'Berbagai macam roti tawar'
            ],
            [
                'name' => 'Roti Manis', 
                'slug' => Str::slug('Roti Manis'),
                'description' => 'Roti dengan rasa manis'
            ],
            [
                'name' => 'Roti Gandum', 
                'slug' => Str::slug('Roti Gandum'),
                'description' => 'Roti sehat dari gandum'
            ],
            [
                'name' => 'Pastry', 
                'slug' => Str::slug('Pastry'),
                'description' => 'Berbagai macam pastry'
            ],
        ];
        
        foreach($categories as $category) {
            Category::create($category);
        }
    }
}