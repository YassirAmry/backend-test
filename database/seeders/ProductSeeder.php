<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
    		['name' => 'Boba', 'description' => 'minuman boba', 'enable' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    		['name' => 'Coconut Jelly', 'description' => 'kelapa jelly', 'enable' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    		['name' => 'Cino', 'description' => 'celana', 'enable' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
    	];

        DB::table('products')->insert($products);
    }
}
