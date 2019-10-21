<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PenjualanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<70;$i++) {
            DB::table('tbl_sales')->insert([
                'nota_number' => 'ROXZON'.date('YmdHis'),
                'product_id' => rand(4,5),
                'product_quantity' => rand(160,190),
                'user_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            sleep(1);
        }
    }
}
