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
        $faker = Faker::create();

        for($i=1; $i<101; $i++) {
            DB::table('tbl_customers')->insert([
                'ctm_name' => $faker->name,
                'ctm_org_name' => $faker->company,
                'ctm_org_address' => $faker->streetName,
                'ctm_contact' => '082312341234',
                'ctm_private_contact' => '082343214321',
                'user_id' => rand(1,3),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
