<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProduksiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d = 70;
        for($i=0;$i<70;$i++) {

            DB::table('tbl_productions')->insert([
                'product_id' => 4,
                'product_quantity' => 185 + rand(9,35),
                'activity_date' => Carbon::now()->add(-$d, 'day')->format('Y-m-d H:i:s'),
                'user_id' => rand(1,2),
                'created_at' => Carbon::now()->add(-$d, 'day')->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            $d--;
        }
    }
}
