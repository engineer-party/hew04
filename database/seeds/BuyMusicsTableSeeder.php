<?php

use Illuminate\Database\Seeder;

class BuyMusicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buy_musics')->insert([
            [
                'user_id'    => '1',
                'music_id'   => '1',
                'price'      => 300,
                'point'      => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id'    => '2',
                'music_id'   => '2',
                'price'      => 500,
                'point'      => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
