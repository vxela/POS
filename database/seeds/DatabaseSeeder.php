<?php

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
        $this->call([
            UsersTableSeeder::class,
            ProdukTableSeeder::class,
            KategoriProdukTableSeeder::class,
            PenjualanTableSeeder::class,
            ProduksiTableSeeder::class,
            PenjualanTableSeeder::class,
            CustomerTableSeeder::class
        ]);
    }
}
