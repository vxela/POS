<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProdukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    function getproductCode(){
        $trif = ['RXZ', 'RXG', 'ANT'];
        $str = '1234567890';
        $y = '2';
        $m = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $d = rand(11,28);
        $cd = "".$trif[rand(0,2)].$y."0".rand(15,19).$m[rand(0,11)].$d;       

        return $cd;   

    }

    function getProductName() {
        $name = ['Roxzon', 'Roxgen', 'Blue Puch'];
        $type = ['Galon 15L', 'Bottle 650ml', 'Bottle 500ml', 'Bottle 400ml','Bottle 550ml', 'Bottle 2L', 'Cup 250ml'];

        $n = "".$name[rand(0,2)]." ".$type[rand(0,6)];

        return $n;
    }

    function getPrice() {
        $pr = [1000, 2500, 8400, 10000, 3000, 7500, 7300, 6500, 4000, 12000];

        return $pr[rand(0,9)];
    }

    public function run()
    {
        for($i=0;$i<20;$i++) {
            DB::table('tbl_products')->insert([
                'product_code' => $this->getproductCode(),
                'product_name' => $this->getProductName(),
                'category_product_id' => rand(1,2),
                'product_price' => $this->getPrice(),
                'product_owner' => 'Roxzon',
                'product_desc' => 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.',
                'user_id' => rand(1,2),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        

        // DB::table('users')->insert([
        //     'name' => 'gudang',
        //     'email' => 'gudang@mail.com',
        //     'password' => bcrypt('admin1234'),
        //     'user_role' => 'gudang'
        // ]);
    }
}
