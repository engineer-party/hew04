<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            [
                'name' => '春太郎',
                'email' => 'haltaro@gmail.com',
                'password' => bcrypt('secretboy'),
            ],
            [
                'name' => '春花子',
                'email' => 'halhanako@gmail.com',
                'password' => bcrypt('secretgirl'),
            ],
        ]);
    }
}
