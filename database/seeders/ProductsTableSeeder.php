<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $product = new Product();
            $product->name = "Produto " . ($i + 1);
            $product->price = rand(10, 100);
            $product->stock = rand(0, 100);
            $product->description = "Descrição do Produto " . ($i + 1);
            $product->cover = "https://picsum.photos/200/300?random=" . ($i + 1); // URL aleatória do Lorem Picsum
            $product->save();
        }
    }
}
