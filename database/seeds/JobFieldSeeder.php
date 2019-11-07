<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class JobFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_job_fields')->insert([
            'job_cd'        => 'RXZCEO01',
            'division_name' => 'Director',
            'position'      => 'Head',
            'reponsibility' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'user_id'       => 1,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_job_fields')->insert([
            'job_cd'        => 'RXZMGT01',
            'division_name' => 'Management',
            'position'      => 'Head',
            'reponsibility' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'user_id'       => 1,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_job_fields')->insert([
            'job_cd'        => 'RXZMGT02',
            'division_name' => 'Management',
            'position'      => 'Staff',
            'reponsibility' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'user_id'       => 1,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_job_fields')->insert([
            'job_cd'        => 'RXZPRD01',
            'division_name' => 'Production',
            'position'      => 'Head',
            'reponsibility' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'user_id'       => 1,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_job_fields')->insert([
            'job_cd'        => 'RXZPRD02',
            'division_name' => 'Production',
            'position'      => 'Staff',
            'reponsibility' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'user_id'       => 1,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_job_fields')->insert([
            'job_cd'        => 'RXZDLY01',
            'division_name' => 'Delivery',
            'position'      => 'Head',
            'reponsibility' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'user_id'       => 1,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_job_fields')->insert([
            'job_cd'        => 'RXZDLY02',
            'division_name' => 'Delivery',
            'position'      => 'Staff',
            'reponsibility' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'user_id'       => 1,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_job_fields')->insert([
            'job_cd'        => 'RXZMKT01',
            'division_name' => 'Marketing',
            'position'      => 'Head',
            'reponsibility' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'user_id'       => 1,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_job_fields')->insert([
            'job_cd'        => 'RXZMKT02',
            'division_name' => 'Marketing',
            'position'      => 'Staff',
            'reponsibility' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'user_id'       => 1,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_job_fields')->insert([
            'job_cd'        => 'RXZMTC01',
            'division_name' => 'Maintenance',
            'position'      => 'Head',
            'reponsibility' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'user_id'       => 1,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_job_fields')->insert([
            'job_cd'        => 'RXZMTC02',
            'division_name' => 'Maintenance',
            'position'      => 'Staff',
            'reponsibility' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'user_id'       => 1,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_job_fields')->insert([
            'job_cd'        => 'RXZITE01',
            'division_name' => 'Technology Engineer',
            'position'      => 'Head',
            'reponsibility' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'user_id'       => 1,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_job_fields')->insert([
            'job_cd'        => 'RXZITE02',
            'division_name' => 'Technology Engineer',
            'position'      => 'Staff',
            'reponsibility' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'user_id'       => 1,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
    }
}
