<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            'last_name' => '森下',
            'first_name' => '力',
            'last_name_kana' => 'モリシタ',
            'first_name_kana' => 'ツトム',
            'place_id' => '1',
            'email' => 'morishita@sunshine-inc.com',
            'created_at' => '2019-05-10 00:00:00',
            'updated_at' => '2019-05-10 00:00:00'
        ]);
    }
}
