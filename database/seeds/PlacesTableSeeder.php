<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
            'id' => '1',
            'name' => '全店舗',
            'created_at' => '2019-05-10 00:00:00',
            'updated_at' => '2019-05-10 00:00:00'
        ]);
    }
}
