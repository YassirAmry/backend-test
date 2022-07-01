<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $images = Image::factory(5)->create();
        $categories = Category::factory(5)->create();
        $products = Product::factory(5)->create();

        Product::all()->each(function ($product) use ($categories){
            $product->categories()->attach(
                $categories->random(rand(1, 5))->pluck('id')->toArray()
            );
        });

        Product::all()->each(function ($product) use ($images){
            $product->images()->attach(
                $images->random(rand(1, 5))->pluck('id')->toArray()
            );
        });

        // $this->call([
        // 	CategorySeeder::class,
        //     ProductSeeder::class
        // ]);
    }
}
