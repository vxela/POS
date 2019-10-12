<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'mush',
            'email' => 'mush@mail.com',
            'password' => bcrypt('admin1234'),
            'user_role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'manajer',
            'email' => 'manajer@mail.com',
            'password' => bcrypt('admin1234'),
            'user_role' => 'manajemen'
        ]);

        DB::table('users')->insert([
            'name' => 'gudang',
            'email' => 'gudang@mail.com',
            'password' => bcrypt('admin1234'),
            'user_role' => 'gudang'
        ]);

        DB::table('users')->insert([
            'name' => 'kasir',
            'email' => 'kasir@mail.com',
            'password' => bcrypt('admin1234'),
            'user_role' => 'kasir'
        ]);
    }
}
