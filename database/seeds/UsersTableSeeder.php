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
            'emp_id' => 1,
            'name' => 'mush',
            'email' => 'mush@mail.com',
            'password' => bcrypt('admin1234'),
            'user_role' => 'admin',
            'user_id' => 1,
            'user_status' => 'aktif'
        ]);

        DB::table('users')->insert([
            'emp_id' => 1,
            'name' => 'manajer',
            'email' => 'manajer@mail.com',
            'password' => bcrypt('admin1234'),
            'user_role' => 'manajemen',
            'user_id' => 1,
            'user_status' => 'aktif'
        ]);

        DB::table('users')->insert([
            'emp_id' => 1,
            'name' => 'gudang',
            'email' => 'gudang@mail.com',
            'password' => bcrypt('admin1234'),
            'user_role' => 'gudang',
            'user_id' => 1,
            'user_status' => 'aktif'
        ]);

        DB::table('users')->insert([
            'emp_id' => 1,
            'name' => 'kasir',
            'email' => 'kasir@mail.com',
            'password' => bcrypt('admin1234'),
            'user_role' => 'kasir',
            'user_id' => 1,
            'user_status' => 'aktif'
        ]);
    }
}
