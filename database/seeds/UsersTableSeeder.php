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
        DB::table('users')->insert([
            'id' => '1',
            'name' => '森下 力',
            'email' => 'morishita@sunshine-inc.com',
            'place_id' => '1',
            'auth_str' => 'admin',
            'created_at' => '2019-05-10 00:00:00',
            'updated_at' => '2019-05-10 00:00:00'
        ]);
    }
}
