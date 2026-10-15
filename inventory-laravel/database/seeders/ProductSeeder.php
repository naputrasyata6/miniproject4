<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $keyboard = Category::where('name', 'Keyboard')->firstOrFail();
        $mouse = Category::where('name', 'Mouse')->firstOrFail();
        $monitor = Category::where('name', 'Monitor')->firstOrFail();

        $products = [
            ['category_id' => $keyboard->id, 'sku' => 'KB-001', 'name' => 'Keyboard Mekanikal TKL', 'price' => 350000, 'stock' => 12, 'minimum_stock' => 5],
            ['category_id' => $keyboard->id, 'sku' => 'KB-002', 'name' => 'Keyboard Wireless Slim', 'price' => 225000, 'stock' => 3, 'minimum_stock' => 5],
            ['category_id' => $mouse->id, 'sku' => 'MS-001', 'name' => 'Mouse Gaming 16000 DPI', 'price' => 175000, 'stock' => 8, 'minimum_stock' => 5],
            ['category_id' => $mouse->id, 'sku' => 'MS-002', 'name' => 'Mouse Office Silent', 'price' => 65000, 'stock' => 2, 'minimum_stock' => 10],
            ['category_id' => $monitor->id, 'sku' => 'MN-001', 'name' => 'Monitor 24 Inci IPS', 'price' => 1450000, 'stock' => 6, 'minimum_stock' => 3],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(['sku' => $product['sku']], $product);
        }

        // Data dummy dari factory hanya ditambah kalau tabel masih sedikit isinya,
        // supaya menjalankan db:seed berulang tidak menumpuk duplikat.
        if (Product::count() < 5) {
            $categories = Category::all();
            for ($i = 0; $i < 15; $i++) {
                Product::factory()->create(['category_id' => $categories->random()->id]);
            }
        }
    }
}
