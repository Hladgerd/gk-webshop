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
        for ($i=1; $i <= 12; $i++) {
            Product::create([
                'name' => 'Product '.$i,
                'slug' => 'product-'.$i,
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'price' => rand(9, 9999),
                '3_pcs_disc' => rand(0, 5),
                '5_pcs_disc' => rand(6, 10),
            ]);
        }
    }
}
