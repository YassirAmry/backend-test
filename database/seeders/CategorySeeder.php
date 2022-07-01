<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$products = [
    		['name' => 'Makanan', 'enable' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    		['name' => 'Minuman', 'enable' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    		['name' => 'Baju', 'enable' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
    	];

        DB::table('categories')->insert($products);
    }
}
