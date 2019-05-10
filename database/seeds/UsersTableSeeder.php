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
            'name' => '森下 力',
            'email' => 'morishita@sunshine-inc.com',
            'auth_str' => 'admin'
        ]);
    }
}
