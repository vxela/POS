<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KategoriProdukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_product_categories')->insert([
            'category_name' => 'minuman',
            'category_desc' => 'produk minuman',
            'user_id' => rand(1,3),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_product_categories')->insert([
            'category_name' => 'Makanan',
            'category_desc' => 'produk makanan',
            'user_id' => rand(1,3),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);        
    }
}
