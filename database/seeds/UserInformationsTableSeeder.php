<?php

use Illuminate\Database\Seeder;

class UserInformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_informations')->insert([
            [
                'user_id'        => '1',
                'information_id' => '1',
            ],
            [
                'user_id'        => '2',
                'information_id' => '1',
            ],
            [
                'user_id'        => '2',
                'information_id' => '2',
            ],
        ]);
    }
}
