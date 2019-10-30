<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ShipmentToolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_shipment_tools')->insert([
            'jenis_tool' => 'Mobil Pickup',
            'tool_name' => 'Mobil Carry',
            'kondisi_tool' => 'Baik',
            'keterangan_kondisi' => '-',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tbl_shipment_tools')->insert([
            'jenis_tool' => 'Mobil Pickup',
            'tool_name' => 'Mobil Tata',
            'kondisi_tool' => 'Baik',
            'keterangan_kondisi' => '-',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
