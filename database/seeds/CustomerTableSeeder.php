<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gprice = [0,0,10000,12000,0,11000];
        $faker = Faker::create();

        for($i=1; $i<101; $i++) {
            DB::table('tbl_customers')->insert([
                'name' => $faker->name,
                'address' => $faker->streetName,
                'contact' => ''.rand((int) pow(10, 12-1), (int) pow(10, 12)-1),
                'contact1' => ''.rand((int) pow(10, 12-1), (int) pow(10, 12)-1),
                'galon_price' => $gprice[rand(0,5)],
                'date_join' => '2018-06-02',
                'user_id' => rand(1,3),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
