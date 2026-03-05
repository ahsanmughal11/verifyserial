<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['serial_number' => 'SB001', 'product_name' => '1 Tola Silver Bar', 'product_picture' => 'https://images.unsplash.com/photo-1611591437281-8bfd8cfbd173?w=400&h=400&fit=crop', 'manufacturing_date' => '2024-01-15'],
            ['serial_number' => 'SB002', 'product_name' => '2 Tola Silver Bar', 'product_picture' => 'https://images.unsplash.com/photo-1611591437281-8bfd8cfbd173?w=400&h=400&fit=crop', 'manufacturing_date' => '2024-02-20'],
            ['serial_number' => 'SB003', 'product_name' => '5 Tola Silver Bar', 'product_picture' => 'https://images.unsplash.com/photo-1611591437281-8bfd8cfbd173?w=400&h=400&fit=crop', 'manufacturing_date' => '2024-03-10'],
            ['serial_number' => 'SB004', 'product_name' => '10 Tola Silver Bar', 'product_picture' => 'https://images.unsplash.com/photo-1611591437281-8bfd8cfbd173?w=400&h=400&fit=crop', 'manufacturing_date' => '2024-04-05'],
            ['serial_number' => 'CC001', 'product_name' => '1 Tola Copper Coin', 'product_picture' => 'https://images.unsplash.com/photo-1611591437281-8bfd8cfbd173?w=400&h=400&fit=crop', 'manufacturing_date' => '2024-05-12'],
            ['serial_number' => 'CC002', 'product_name' => '2 Tola Copper Coin', 'product_picture' => 'https://images.unsplash.com/photo-1611591437281-8bfd8cfbd173?w=400&h=400&fit=crop', 'manufacturing_date' => '2024-01-20'],
            ['serial_number' => 'CC003', 'product_name' => '5 Tola Copper Coin', 'product_picture' => 'https://images.unsplash.com/photo-1611591437281-8bfd8cfbd173?w=400&h=400&fit=crop', 'manufacturing_date' => '2024-02-25'],
            ['serial_number' => 'GB001', 'product_name' => '1 Tola Gold Bar', 'product_picture' => 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400&h=400&fit=crop', 'manufacturing_date' => '2024-03-15'],
            ['serial_number' => 'GB002', 'product_name' => '2 Tola Gold Bar', 'product_picture' => 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400&h=400&fit=crop', 'manufacturing_date' => '2024-04-20'],
            ['serial_number' => 'GB003', 'product_name' => '5 Tola Gold Bar', 'product_picture' => 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400&h=400&fit=crop', 'manufacturing_date' => '2024-05-25'],
            ['serial_number' => 'GB004', 'product_name' => '10 Tola Gold Bar', 'product_picture' => 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400&h=400&fit=crop', 'manufacturing_date' => '2024-06-10'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
